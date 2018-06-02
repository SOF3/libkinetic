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

use Iterator;
use SOFe\Libkinetic\InvalidFormResponseException;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\WindowRequest;
use function is_numeric;
use function strtolower;

class SliderComponent extends KineticComponent implements EditableElementInterface{
	/** @var float */
	protected $min, $max;
	/** @var float */
	protected $step = 1.0;
	/** @var float */
	protected $default;

	public function dependsComponents() : Iterator{
		yield ElementComponent::class;
	}

	public function setAttribute(string $name, string $value) : bool{
		if($name === "MIN" || $name === "MAX" || $name === "STEP" || $name === "DEFAULT"){
			if(!is_numeric($value)){
				$this->throw("$name should contain a numeric value");
			}
			$this->{strtolower($name)} = (float) $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		$this->requireAttribute("min", $this->min);
		$this->requireAttribute("max", $this->max);
		if(!isset($this->default)){
			$this->default = $this->min;
		}
	}

	public function getDefault() : float{
		return $this->default;
	}

	public function getDefaultAsString() : ?string{
		return $this->default !== null ? (string) $this->default : null;
	}

	public function asFormComponent(WindowRequest $request, callable $onComplete) : void{
		$onComplete([
			"type" => "slider",
			"text" => $request->translate($this->asElementComponent()->getTitle()),
			"min" => $this->min,
			"max" => $this->max,
			"step" => $this->step,
			"default" => $this->default,
		], [$this, "adapter"]);
	}

	public function adapter(float $value) : float{
		if($value < $this->min || $value > $this->max){
			throw new InvalidFormResponseException("Slider value should be between $this->min and $this->max, got $value");
		}
		return $value;
	}
}
