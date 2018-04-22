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

namespace SOFe\libkinetic\Nodes\Element;

use SOFe\libkinetic\ParseException;
use function is_numeric;
use function strtoupper;
use function trim;

class InputNode extends ElementNode{
	/** @var string */
	protected $placeholder = "";
	/** @var mixed */
	protected $default = "";
	/** @var string */
	protected $typeCast = "";

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "PLACEHOLDER"){
			$this->placeholder = $value;
			return true;
		}

		if($name === "DEFAULT"){
			$this->default = $value;
			if($this->typeCast){
				$this->default = self::typeCast($this->default, $this->typeCast, ParseException::class);
			}
			return true;
		}

		if($name === "TYPECAST"){
			$this->typeCast = $value;
			$this->default = self::typeCast($this->default, $this->typeCast, ParseException::class);
			return true;
		}

		return false;
	}

	protected static function typeCast(string $value, string $type, string $exception = null){
		if($value === "" && $exception === null){
			return "";
		}

		switch(strtoupper($type)){
			case "INT":
			case "INTEGER":
				if(!is_numeric(trim($value))){
					throw new $exception("Not an integer");
				}
				return (int) trim($value);

			case "FLOAT":
			case "DOUBLE":
				if(!is_numeric(trim($value))){
					throw new $exception("Not a number");
				}
				return (float) trim($value);

			case "":
			case "STRING":
				return $value;
		}

		throw new ParseException("Unknown typeCast $type");
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"placeholder" => $this->placeholder,
				"default" => $this->default,
				"typeCast" => $this->typeCast,
			];
	}
}
