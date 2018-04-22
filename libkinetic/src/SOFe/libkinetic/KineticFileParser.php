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

use SOFe\libkinetic\Nodes\KineticNode;
use SOFe\libkinetic\Nodes\Window\IndexNode;
use function strpos;
use function substr;
use function trim;
use function xml_set_character_data_handler;
use function xml_set_element_handler;
use function xml_set_object;

class KineticFileParser{
	/** @var KineticNode|null */
	private $root = null;
	/** @var KineticNode|null */
	private $leaf = null;

	/** @var string */
	private $namespace = "";

	private $dataBuffer = "";

	public function __construct($parser){
		xml_set_object($parser, $this);
		xml_set_element_handler($parser, "startElement", "endElement");
		xml_set_character_data_handler($parser, "parseText");
	}

	public function startElement($parser, string $name, array $attrs) : void{
		$this->flushBuffer();
		if($this->leaf === null){
			if($name === "INDEX"){
				$this->leaf = $this->root = new IndexNode();
			}else{
				throw new ParseException("<$name> is not an acceptable root element");
			}

			if(isset($attrs["NAMESPACE"])){
				$this->namespace = trim($attrs["NAMESPACE"], "\\");
				if($this->namespace !== null){
					$this->namespace .= "\\";
				}
				unset($attrs["NAMESPACE"]);
			}
		}else{
			$leaf = $this->leaf->startChild($name);
			if($leaf === null){
				throw new ParseException("<{$this->leaf->name}> does not accept <$name> as a child node");
			}
			$leaf->parent = $this->leaf;
			$this->leaf = $leaf;
		}

		$this->leaf->name = $name;

		foreach($attrs as $attr => $value){
			if($attr === "XMLNS" || strpos($attr, "XMLNS:") === 0){
				continue;
			}
			if(strpos($attr, ":") !== false){
				$attr = substr($attr, strpos($attr, ":") + 1);
			}
			if(!$this->leaf->setAttribute($attr, $value)){
				throw new ParseException("<$name> does not accept the attribute $attr");
			}
		}

		$this->leaf->endAttributes();
	}

	public function endElement($parser, string $name) : void{
		$this->flushBuffer();
		if($name !== $this->leaf->name){
			throw new ParseException("Closing tag </$name> does not match opening tag <{$this->leaf->name}>");
		}
	}

	private function flushBuffer() : void{
		$buffer = trim($this->dataBuffer);
		$this->dataBuffer = "";
		if($buffer !== ""){
			$this->leaf->acceptText($buffer);
		}
	}

	public function parseText($parser, string $data) : void{
		$this->dataBuffer .= $data;
	}

	public function getRoot() : ?KineticNode{
		return $this->root;
	}
}
