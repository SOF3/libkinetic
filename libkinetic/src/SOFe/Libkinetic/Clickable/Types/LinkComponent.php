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

namespace SOFe\Libkinetic\Clickable\Types;

use Iterator;
use SOFe\Libkinetic\AbsoluteIdComponent;
use SOFe\Libkinetic\Clickable\ClickableComponent;
use SOFe\Libkinetic\Clickable\ClickableInterface;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\WindowRequest;

class LinkComponent extends KineticComponent implements ClickableInterface{
	/** @var string */
	protected $targetId;
	/** @var KineticNode */
	protected $target;

	public function dependsComponents() : Iterator{
		yield ClickableComponent::class;
	}

	public function setAttribute(string $name, string $value) : bool{
		if($name === "TARGET"){
			if($value === '$parent'){
				for($parent = $this->node->nodeParent; !empty($parent->getIntermediateLinkInterfaces()); $parent = $parent->nodeParent){
					// find grandparent if node has a IntermediateNodeInterface component
				}
				if($parent !== null && !$parent->hasComponent(AbsoluteIdComponent::class)){
					$this->throw('target="$parent" is only allowed for children of nodes with an ID');
				}
				$value = $parent->asAbsoluteIdComponent()->getId();
			}
			$this->targetId = $value;
			return true;
		}
		return false;
	}

	public function endElement() : void{
		$this->requireAttribute("target", $this->targetId);
	}

	public function resolve() : void{
		$this->target = $this->manager->getNodeById($this->targetId);
		if($this->target === null){
			$this->throw("Undefined target {$this->targetId}");
		}
	}

	public function onClick(WindowRequest $request, array $args) : void{
		$this->target->asClickableInterface()->onClick($request, $args);
	}
}
