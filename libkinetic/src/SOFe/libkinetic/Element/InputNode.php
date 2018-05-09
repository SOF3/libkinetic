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

namespace SOFe\libkinetic\Element;

use InvalidArgumentException;
use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\WindowRequest;
use function is_numeric;
use function strtoupper;
use function trim;

class InputNode extends EditableElementNode{
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
				try{
					$this->default = self::typeCast($this->default, $this->typeCast);
				}catch(InvalidArgumentException $e){
					throw new InvalidNodeException($e->getMessage(), $this);
				}
			}
			return true;
		}

		if($name === "TYPECAST"){
			$this->typeCast = strtoupper($value);
			try{
				$this->default = self::typeCast($this->default, $this->typeCast);
			}catch(InvalidArgumentException $e){
				throw new InvalidNodeException($e->getMessage(), $this);
			}
			return true;
		}

		return false;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$manager->requireTranslation($this, $this->placeholder);
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"placeholder" => $this->placeholder,
				"default" => $this->default,
				"typeCast" => $this->typeCast,
			];
	}

	public function getPlaceholder() : string{
		return $this->placeholder;
	}

	public function getDefault(){
		return $this->default;
	}

	public function getDefaultAsString() : ?string{
		return $this->default ? (string) $this->default : null;
	}

	public function getTypeCast() : string{
		return $this->typeCast;
	}

	public static function typeCast(string $value, string $type){
		switch(strtoupper($type)){
			case "INT":
			case "INTEGER":
				if($value === ""){
					return 0;
				}
				if(!is_numeric(trim($value))){
					throw new InvalidArgumentException("Not an integer");
				}
				return (int) trim($value);

			case "FLOAT":
			case "DOUBLE":
				if($value === ""){
					return 0.0;
				}
				if(!is_numeric(trim($value))){
					throw new InvalidArgumentException("Not a number");
				}
				return (float) trim($value);

			case "":
			case "STRING":
				return $value;
		}

		throw new InvalidArgumentException("Invalid typeCast type \"$type\"");
	}

	public function asFormComponent(WindowRequest $request, callable &$adapter) : array{
		$adapter = function(string $value){
			return self::typeCast($value, $this->typeCast);
		};

		return [
			"type" => "input",
			"text" => $request->translate($this->title),
			"placeholder" => $request->translate($this->placeholder),
			"default" => $this->default,
		];
	}
}
