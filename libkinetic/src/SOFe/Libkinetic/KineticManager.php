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

use InvalidArgumentException;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use ReflectionClass;
use SOFe\Libkinetic\Clickable\ClickableInterface;
use SOFe\Libkinetic\Clickable\Cont\ContCommandComponent;
use SOFe\Libkinetic\Form\FormHandler;
use SOFe\Libkinetic\Parser\JsonFileParser;
use SOFe\Libkinetic\Parser\KineticFileParser;
use SOFe\Libkinetic\Parser\XmlFileParser;
use SOFe\Libkinetic\Util\CallbackTask;
use SplObjectStorage;
use function assert;
use function class_uses;
use function extension_loaded;
use function implode;
use function in_array;
use function mb_strpos;
use function mb_substr;
use function microtime;
use function str_replace;
use function substr;

class KineticManager{
	public static $CONT_ACTION_EXPIRY_TIME = 300.0;

	/** @var Plugin */
	protected $plugin;
	/** @var KineticAdapter */
	protected $adapter;
	/** @var FormHandler */
	protected $formHandler;

	/** @var KineticFileParser[] */
	protected $parsers = [];
	/** @var KineticNode[] */
	protected $allNodes = [];
	/** @var KineticNode[] */
	protected $idMap = [];

	/** @var bool */
	protected $hasCont = false;
	/** @var ContCommandComponent[] */
	protected $contComponents = [];
	/** @var SplObjectStorage|CommandSender[] */
	protected $contAction = [];

	/**
	 * KineticManager constructor.
	 * @param Plugin          $plugin
	 * @param KineticAdapter  $adapter
	 * @param string|string[] $xmlResources
	 * @param string|string[] $jsonResources
	 */
	public function __construct(Plugin $plugin, KineticAdapter $adapter, $xmlResources = ["kinetic.xml"], $jsonResources = ["kinetic.json"]){
		KineticFileParser::$hasPm = true;
		$this->plugin = $plugin;
		if(in_array(KineticAdapterBase::class, class_uses($adapter), true)){
			/** @noinspection PhpUndefinedMethodInspection */
			$adapter->kinetic_setPlugin($plugin);
		}
		$this->adapter = $adapter;

		$this->formHandler = new FormHandler($this);

		if(extension_loaded("xml")){
			$xmlResources = (array) $xmlResources;
			$plugin->getLogger()->debug("Loading XML kinetic file(s) " . implode(", ", $xmlResources));
			foreach($xmlResources as $resource){
				$this->parsers[] = new XmlFileParser($plugin->getResource($resource), $resource);
			}
		}else{
			$jsonResources = (array) $jsonResources;
			$plugin->getLogger()->debug("Loading JSON kinetic file(s) " . implode(", ", $jsonResources));
			foreach($jsonResources as $resource){
				$this->parsers[] = new JsonFileParser($plugin->getResource($resource), $resource);
			}
		}

		foreach($this->parsers as $parser){
			$parser->parse();
			foreach($parser->allNodes as $node){
				$this->allNodes[] = $node;
				if($node->hasComponent(AbsoluteIdComponent::class)){
					$id = $node->asAbsoluteIdComponent()->getId();
					if(isset($this->idMap[$id])){
						throw new InvalidNodeException("Duplicate node ID $id with another file's " . $this->idMap[$id]->getHierarchyName(), $node);
					}
					$this->idMap[$id] = $node;
				}elseif($node->hasComponent(ContCommandComponent::class)){
					$this->hasCont = true;
					$this->contComponents[] = $node->asContCommandComponent();
				}
			}
		}

		foreach($this->allNodes as $node){
			$node->resolve($this);
		}
		foreach($this->allNodes as $node){
			$node->init();
		}

		if($this->hasCont){
			$this->getPlugin()->getScheduler()->scheduleRepeatingTask(new CallbackTask([$this, "cleanContAction"]), 600);
		}
	}

	public function getPlugin() : Plugin{
		return $this->plugin;
	}

	public function getAdapter() : KineticAdapter{
		return $this->adapter;
	}

	public function getFormHandler() : FormHandler{
		return $this->formHandler;
	}

	public function hasCont() : bool{
		return $this->hasCont;
	}

	/**
	 * @return ContCommandComponent[]
	 */
	public function getContComponents() : array{
		return $this->contComponents;
	}


	public function setContAction(CommandSender $sender, callable $action) : void{
		assert($this->hasCont);
		$this->contAction[$sender] = [$action, microtime(true) + self::$CONT_ACTION_EXPIRY_TIME];
	}

	public function getContAction(CommandSender $sender) : ?callable{
		assert($this->hasCont);
		return $this->contAction->contains($sender) ? $this->contAction[$sender] : null;
	}

	public function consumeContAction(CommandSender $sender) : ?callable{
		assert($this->hasCont);
		if($this->contAction->contains($sender)){
			$callable = $this->contAction[$sender];
			$this->contAction->detach($sender);
			return $callable;
		}

		return null;
	}

	public function cleanContAction() : void{
		assert($this->hasCont);

		$detaches = [];
		foreach($this->contAction as $sender){
			if($this->contAction[$sender][1] < microtime(true)){
				$detaches[] = $sender;
			}
		}
		foreach($detaches as $detach){
			$this->contAction->detach($detach);
		}
	}


	public function getNodeById(string $id) : ?KineticNode{
		return $this->idMap[$id] ?? null;
	}

	public function clickNode(string $id, CommandSender $user) : void{
		$node = $this->getNodeById($id);
		if($node === null){
			throw new InvalidArgumentException("$id: no such node");
		}

		/** @var ClickableInterface $clickable */
		$clickable = $node->findComponentsByInterface(ClickableInterface::class, 1)[0];

		$request = new WindowRequest($this, $user);

		$clickable->onClick($request);
	}


	public function translate(?CommandSender $context, ?string $identifier, array $args = []) : string{
		if($identifier === "" || $identifier === null){
			return "";
		}

		try{
			return $this->adapter->getMessage($context, $identifier, $args);
		}catch(InvalidArgumentException $ex){
			$locale = $context instanceof Player ? $context->getLocale() : "en_US";
			if(isset(libkinetic::MESSAGES[$identifier][$locale])){
				$message = libkinetic::MESSAGES[$identifier][$locale];
				foreach($args as $k => $v){
					$message = str_replace("\${{$k}}", $v, $message);
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

	public function resolveClass(KineticNode $node, ?string $fqn, ?string $super, string $namespace) : ?object{
		if($fqn === null){
			return null;
		}

		if($fqn{0} === '$'){
			$object = $this->adapter->getInstantiable(substr($fqn, 1));
			if($super !== null && !($object instanceof $super)){
				throw new InvalidNodeException("$fqn does not extend/implement $super", $node);
			}
			return $object;
		}

		$args = "";
		if(($pos = mb_strpos($fqn, ":")) !== false){
			$args = mb_substr($fqn, $pos + 1);
			$fqn = mb_substr($fqn, 0, $pos);
		}

		if($fqn{0} === "\\"){
			$class = substr($fqn, 1);
		}elseif($fqn{0} === "!"){
			$class = libkinetic::getNamespace() . "\\Defaults\\" . substr($fqn, 1);
		}else{
			$class = $namespace . $fqn;
		}

		if(!class_exists($class)){
			throw new InvalidNodeException("Class \"$class\" ($fqn) does not exist", $node);
		}

		if($super !== null && !is_subclass_of($class, $super)){
			throw new InvalidNodeException("Class \"$class\" ($fqn) does not extend/implement $super", $node);
		}

		$class = new ReflectionClass($class);
		if(!$class->isInstantiable()){
			throw new InvalidNodeException("Class \"$class\" ($fqn) is not instantiable", $node);
		}
		$constructor = $class->getConstructor();
		if($constructor === null || $constructor->getNumberOfParameters() === 0){
			return $class->newInstance();
		}

		if($constructor->getNumberOfRequiredParameters() > 1){
			throw new InvalidNodeException("Class must only accept one required parameter", $node);
		}

		$param = $constructor->getParameters()[0];
		if($param->getClass() === null){
			return $class->newInstance($args);
		}

		if($param->getClass()->isInstance($this)){
			return $class->newInstance($this, $args);
		}

		if($param->getClass()->isInstance($this->plugin)){
			return $class->newInstance($this->plugin, $args);
		}

		return $class->newInstance($args);
	}
}
