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
use function strtoupper;

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
					$this->default = ElementComponent::typeCast($this->default, $this->typeCast);
				}catch(InvalidArgumentException $e){
					$this->throw($e->getMessage());
				}
			}
			return true;
		}

		if($name === "TYPECAST"){
			$this->typeCast = strtoupper($value);
			try{
				$this->default = ElementComponent::typeCast($this->default, $this->typeCast);
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

	public function asFormComponent(WindowRequest $request, callable $onComplete) : void{
		$onComplete([
			"type" => "input",
			"text" => $request->translate($this->node->asElement()->getTitle()),
			"placeholder" => $request->translate($this->placeholder),
			"default" => $this->default,
		], [$this, "adapter"]);
	}

	public function adapter(string $value){
		return ElementComponent::typeCast($value, $this->typeCast);
	}
}
