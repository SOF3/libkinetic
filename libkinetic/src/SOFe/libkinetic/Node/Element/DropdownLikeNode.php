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

namespace SOFe\libkinetic\Node\Element;

use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;

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

	protected abstract function getStepName() : string;

	public function getDefault(){
		return $this->options[$this->default]->getValue();
	}

	public function getDefaultAsString() : ?string{
		return $this->options[$this->default]->getText();
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"options" => $this->options,
				"default" => $this->default,
			];
	}
}
