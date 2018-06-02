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

use Generator;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\KineticNode;

class ElementParentComponent extends KineticComponent{
	/** @var ElementInterface[] */
	protected $elements = [];

	public function startChild(string $name) : ?KineticNode{
		if($name === "LABEL"){
			return KineticNode::create(LabelComponent::class, ...$this->extraComponents())->addLabelComponent($this->elements);
		}
		if($name === "INPUT"){
			return KineticNode::create(InputComponent::class, ...$this->extraComponents())->addInputComponent($this->elements);
		}
		if($name === "TOGGLE"){
			return KineticNode::create(ToggleComponent::class, ...$this->extraComponents())->addToggleComponent($this->elements);
		}
		if($name === "SLIDER"){
			return KineticNode::create(SliderComponent::class, ...$this->extraComponents())->addSliderComponent($this->elements);
		}
		if($name === "DROPDOWN"){
			return KineticNode::create(StaticDropdownComponent::class, ...$this->extraComponents())->addStaticDropdownComponent($this->elements);
		}
		if($name === "STEP" . "SLIDER"){
			return KineticNode::create(StaticStepSliderComponent::class, ...$this->extraComponents())->addStaticStepSliderComponent($this->elements);
		}
		if($name === "DYN" . "DROPDOWN"){
			return KineticNode::create(DynamicDropdownComponent::class, ...$this->extraComponents())->addDynamicDropdownComponent($this->elements);
		}
		if($name === "DYN" . "STEP" . "SLIDER"){
			return KineticNode::create(DynamicStepSliderComponent::class, ...$this->extraComponents())->addDynamicStepSliderComponent($this->elements);
		}

		return null;
	}

	protected function extraComponents() : Generator{
		yield RequiredComponent::class;
	}

	/**
	 * @return ElementInterface[]
	 */
	public function getElements() : array{
		return $this->elements;
	}
}
