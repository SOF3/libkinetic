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

namespace SOFe\libkinetic\Parser;

use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Node\KineticNodeWithId;
use SOFe\libkinetic\Node\RootNode;
use SOFe\libkinetic\ParseException;
use function explode;
use function strpos;
use function substr;
use function trim;

abstract class KineticFileParser{
	public static $hasPm = false;

	/** @var KineticNode[]|KineticNodeWithId[] */
	public $idMap = [];
	/** @var KineticNode[] */
	public $allNodes = [];

	/** @var RootNode|null */
	protected $root = null;
	/** @var KineticNode|null */
	protected $leaf = null;

	protected $dataBuffer = "";

	public function __construct(){
	}

	public function startElement($parser, string $name, array $attrs) : void{
		$this->flushBuffer();
		if($this->leaf === null){
			if($name !== "KINETIC" && $name !== "ROOT"){
				throw new ParseException("<$name> is not an acceptable root element");
			}

			$this->allNodes[] = $this->leaf = $this->root = new RootNode();
			foreach($attrs as $k => $v){
				$this->leaf->setAttribute($k, $v);
			}
		}else{
			$leaf = $this->leaf->startChild($name);
			if($leaf === null){
				throw new InvalidNodeException("<{$name}> is not a valid child node", $this->leaf);
			}
			$leaf->nodeParent = $this->leaf;
			$this->allNodes[] = $this->leaf = $leaf;
		}

		$this->leaf->nodeName = $name;

		foreach($attrs as $attr => $value){
			if($attr === "XMLNS" || strpos($attr, "XMLNS:") === 0){
				continue;
			}
			if(strpos($attr, ":") !== false){
				$attr = substr($attr, strpos($attr, ":") + 1);
			}
			if(!$this->leaf->setAttribute($attr, $value)){
				throw new InvalidNodeException("<$name> does not accept the attribute $attr", $this->leaf);
			}
		}

		$this->leaf->endAttributes();

		if($this->leaf instanceof KineticNodeWithId){
			if(isset($this->idMap[$this->leaf->getId()])){
				throw new InvalidNodeException("Duplicate ID {$this->leaf->getId()}", $this->leaf);
			}
			$this->idMap[$this->leaf->getId()] = $this->leaf;
		}
	}

	public function endElement($parser, string $name) : void{
		$this->flushBuffer();
		if($name !== $this->leaf->nodeName){
			throw new ParseException("Closing tag </$name> does not match opening tag <{$this->leaf->nodeName}>");
		}
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

	public function getRoot() : RootNode{
		return $this->root;
	}

	public function getNamespace() : string{
		return $this->root->getNamespace();
	}

	public abstract function parse();
}
