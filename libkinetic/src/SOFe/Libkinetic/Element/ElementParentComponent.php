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

use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\KineticNode;

class ElementParentComponent extends KineticComponent{
	/** @var ElementInterface[] */
	protected $elements = [];

	public function startChild(string $name) : ?KineticNode{
		if($name === "LABEL"){
			return KineticNode::create(LabelComponent::class)->addLabel($this->elements);
		}

		if($name === "INPUT"){
			return KineticNode::create(InputComponent::class)->addInput($this->elements);
		}

		if($name === "TOGGLE"){
			return KineticNode::create(ToggleComponent::class)->addToggle($this->elements);
		}

		if($name === "SLIDER"){
			return KineticNode::create(SliderComponent::class)->addSlider($this->elements);
		}

		if($name === "DROPDOWN"){
			return KineticNode::create(StaticDropdownComponent::class)->addStaticDropdown($this->elements);
		}

		if($name === "STEP" . "SLIDER"){
			return KineticNode::create(StaticStepSliderComponent::class)->addStaticStepSlider($this->elements);
		}

		return null;
	}

	/**
	 * @return ElementInterface[]
	 */
	public function getElements() : array{
		return $this->elements;
	}
}
