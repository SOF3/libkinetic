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

use pocketmine\Player;
use pocketmine\plugin\Plugin;
use ReflectionClass;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Parser\JsonFileParser;
use SOFe\libkinetic\Parser\KineticFileParser;
use SOFe\libkinetic\Parser\XmlFileParser;
use SOFe\libkinetic\Window\Entry\Item\InteractListener;
use SOFe\libkinetic\Window\Entry\Item\ItemFilter;
use function extension_loaded;
use function substr;

class KineticManager{
	/** @var Plugin */
	protected $plugin;
	/** @var KineticAdapter */
	protected $adapter;
	/** @var KineticFileParser */
	protected $parser;

	/** @var InteractListener|null */
	protected $interactListener = null;

	public function __construct(Plugin $plugin, KineticAdapter $provider, string $xmlResource, string $jsonResource){
		KineticFileParser::$hasPm = true;
		$this->plugin = $plugin;
		$this->adapter = $provider;
		$plugin->getServer()->getPluginManager()->registerEvents(new FormListener($this), $plugin);

		if(extension_loaded("xml")){
			$plugin->getLogger()->info("Loading XML kinetic file $xmlResource");
			KineticFileParser::$parsingInstance = $this->parser =
				new XmlFileParser($plugin->getResource($xmlResource), $xmlResource);
		}else{
			$plugin->getLogger()->info("Loading JSON kinetic file $xmlResource");
			KineticFileParser::$parsingInstance = $this->parser =
				new JsonFileParser($plugin->getResource($xmlResource), $xmlResource);
		}

		$this->parser->parse();

		$this->parser->getRoot()->resolve($this);

		foreach($this->parser->allNodes as $node){
			$node->throwUnresolved();
		}

		KineticFileParser::$parsingInstance = null;
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

	public function registerItemHandler(ItemFilter $filter) : void{
		if($this->interactListener === null){
			$this->interactListener = new InteractListener($this);
			$this->plugin->getServer()->getPluginManager()->registerEvents($this->interactListener, $this->plugin);
		}

		$this->interactListener->filters[] = $filter;
	}


	public function translate(?Player $context, string $identifier, array $args = []) : string{
		return $this->adapter->getMessage($context, $identifier, $args);
	}


	public function requireTranslation(KineticNode $node, string $key) : void{
		if(!$this->adapter->hasMessage($key)){
			throw new InvalidNodeException("The translation $key is undefined", $node);
		}
	}

	public function resolveClass(KineticNode $node, string $fqn, ?string $super = null) : object{
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
}
