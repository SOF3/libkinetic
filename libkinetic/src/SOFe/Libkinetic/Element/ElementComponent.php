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
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\WindowRequest;

abstract class ElementComponent extends KineticComponent{
	public const CAT = ElementComponent::class . "::cat";

	/** @var string */
	protected $id;
	/** @var string */
	protected $title;
	/** @var bool|null */
	protected $required = null;

	public static function cat($value){
		return $value;
	}

	/**
	 * @param string $value
	 * @param string $type
	 * @return float|int|string
	 */
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

	public function setAttribute(string $name, string $value) : bool{
		if($name === "ID"){
			$this->id = $value;
			return true;
		}

		if($name === "TITLE"){
			$this->title = $value;
			return true;
		}

		if($name==="REQUIRED"){
			$this->required = $this->parseBoolean($value);
		}

		return false;
	}

	public function endElement() : void{
		$this->requireAttribute("id", $this->id);
		$this->requireAttribute("title", $this->title);
	}

	public function init() : void{
		$this->requireTranslation($this->title);
	}

	public function getId() : string{
		return $this->id;
	}

	public function getTitle() : string{
		return $this->title;
	}

	public function isRequired() : ?bool{
		return $this->required;
	}

	public abstract function asFormComponent(WindowRequest $request, callable &$adapter) : array;
}
