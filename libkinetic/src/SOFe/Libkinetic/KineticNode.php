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

use AssertionError;
use JsonSerializable;
use function array_unshift;
use function assert;
use function count;

final class KineticNode implements JsonSerializable{
	use ComponentAdapter;

	/** @var KineticManager */
	protected $manager;

	/** @var KineticComponent[] */
	protected $components = [];

	/** @var string */
	public $nodeName;
	/** @var KineticNode|null */
	public $nodeParent = null;

	public static function create(string ...$components) : KineticNode{
		$node = new KineticNode();
		$node->addComponent(...$components);
		return $node;
	}

	public function hasComponent(string $class) : bool{
		return isset($this->components[$class]);
	}

	public function addComponent(string ...$classes) : void{
		foreach($classes as $class){
			if(!isset($this->components[$class])){
				/** @var KineticComponent $component */
				$this->components[$class] = $component = new $class($this);
				$this->addComponent(...$component->dependsComponents());
			}
		}
	}

	public function getComponent(string $class) : KineticComponent{
		assert((function(string $class) : bool{
			if(!isset($this->components[$class]) && !($this->components[$class] instanceof $class)){
				throw new AssertionError("{$this->getHierarchyName()} does not have a {$class}");
			}
			return true;
		})($class));
		return $this->components[$class];
	}

	/**
	 * @param string $interface
	 * @param int    $assertMinimum
	 * @return KineticComponent[]
	 */
	public function findComponentsByInterface(string $interface, int $assertMinimum = 0) : array{
		$ret = [];
		foreach($this->components as $component){
			if($component instanceof $interface){
				$ret[] = $component;
			}
		}
		assert(count($ret) >= $assertMinimum);
		return $ret;
	}

	/**
	 * Finds the first (closest, i.e. most indented) ancestor, including $this, with the provided component
	 * @param string $class
	 * @return null|KineticNode
	 */
	public function findFirstAncestorComponent(string $class) : ?KineticNode{
		if($this->hasComponent($class)){
			return $this;
		}
		return $this->nodeParent !== null ? $this->nodeParent->findFirstAncestorComponent($class) : null;
	}

	public function getManager() : KineticManager{
		return $this->manager;
	}

	public function setAttribute(string $name, string $value) : bool{
		foreach($this->components as $component){
			if($component->setAttribute($name, $value)){
				return true;
			}
		}
		return false;
	}

	public function setAttributeNS(string $name, string $value, string $ns) : bool{
		foreach($this->components as $component){
			if($component->setAttributeNS($name, $value, $ns)){
				return true;
			}
		}
		return false;
	}

	public function startChild(string $name) : ?KineticNode{
		foreach($this->components as $component){
			if(($child = $component->startChild($name)) !== null){
				return $child;
			}
		}
		return null;
	}

	public function startChildNS(string $name, string $ns) : ?KineticNode{
		foreach($this->components as $component){
			if(($child = $component->startChildNS($name, $ns)) !== null){
				return $child;
			}
		}
		return null;
	}

	public function endElement() : void{
	}

	public function acceptText(string $text) : void{
		foreach($this->components as $component){
			if($component->acceptText($text)){
				return;
			}
		}
		throw new InvalidNodeException("Text content is not allowed", $this);
	}

	public function init(KineticManager $manager) : void{
		$this->manager = $manager;

		// validate and resolve runtime-only values
		foreach($this->components as $component){
			$component->setManager($manager);
			$component->resolve();
		}

		// register handlers against the PocketMine interface as necessary
		foreach($this->components as $component){
			$component->init();
		}
	}

	public function isRoot() : bool{
		return $this->nodeParent === null;
	}

	public function getHierarchyName() : string{
		$elementNameStack = [];
		for($node = $this; !$node->hasComponent(AbsoluteIdComponent::class); $node = $node->nodeParent){
			array_unshift($elementNameStack, "<" . $node->nodeName . ">");
		}
		return $node->asAbsoluteIdComponent()->getId() . implode(".", $elementNameStack);
	}

	public function jsonSerialize() : array{
		return [
			"nodeName" => $this->nodeName,
		];
	}
}
