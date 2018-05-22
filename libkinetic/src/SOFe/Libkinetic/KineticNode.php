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

use JsonSerializable;
use function array_unshift;
use function assert;

final class KineticNode extends ComponentAdapter implements JsonSerializable{
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
		assert($this->components[$class] instanceof KineticComponent, "{$this->getHierarchyName()} does not have a $class");
		return $this->components[$class];
	}

	public function setAttribute(string $name, string $value) : bool{
		foreach($this->components as $component){
			if($component->setAttribute($name, $value)){
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

	public function endElement() : void{
		$this->endElementCalled = true;
	}

	public function acceptText(string $text) : void{
		foreach($this->components as $component){
			if($component->acceptText($text)){
				return;
			}
		}
		throw new InvalidNodeException("Text content is not allowed", $this);
	}

	public function isRoot() : bool{
		return $this->nodeParent === null;
	}

	public function getHierarchyName() : string{
		$node = $this;
		$elementNameStack = [];
		while(!($node instanceof KineticNodeWithId)){
			$node = $node->nodeParent;
			array_unshift($elementNameStack, "<" . $node->nodeName . ">");
		}
		return $node->getId() . implode("", $elementNameStack);
	}

	public function jsonSerialize() : array{
		return [
			"nodeName" => $this->nodeName,
		];
	}
}
