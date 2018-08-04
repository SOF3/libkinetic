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

namespace SOFe\Libkinetic\Base;

use InvalidStateException;
use RuntimeException;
use SOFe\Libkinetic\InvalidNodeException;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\Parser\KineticFileParser;
use SOFe\Libkinetic\Parser\Router\AttributeRouter;
use SOFe\Libkinetic\Parser\Router\ChildNodeRouter;
use function array_unshift;
use function assert;
use function implode;
use function is_string;

final class KineticNode{
	/** @var KineticFileParser */
	protected $parser;
	/** @var KineticManager */
	protected $manager;

	/** @var string */
	protected $ns;
	/** @var string */
	protected $name;
	/** @var KineticNode|null */
	protected $parent = null;

	/** @var KineticComponent[] */
	protected $components = [];

	/** @var AttributeRouter */
	protected $attrRouter;
	/** @var ChildNodeRouter */
	protected $childRouter;

	/**
	 * KineticNode constructor.
	 * @param KineticFileParser  $parser
	 * @param string             $ns
	 * @param string             $name
	 * @param null|KineticNode   $parent
	 * @param KineticComponent[] $components
	 */
	public function __construct(KineticFileParser $parser, string $ns, string $name, ?KineticNode $parent, array $components){
		$this->parser = $parser;
		$this->ns = $ns;
		$this->name = $name;
		$this->parent = $parent;
		foreach($components as $component){
			$this->addComponent($component);
		}
	}

	protected function addComponent(KineticComponent $component) : void{
		$componentClass = $component->getComponentClass();
		if(isset($this->components[$componentClass])){
			$next = $this->components[$componentClass]->thisOrThat($component);
			if($next === null){
				throw new RuntimeException("Split-join found with component type " . $componentClass);
			}
			$this->components[$componentClass] = $next;
		}else{
			$this->components[$componentClass] = $component;
		}
		foreach($component->getDependencies() as $dependency){
			if(is_string($dependency)){
				$dependency = new $dependency;
			}
			assert($dependency instanceof KineticComponent);
			$this->addComponent($dependency);
		}
	}

	public function hasComponent(string $componentClass) : bool{
		return isset($this->components[$componentClass]);
	}

	public function getComponent(string $componentClass) : ?KineticComponent{
		return $this->components[$componentClass] ?? null;
	}

	public function getParser() : KineticFileParser{
		return $this->parser;
	}

	public function getNs() : string{
		return $this->ns;
	}

	public function getName() : string{
		return $this->name;
	}

	public function isRoot() : bool{
		return $this->parent === null;
	}

	public function getHumanName() : string{
		return ($this->ns === KineticFileParser::XMLNS_DEFAULT ? "" : "{$this->ns}:") . $this->name;
	}

	public function getHierarchyName() : string{
		$elementNameStack = [];
		for($node = $this; $node !== null; $node = $node->getParent()){
			array_unshift($elementNameStack, "<" . $node->getHumanName() . ">");
		}
		return implode(".", $elementNameStack);
	}

	public function getParent() : ?KineticNode{
		return $this->parent;
	}

	public function getManager() : KineticManager{
		if(!isset($this->manager)){
			throw new InvalidStateException("Cannot call KineticNode::getManager() in parse stage");
		}
		return $this->manager;
	}

	public function setAttributes(array $attributes) : void{
		$this->attrRouter = new AttributeRouter($this, $attributes);
		foreach($this->components as $component){
			$component->acceptAttributes($this->attrRouter);
		}
		$this->attrRouter->checkEmpty();

		$this->childRouter = new ChildNodeRouter($this);
		foreach($this->components as $component){
			$component->acceptChildren($this->childRouter);
		}
	}

	public function startChild(string $ns, string $name) : KineticNode{
		return $this->childRouter->startChild($ns, $name);
	}

	public function endElement() : void{
		$this->childRouter->validate();
	}

	public function acceptText(string $text) : void{
		foreach($this->components as $component){
			if($component->acceptText($text)){
				return;
			}
		}
		throw new InvalidNodeException("Text content is not allowed", $this);
	}

	public function resolve(KineticManager $manager) : void{
		$this->manager = $manager;

		$this->attrRouter->resolveAll();

		foreach($this->components as $component){
			$component->setManager($manager);
			$component->resolve();
		}
	}

	public function init() : void{
		foreach($this->components as $component){
			$component->init();
		}
	}

	public function throw(string $message) : InvalidNodeException{
		throw new InvalidNodeException($message, $this);
	}
}
