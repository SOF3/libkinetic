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
use function strtolower;
use function strtoupper;

abstract class KineticNode implements JsonSerializable{
	/** @var string */
	public $name;
	/** @var KineticNode|null */
	public $parent = null;

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
		throw new ParseException("<$this->name> does not accept cdata");
	}

	protected function requireAttribute(string ...$names) : void{
		foreach($names as $name){
			if(!isset($this->{strtolower($name)})){
				throw new ParseException("Attribute \"$name\"  is required for <$this->name>");
			}
		}
	}

	protected function requireElements(string ...$names) : void{
		foreach($names as $name){
			if(!isset($this->{strtolower($name)})){
				throw new ParseException("Child element <$name>  is required for <$this->name>");
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

	public function jsonSerialize() : array{
		return [
			"name" => $this->name,
		];
	}
}
