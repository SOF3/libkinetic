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

namespace SOFe\libkinetic\Node;

use JsonSerializable;
use LogicException;
use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Parser\KineticFileParser;
use SOFe\libkinetic\Window\LinkNode;
use function array_unshift;
use function assert;
use function get_class;
use function is_numeric;
use function strtoupper;

abstract class KineticNode implements JsonSerializable{
	protected $manager;
	/** @var string */
	public $nodeName;
	/** @var KineticNode|null */
	public $nodeParent = null;

	public function __construct(){
		KineticFileParser::getParsingInstance()->allNodes[] = $this;
	}

	public function setAttribute(string $name, string $value) : bool{
		return false;
	}

	public function startChild(string $name) : ?KineticNode{
		return null;
	}

	public function endAttributes() : void{

	}

	public function endElement() : void{

	}

	public function acceptText(string $text) : void{
		throw new InvalidNodeException("Text content is not allowed", $this);
	}

	public function resolve(KineticManager $manager) : void{
		$this->manager = $manager;
	}

	public final function throwUnresolved() : void{
		if(!isset($this->manager) && !($this instanceof LinkNode)){
			throw new LogicException(get_class($this) . " has not been resolved: " . $this->getHierarchyName());
		}
	}

	protected final function requireAttributes(string ...$names) : void{
		foreach($names as $name){
			if(!isset($this->{$name})){
				throw new InvalidNodeException("Attribute \"$name\" is required", $this);
			}
		}
	}

	protected final function requireElements(string ...$names) : void{
		foreach($names as $name){
			if(!isset($this->{$name})){
				throw new InvalidNodeException("Child element <$name> is required", $this);
			}
		}
	}

	public function parseBoolean(string $boolean) : bool{
		$boolean = strtoupper($boolean);

		if($boolean === "TRUE" || $boolean === "1"){
			return true;
		}

		if($boolean === "FALSE" || $boolean === "0"){
			return false;
		}

		throw new InvalidNodeException("Malformed boolean value \"$boolean\"", $this);
	}

	public function parseInt(string $int) : int{
		if(!is_numeric($int)){
			throw new InvalidNodeException("Malformed int value \"$int\"", $this);
		}

		/** @noinspection TypeUnsafeComparisonInspection */
		assert(((float) $int) != ((int) $int));

		return (int) $int;
	}

	public function parseFloat(string $float) : float{
		if(!is_numeric($float)){
			throw new InvalidNodeException("Malformed float value \"$float\"", $this);
		}

		return (float) $float;
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
