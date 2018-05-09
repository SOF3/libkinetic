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

use SOFe\libkinetic\InvalidFormResponseException;
use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\WindowRequest;
use function is_numeric;
use function strtolower;

class SliderNode extends EditableElementNode{
	/** @var float */
	protected $min, $max;
	/** @var float */
	protected $step = 1.0;
	/** @var float */
	protected $default;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "MIN" || $name === "MAX" || $name === "STEP" || $name === "DEFAULT"){
			if(!is_numeric($value)){
				throw new InvalidNodeException("$name should contain a numeric value", $this);
			}
			$this->{strtolower($name)} = (float) $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->requireAttributes("min", "max");
		if(!isset($this->default)){
			$this->default = $this->min;
		}
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"min" => $this->min,
				"max" => $this->max,
				"step" => $this->step,
				"default" => $this->default,
			];
	}

	public function getDefault() : float{
		return $this->default;
	}

	public function getDefaultAsString() : ?string{
		return $this->default !== null ? (string) $this->default : null;
	}

	public function asFormComponent(WindowRequest $request, callable &$adapter) : array{
		$adapter = function(float $value) : float{
			if($value < $this->min || $value > $this->max){
				throw new InvalidFormResponseException("Slider value should be between $this->min and $this->max, got $value");
			}

			return (float) $value;
		};

		return [
				"type" => "slider",
				"text" => $request->translate($this->title),
				"min" => $this->min,
				"max" => $this->max,
				"step" => $this->step,
				"default" => $this->default,
			];
	}
}
