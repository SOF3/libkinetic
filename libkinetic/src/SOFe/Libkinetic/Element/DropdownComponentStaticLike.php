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

use SOFe\Libkinetic\InvalidFormResponseException;
use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\WindowRequest;
use function array_map;

trait DropdownComponentStaticLike{
	/** @var DropdownOptionComponent[] */
	protected $options = [];
	/** @var int */
	protected $default;

	public function startChild(string $name) : ?KineticNode{
		if($name === $this->getStepName()){
			return KineticNode::create(DropdownOptionComponent::class)->addDropdownOption($this->options);
		}
		return null;
	}

	public function endElement() : void{
		if(empty($this->options)){
			$this->throw("At least one <{$this->getStepName()}> child node is required");
		}

		foreach($this->options as $i => $option){
			if($option->isMarkedDefault()){
				if(isset($this->default)){
					$this->throw("Only one child <{$this->getStepName()}> can be declared DEFAULT=\"true\"");
				}
				$this->default = $i;
			}
		}
		if(!isset($this->default)){
			$this->default = 0;
		}
	}

	public function getDefault(){
		return $this->options[$this->default]->getValue();
	}

	public function getDefaultAsString() : ?string{
		return $this->options[$this->default]->getText();
	}

	public function asFormComponent(WindowRequest $request, callable $onComplete) : void{
		$onComplete([
			"type" => $this->getFormType(),
			"text" => $request->translate($this->getNode()->asElement()->getTitle()),
			$this->getFormStepKey() => array_map(function(DropdownOptionComponent $node) use ($request){
				return $request->translate($node->getText());
			}, $this->options),
			"default" => $this->default,
		], [$this, "adapter"]);
	}

	public function adapter(int $id){
		if(!isset($this->options[$id])){
			throw new InvalidFormResponseException("Out-of-range {$this->getFormType()} choice $id");
		}
		return $this->options[$id]->getValue();
	}

	protected abstract function getStepName() : string;

	protected abstract function getFormType() : string;

	protected abstract function getFormStepKey() : string;

	protected abstract function getNode() : KineticNode;
}
