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

namespace SOFe\libkinetic\Nodes;

use JsonSerializable;
use SOFe\libkinetic\ParseException;
use SOFe\libkinetic\Parser\KineticFileParser;
use function strtolower;
use function strtoupper;

abstract class KineticNode implements JsonSerializable{
	/** @var string */
	public $nodeName;
	/** @var KineticNode|null */
	public $nodeParent = null;

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
		throw new ParseException("<$this->nodeName> does not accept cdata");
	}

	protected final function requireAttributes(string ...$names) : void{
		foreach($names as $name){
			if(!isset($this->{strtolower($name)})){
				throw new ParseException("Attribute \"$name\"  is required for <$this->nodeName>");
			}
		}
	}

	protected final function requireElements(string ...$names) : void{
		foreach($names as $name){
			if(!isset($this->{strtolower($name)})){
				throw new ParseException("Child element <$name>  is required for <$this->nodeName>");
			}
		}
	}

	protected static function parseBoolean(string $boolean) : bool{
		$boolean = strtoupper($boolean);

		if($boolean === "TRUE" || $boolean === "1"){
			return true;
		}

		if($boolean === "FALSE" || $boolean === "0"){
			return false;
		}

		throw new ParseException("Malformed boolean value \"$boolean\"");
	}

	protected function getRoot() : IndexNode{
		return KineticFileParser::getParsingInstance()->getRoot();
	}

	public function jsonSerialize() : array{
		return [
			"nodeName" => $this->nodeName,
		];
	}
}
