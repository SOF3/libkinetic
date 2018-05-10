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

namespace SOFe\libkinetic;

use InvalidArgumentException;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use ReflectionClass;
use RuntimeException;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Parser\JsonFileParser;
use SOFe\libkinetic\Parser\KineticFileParser;
use SOFe\libkinetic\Parser\XmlFileParser;
use SOFe\libkinetic\Window\Entry\Interact\InteractEntryPointNode;
use SOFe\libkinetic\Window\Entry\Interact\InteractListener;
use SOFe\libkinetic\Window\WindowNode;
use TypeError;
use function class_uses;
use function extension_loaded;
use function in_array;
use function microtime;
use function random_int;
use function str_replace;
use function substr;

class KineticManager{
	public static $FORM_RESEND_TIME = 10.0;

	/** @var Plugin */
	protected $plugin;
	/** @var KineticAdapter */
	protected $adapter;
	/** @var KineticFileParser */
	protected $parser;

	/** @var Form[] formId => Form */
	protected $forms = [];

	/** @var InteractListener|null */
	protected $interactListener = null;

	public function __construct(Plugin $plugin, KineticAdapter $adapter, string $xmlResource = "kinetic.xml", string $jsonResource = "kinetic.json"){
		KineticFileParser::$hasPm = true;
		$this->plugin = $plugin;
		if(in_array(KineticAdapterBase::class, class_uses($adapter), true)){
			/** @noinspection PhpUndefinedMethodInspection */
			$adapter->kinetic_setPlugin($plugin);
		}
		$this->adapter = $adapter;
		$plugin->getServer()->getPluginManager()->registerEvents(new FormListener($this), $plugin);
		$plugin->getServer()->getScheduler()->scheduleRepeatingTask(new CallbackTask($plugin, [$this, "cleanExpiredForms"]), 200);

		if(extension_loaded("xml")){
			$plugin->getLogger()->info("Loading XML kinetic file $xmlResource");
			$this->parser = new XmlFileParser($plugin->getResource($xmlResource), $xmlResource);
		}else{
			$plugin->getLogger()->info("Loading JSON kinetic file $xmlResource");
			$this->parser = new JsonFileParser($plugin->getResource($xmlResource), $xmlResource);
		}

		$this->parser->parse();

		foreach($this->parser->allNodes as $node){
			$node->validateParentsCalled();
		}

		$this->parser->getRoot()->cpn_resolve($this);

		foreach($this->parser->allNodes as $node){
			$node->throwUnresolved();
		}

	}

	public function getPlugin() : Plugin{
		return $this->plugin;
	}

	public function getAdapter() : KineticAdapter{
		return $this->adapter;
	}

	public function getParser() : KineticFileParser{
		return $this->parser;
	}

	public function registerItemHandler(InteractEntryPointNode $filter) : void{
		if($this->interactListener === null){
			$this->interactListener = new InteractListener($this);
			$this->plugin->getServer()->getPluginManager()->registerEvents($this->interactListener, $this->plugin);
		}

		$this->interactListener->filters[] = $filter;
	}


	public function translate(?Player $context, ?string $identifier, array $args = []) : string{
		if($identifier === "" || $identifier === null){
			return "";
		}

		try{
			return $this->adapter->getMessage($context, $identifier, $args);
		}catch(InvalidArgumentException $ex){
			if(isset(libkinetic::MESSAGES[$identifier][$locale = $context !== null ? $context->getLocale() : "en_US"])){
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

	public function resolveClass(KineticNode $node, string $fqn, ?string $super) : object{
		if($fqn{0} === '$'){
			$object = $this->adapter->getInstantiable(substr($fqn, 1));
			if($super !== null && !($object instanceof $super)){
				throw new InvalidNodeException("$fqn does not extend/implement $super", $node);
			}
			return $object;
		}

		if($fqn{0} === "\\"){
			$class = substr($fqn, 1);
		}elseif($fqn{0} === "!"){
			$class = libkinetic::getNamespace() . "\\" . substr($fqn, 1);
		}else{
			$class = $this->parser->getRoot()->getNamespace() . $fqn;
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
		if($param->getClass() === null || !$param->getClass()->isInstance($this->plugin)){
			return $class->newInstance();
		}

		return $class->newInstance($this->plugin);
	}


	public function clickWindow(Player $player, string $id, WindowRequest $request) : void{
		if(!isset($this->parser->idMap[$id]) || !($this->parser->idMap[$id] instanceof WindowNode)){
			throw new \InvalidArgumentException("$id does not exist or is not a window node");
		}

		/** @var WindowNode $window */
		$window = $this->parser->idMap[$id];
		try{
			$window->onClick($request);
		}/** @noinspection BadExceptionsProcessingInspection */catch(ClickInterruptedException $ex){
		}
	}


	public function sendForm(Player $target, array $formData, callable $handler) : int{
		$form = new Form();
		$form->formId = random_int(0, 0x7FFFFFFF);
		$form->formData = $formData;
		$form->onReceive = $handler;
		$form->target = $target;

		$this->forms[$form->formId] = $form;
		$form->sendPacket();
		return $form->formId;
	}

	public function handleFormResponse(Player $player, int $formId, $response) : void{
		if(!isset($this->forms[$formId])){
			return;
		}

		$form = $this->forms[$formId];
		if($player !== $form->target){
			$this->plugin->getLogger()->error("{$player->getName()} tried respond to a form that was sent to {$form->target->getName()}. There is 99.99999999999999% chance that the plugin is outdated, shoghi needs to be blamed or the player is hacking poorly.");
			return;
		}
		unset($this->forms[$formId]);

		try{
			$result = ($form->onReceive)($response, $player);
			if($result === true){
				$this->sendForm($player, $form->formData, $form->onReceive);
			}
		}/** @noinspection BadExceptionsProcessingInspection */catch(ResendFormException $ex){
			$this->forms[$formId] = $form;
			$form->sendPacket();
		}catch(TypeError|InvalidFormResponseException $error){
			throw new RuntimeException("{$player->getName()} responded to a form with invalid data. Is {$this->plugin->getName()} using an outdated version of libkinetic?", 0, $error);
		}
	}

	public function cleanExpiredForms() : void{
		foreach($this->forms as $formId => $form){
			if(!$form->target->isOnline()){
				unset($this->forms[$formId]);
				continue;
			}

			if($form->sendTime + self::$FORM_RESEND_TIME < microtime(true)){
				$form->sendPacket();
			}
		}
	}
}
