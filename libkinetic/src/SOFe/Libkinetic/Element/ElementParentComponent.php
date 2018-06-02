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
			return $this->addRequiredComponent(KineticNode::create(LabelComponent::class))->addLabelComponent($this->elements);
		}
		if($name === "INPUT"){
			return $this->addRequiredComponent(KineticNode::create(InputComponent::class))->addInputComponent($this->elements);
		}
		if($name === "TOGGLE"){
			return $this->addRequiredComponent(KineticNode::create(ToggleComponent::class))->addToggleComponent($this->elements);
		}
		if($name === "SLIDER"){
			return $this->addRequiredComponent(KineticNode::create(SliderComponent::class))->addSliderComponent($this->elements);
		}
		if($name === "DROPDOWN"){
			return $this->addRequiredComponent(KineticNode::create(StaticDropdownComponent::class))->addStaticDropdownComponent($this->elements);
		}
		if($name === "STEP" . "SLIDER"){
			return $this->addRequiredComponent(KineticNode::create(StaticStepSliderComponent::class))->addStaticStepSliderComponent($this->elements);
		}
		if($name === "DYN" . "DROPDOWN"){
			return $this->addRequiredComponent(KineticNode::create(DynamicDropdownComponent::class))->addDynamicDropdownComponent($this->elements);
		}
		if($name === "DYN" . "STEP" . "SLIDER"){
			return $this->addRequiredComponent(KineticNode::create(DynamicStepSliderComponent::class))->addDynamicStepSliderComponent($this->elements);
		}

		return null;
	}

	protected function addRequiredComponent(KineticNode $node) : KineticNode{
		$node->addComponent(RequiredComponent::class);
		return $node;
	}

	/**
	 * @return ElementInterface[]
	 */
	public function getElements() : array{
		return $this->elements;
	}
}
