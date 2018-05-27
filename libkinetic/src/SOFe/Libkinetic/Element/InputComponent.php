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

namespace SOFe\Libkinetic\Element;

use InvalidArgumentException;
use Iterator;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\WindowRequest;
use function is_numeric;
use function strtoupper;
use function trim;

class InputComponent extends KineticComponent implements EditableElementInterface{
	/** @var string */
	protected $placeholder = "";
	/** @var mixed */
	protected $default = "";
	/** @var string */
	protected $typeCast = "";

	public function dependsComponents() : Iterator{
		yield ElementComponent::class;
	}

	public function setAttribute(string $name, string $value) : bool{
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
					$this->throw($e->getMessage());
				}
			}
			return true;
		}

		if($name === "TYPECAST"){
			$this->typeCast = strtoupper($value);
			try{
				$this->default = self::typeCast($this->default, $this->typeCast);
			}catch(InvalidArgumentException $e){
				$this->throw($e->getMessage());
			}
			return true;
		}

		return false;
	}

	public function init() : void{
		$this->requireTranslation($this->placeholder);
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
			"text" => $request->translate($this->node->asElement()->getTitle()),
			"placeholder" => $request->translate($this->placeholder),
			"default" => $this->default,
		];
	}
}
