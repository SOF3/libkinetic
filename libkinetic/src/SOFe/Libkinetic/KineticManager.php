<?php

/*
 * libkinetic
 *
 * Copyright (C) 2018 SOFe
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

declare(strict_types=1);

namespace SOFe\Libkinetic;

use Generator;
use InvalidArgumentException;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use ReflectionClass;
use ReflectionParameter;
use SOFe\Libkinetic\Base\KineticNode;
use SOFe\Libkinetic\Base\RootComponent;
use SOFe\Libkinetic\Cont\ContCommand;
use SOFe\Libkinetic\Flow\EntryFlowContext;
use SOFe\Libkinetic\Flow\FlowCancelledException;
use SOFe\Libkinetic\Hybrid\FormAPIAdapter;
use SOFe\Libkinetic\Hybrid\FormsAdapter;
use SOFe\Libkinetic\Parser\JsonFileParser;
use SOFe\Libkinetic\Parser\KineticFileParser;
use SOFe\Libkinetic\Parser\XmlFileParser;
use SOFe\Libkinetic\UI\UiComponent;
use SOFe\Libkinetic\UI\UiNode;
use SOFe\Libkinetic\Util\Await;
use SOFe\Libkinetic\Util\CallbackTask;
use function array_keys;
use function array_merge;
use function assert;
use function class_uses;
use function explode;
use function implode;
use function in_array;
use function is_array;
use function is_subclass_of;
use function mb_strpos;
use function mb_substr;
use function str_replace;
use function strpos;
use function substr;

class KineticManager{
	public static $CONT_EXPIRY_TIME = 300.0;

	/** @var Plugin */
	protected $plugin;
	/** @var KineticAdapter */
	protected $adapter;
	/** @var FormsAdapter */
	protected $formsAdapter;

	/** @var RootComponent */
	protected $root;
	/** @var UiNode[] */
	protected $uiNodes = [];

	/** @var string */
	protected $contName;
	/** @var callable a callable that returns a cont await generator */
	protected $contAdapter;

	public function execute(string $id, CommandSender $user, ?callable $callback = null, $onError = []) : void{
		$node = $this->uiNodes[$id];
		$context = new EntryFlowContext($node, $user);
		$context->executeCallback($callback, $onError);
	}

	public function executeG(string $id, CommandSender $user) : Generator{
		$node = $this->uiNodes[$id];
		$context = new EntryFlowContext($node, $user);
		return $context->execute();
	}

	/**
	 * KineticManager constructor.
	 *
	 * @param Plugin         $plugin
	 * @param KineticAdapter $adapter
	 * @param string         $file
	 */
	public function __construct(Plugin $plugin, KineticAdapter $adapter, string $file = "kinetic"){
		KineticFileParser::$hasPm = true;
		$this->plugin = $plugin;
		if(in_array(KineticAdapterBase::class, class_uses($adapter), true)){
			/** @noinspection PhpUndefinedMethodInspection */
			/** @var KineticAdapterBase $adapter */
			$adapter->kinetic_setPlugin($plugin);
		}
		$this->adapter = $adapter;

		$parser = $this->createParser($file);

		$parser->parse();

		$allNodes = $parser->getAllNodes();
		$root = $parser->getRoot()->asRootComponent();
		$root->loadIncludes($this, $allNodes);

		foreach($allNodes as $node){
			$node->resolve($this);
		}
		foreach($allNodes as $node){
			$node->init();
			if($node->hasComponent(UiComponent::class) && $node->asIdComponent()->getId() !== null){
				foreach($node->getComponents() as $c){
					if($c instanceof UiNode){
						$component = $c;
					}
				}
				assert(isset($component));
				$this->uiNodes[$node->asIdComponent()->getId()] = $component;
			}
		}

		$this->formsAdapter = new FormAPIAdapter($this);

		if($root->getCont() !== null){
			$names = [$root->getCont()->getName()];
			foreach($root->getCont()->getAliases() as $alias){
				$names[] = $alias->getText();
			}
			$this->contName = "";
			$this->contAdapter = ContCommand::registerOrAdapt($this, $names);
		}else{
			$this->contName = "(this feature is not available)";
			$this->contAdapter = function() : Generator{
				if(false){
					yield;
				}
				throw new FlowCancelledException();
			};
		}
	}

	protected function createParser(string $file) : KineticFileParser{
		return libkinetic::isShaded() ?
			new XmlFileParser($this->plugin->getResource($file . ".xml"), $file . ".xml") :
			new JsonFileParser($this->plugin->getResource($file . ".json"), $file . ".json");
	}

	public function getPlugin() : Plugin{
		return $this->plugin;
	}

	public function getAdapter() : KineticAdapter{
		return $this->adapter;
	}

	public function getFormsAdapter() : FormsAdapter{
		return $this->formsAdapter;
	}


	public function getContName() : string{
		return $this->contName;
	}

	public function getContAdapter() : callable{
		return $this->contAdapter;
	}

	public function waitCont(CommandSender $sender, float $timeout) : Generator{
		return yield ($this->contAdapter)($sender, yield, yield Await::REJECT, $timeout) => Await::ONCE;
	}

	public function translate(?CommandSender $context, ?string $identifier, array $args = []) : string{
		if($identifier === "" || $identifier === null){
			return "";
		}

		try{
			return $this->adapter->getMessage($context, $identifier, $args);
		}catch(InvalidArgumentException $ex){
			$locale = $context instanceof Player ? $context->getLocale() : "en_US";
			if(isset(LibkineticMessages::MESSAGES[$identifier][$locale])){
				$message = LibkineticMessages::MESSAGES[$identifier][$locale];
				foreach($args as $k => $v){
					$message = str_replace("\${{$k}}", is_array($v) ? implode(", ", $v) : (string) $v, $message);
				}
				return $message;
			}

			throw $ex;
		}
	}


	public function requireTranslation(KineticNode $node, string $key) : void{
		if($key !== "" && !$this->adapter->hasMessage($key)){
			throw new InvalidNodeException("The translation $key is undefined", $node);
		}
	}

	public function resolveClass(KineticNode $node, ?string $fqn, string $interface, array $adapters, string $namespace) : ?object{
		if($fqn === null){
			return null;
		}

		if(strpos($fqn, '$') === 0){
			$object = $this->adapter->getController(substr($fqn, 1));
			$output = self::adaptObject($object, $interface, $adapters);
			if($output === null){
				$node->throw("KineticAdapter::getController(\"$fqn\") does not implement one of " . implode(", ", array_merge([$interface], array_keys($adapters))));
			}
		}

		$args = [];
		if(($pos = mb_strpos($fqn, ";")) !== false){
			$argsString = mb_substr($fqn, $pos + 1);
			$fqn = mb_substr($fqn, 0, $pos);
			foreach(explode(";", $argsString) as $arg){
				[$argName, $argValue] = explode("=", $arg);
				$args[$argName] = $argValue;
			}
		}

		if($fqn{0} === "\\"){
			$class = substr($fqn, 1);
		}elseif(strpos($fqn, "!") === 0){
			$class = libkinetic::getNamespace() . "\\Defaults\\" . substr($fqn, 1);
		}else{
			if(substr($namespace, -1) !== "\\"){
				$namespace .= "\\";
			}
			$class = $namespace . $fqn;
		}

		if(!class_exists($class)){
			$node->throw("Class $class ($fqn) does not exist");
		}

		if(!self::isClassApplicableToAdapter($class, $interface, $adapters)){
			$node->throw("Class $class ($fqn) does not implement one of " . implode(", ", array_merge([$interface], array_keys($adapters))));
		}

		$class = new ReflectionClass($class);
		if(!$class->isInstantiable()){
			$node->throw("Class $class ($fqn) is not instantiable");
		}

		$controller = $this->constructControllerFromClass($class, $node, $fqn, $args);
		$output = self::adaptObject($controller, $interface, $adapters);
		if($output === null){
			$node->throw("KineticAdapter::getController(\"$fqn\") does not implement one of " . implode(", ", array_merge([$interface], array_keys($adapters))));
		}
		return $output;
	}

	protected function constructControllerFromClass(ReflectionClass $class, KineticNode $node, string $fqn, array $args){
		$constructor = $class->getConstructor();
		if($constructor === null){
			return $class->newInstance();
		}
		$requiredParams = $constructor->getNumberOfRequiredParameters();
		if($requiredParams !== $constructor->getNumberOfParameters()){
			$node->throw("Class $class ($fqn) __construct must not have any optional parameters");
		}

		if($requiredParams === 0){
			return $class->newInstance();
		}
		$params = $constructor->getParameters();
		if(self::isArrayParameter($params[0])){
			return $class->newInstance($args);
		}
		$paramClass = $params[0]->getClass();
		if($paramClass !== null){
			$isArraySecond = isset($params[1]) && self::isArrayParameter($params[1]);
			if($paramClass->getName() === self::class){
				return $isArraySecond ? $class->newInstance($this, $args) : $class->newInstance($this);
			}
			if($paramClass->isInstance($this->plugin)){
				return $isArraySecond ? $class->newInstance($this->plugin, $args) : $class->newInstance($this->plugin);
			}
		}

		throw $node->throw("The constructor signature for class $class is invalid");
	}

	protected static function isArrayParameter(ReflectionParameter $parameter) : bool{
		if($parameter->getClass() !== null || $parameter->getType() === null){
			return false;
		}
		return $parameter->getType()->getName() === "array";
	}

	protected static function isClassApplicableToAdapter(string $class, string $interface, array $adapters) : bool{
		if(is_subclass_of($class, $interface)){
			return true;
		}
		foreach($adapters as $inter => $adapter){
			if($class instanceof $inter){
				return true;
			}
		}
		return false;
	}

	protected static function adaptObject(object $object, string $interface, array $adapters) : ?object{
		if($object instanceof $interface){
			return $object;
		}
		foreach($adapters as $class => $adapter){
			if($object instanceof $class){
				$adapted = $adapter($object);
				assert($adapted instanceof $interface, "Invalid adapter implementation for $class");
			}
		}
		return null;
	}


	public function sleep(int $ticks) : Generator{
		$this->getPlugin()->getScheduler()->scheduleDelayedTask(new CallbackTask(yield), $ticks);
		yield Await::ONCE;
	}
}
