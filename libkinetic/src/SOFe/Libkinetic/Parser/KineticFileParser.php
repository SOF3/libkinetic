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

namespace SOFe\Libkinetic\Parser;

use SOFe\Libkinetic\AbsoluteIdComponent;
use SOFe\Libkinetic\InvalidNodeException;
use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\ParseException;
use SOFe\Libkinetic\Root\RootComponent;
use function explode;
use function strpos;
use function substr;
use function trim;

abstract class KineticFileParser{
	public const LIBKINETIC_XMLNS = "https://rawgit.com/SOF3/libkinetic/master/libkinetic.xsd";

	public static $hasPm = false;

	public $xmlnsMap = [
		"" => self::LIBKINETIC_XMLNS,
	];

	/** @var KineticNode[] */
	public $idMap = [];
	/** @var KineticNode[] */
	public $allNodes = [];

	/** @var KineticNode|null */
	protected $root = null;
	/** @var KineticNode|null */
	protected $leaf = null;

	protected $dataBuffer = "";

	public function __construct(){
	}

	public function startElement($parser, string $elementName, array $attrs) : void{
		$this->flushBuffer();

		$isRoot = $this->leaf === null;
		if(strpos($elementName, ":") !== false){
			[$ns, $elementName] = explode(":", $elementName, 2);
			if(!$isRoot && !isset($this->xmlnsMap[$ns])){
				throw new ParseException("Undefined XML element namespace $ns");
			}
		}else{
			$ns = "";
		}
		if($isRoot){
			if($elementName !== "KINETIC" && $elementName !== "ROOT"){
				throw new ParseException("The root element must be <kinetic> or <root>");
			}

			$this->allNodes[] = $this->leaf = $this->root = KineticNode::create(RootComponent::class);
		}else{
			$leaf = $this->xmlnsMap[$ns] === self::LIBKINETIC_XMLNS ? $this->leaf->startChild($elementName) : $this->leaf->startChildNS($elementName, $this->xmlnsMap[$ns]);
			if($leaf === null){
				$xmlns = $this->xmlnsMap[$ns] === self::LIBKINETIC_XMLNS ? "" : ($this->xmlnsMap[$ns] . " : ");
				throw new InvalidNodeException("<{$xmlns}{$elementName}> is not a valid child node", $this->leaf);
			}
			$leaf->nodeParent = $this->leaf;
			$this->allNodes[] = $this->leaf = $leaf;
		}

		$this->leaf->nodeName = $elementName;

		foreach($attrs as $attr => $value){
			if($isRoot){
				if($attr === "XMLNS"){
					$this->xmlnsMap[""] = $value;
					continue;
				}
				if(strpos($attr, "XMLNS:") === 0){
					$this->xmlnsMap[substr($attr, 6)] = $value;
					continue;
				}
			}

			$ns = "";
			if(strpos($attr, ":") !== false){
				[$ns, $attr] = explode(":", $attr, 2);
			}

			if(!($this->xmlnsMap[$ns] === self::LIBKINETIC_XMLNS ? $this->leaf->setAttribute($attr, $value) : $this->leaf->setAttributeNS($attr, $value, $this->xmlnsMap[$ns]))){
				$xmlns = $this->xmlnsMap[$ns] === self::LIBKINETIC_XMLNS ? "" : ($this->xmlnsMap[$ns] . " : ");
				throw new InvalidNodeException("<{$xmlns}{$elementName}> does not accept the attribute $attr", $this->leaf);
			}
		}

		if($this->leaf->hasComponent(AbsoluteIdComponent::class)){
			if(isset($this->idMap[$this->leaf->asAbsoluteId()->getId()])){
				throw new InvalidNodeException("Duplicate ID {$this->leaf->asAbsoluteId()->getId()}", $this->leaf);
			}
			$this->idMap[$this->leaf->asAbsoluteId()->getId()] = $this->leaf;
		}
	}

	public function endElement($parser, string $name) : void{
		$this->flushBuffer();
		if($name !== $this->leaf->nodeName){
			throw new ParseException("Closing tag </$name> does not match opening tag <{$this->leaf->nodeName}>");
		}
		$this->leaf->endElement();
		$this->leaf = $this->leaf->nodeParent;
	}

	protected function flushBuffer() : void{
		$buffer = $this->dataBuffer;
		$this->dataBuffer = "";

		$lines = "";
		foreach(explode("\n", $buffer) as $line){
			$lines .= trim($line);
		}

		if($lines !== ""){
			$this->leaf->acceptText($lines);
		}
	}

	public function parseText($parser, string $data) : void{
		$this->dataBuffer .= $data;
	}

	public function getRoot() : KineticNode{
		return $this->root;
	}

	public function getNamespace() : string{
		return $this->root->asRoot()->getNamespace();
	}

	public abstract function parse();
}
