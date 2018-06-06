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
use SOFe\Libkinetic\Form\FormHandler;
use SOFe\Libkinetic\Parser\JsonFileParser;
use SOFe\Libkinetic\Parser\KineticFileParser;
use SOFe\Libkinetic\Parser\XmlFileParser;
use function class_uses;
use function extension_loaded;
use function in_array;
use function mb_strpos;
use function mb_substr;
use function str_replace;
use function substr;

class KineticManager{
	/** @var Plugin */
	protected $plugin;
	/** @var KineticAdapter */
	protected $adapter;
	/** @var KineticFileParser */
	protected $parser;
	/** @var FormHandler */
	protected $formHandler;

	public function __construct(Plugin $plugin, KineticAdapter $adapter, string $xmlResource = "kinetic.xml", string $jsonResource = "kinetic.json"){
		KineticFileParser::$hasPm = true;
		$this->plugin = $plugin;
		if(in_array(KineticAdapterBase::class, class_uses($adapter), true)){
			/** @noinspection PhpUndefinedMethodInspection */
			$adapter->kinetic_setPlugin($plugin);
		}
		$this->adapter = $adapter;

		$this->formHandler = new FormHandler($this);

		if(extension_loaded("xml")){
			$plugin->getLogger()->info("Loading XML kinetic file $xmlResource");
			$this->parser = new XmlFileParser($plugin->getResource($xmlResource), $xmlResource);
		}else{
			$plugin->getLogger()->info("Loading JSON kinetic file $jsonResource");
			$this->parser = new JsonFileParser($plugin->getResource($jsonResource), $jsonResource);
		}

		$this->parser->parse();

		foreach($this->parser->allNodes as $node){
			$node->init($this);
		}
	}

	public function getNodeById(string $id) : ?KineticNode{
		return $this->parser->idMap[$id] ?? null;
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

	public function getPlugin() : Plugin{
		return $this->plugin;
	}

	public function getAdapter() : KineticAdapter{
		return $this->adapter;
	}

	public function getParser() : KineticFileParser{
		return $this->parser;
	}

	public function getFormHandler() : FormHandler{
		return $this->formHandler;
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

	public function resolveClass(KineticNode $node, ?string $fqn, ?string $super) : ?object{
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
			$class = $this->parser->getRoot()->asRootComponent()->getNamespace() . $fqn;
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

//	public function clickWindow(Player $player, string $id, WindowRequest $request) : void{
//		if(!isset($this->parser->idMap[$id]) || !($this->parser->idMap[$id] instanceof WindowNode)){
//			throw new \InvalidArgumentException("$id does not exist or is not a window node");
//		}
//
//		/** @var WindowNode $window */
//		$window = $this->parser->idMap[$id];
//		try{
//			$window->onClick($request);
//		}/** @noinspection BadExceptionsProcessingInspection */catch(ClickInterruptedException $ex){
//		}
//	}
}
