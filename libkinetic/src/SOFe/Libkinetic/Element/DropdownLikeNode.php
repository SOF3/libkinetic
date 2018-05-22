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

use SOFe\Libkinetic\InvalidNodeException;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\WindowRequest;
use function array_map;

abstract class DropdownLikeNode extends EditableElementNode{
	/** @var DropdownOptionNode[] */
	protected $options = [];
	/** @var int */
	protected $default;

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === $this->getStepName()){
			return $this->options[] = new DropdownOptionNode();
		}

		return null;
	}

	public function endElement() : void{
		parent::endElement();

		if(empty($this->options)){
			throw new InvalidNodeException("At least one <{$this->getStepName()}> child node is required", $this);
		}

		foreach($this->options as $i => $option){
			if($option->isDefault()){
				if(isset($this->default)){
					throw new InvalidNodeException("Only one child <{$this->getStepName()}> can be declared DEFAULT=\"true\"", $this->nodeParent);
				}
				$this->default = $i;
			}
		}
		if(!isset($this->default)){
			$this->default = 0;
		}
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		foreach($this->options as $node){
			$node->resolve($manager);
		}
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"options" => $this->options,
				"default" => $this->default,
			];
	}

	public function getDefault(){
		return $this->options[$this->default]->getValue();
	}

	public function getDefaultAsString() : ?string{
		return $this->options[$this->default]->getText();
	}

	public function asFormComponent(WindowRequest $request, callable &$adapter) : array{
		return [
			"type" => $this->getFormType(),
			"text" => $request->translate($this->title),
			$this->getFormStepKey() => array_map(function(DropdownOptionNode $node) use ($request){
				return $request->translate($node->getText());
			}, $this->options),
			"default" => $this->default,
		];
	}

	protected abstract function getStepName() : string;

	protected abstract function getFormType() : string;

	protected abstract function getFormStepKey() : string;
}
