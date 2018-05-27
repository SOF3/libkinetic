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

namespace SOFe\Libkinetic\Clickable\Entry\Interact;

use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\KineticNode;

class InteractEntryComponent extends KineticComponent{
	protected $fromConfig = false;

	/** @var ItemFilterComponent[] */
	protected $items = [];
	/** @var BlockFilterComponent[] */
	protected $blocks = [];
	/** @var TouchModeFilterComponent[] */
	protected $touchModes = [];
	/** @var FaceFilterComponent[] */
	protected $faces = [];

	public function setAttribute(string $name, string $value) : bool{

	}

	public function startChild(string $name) : ?KineticNode{
		if($this->fromConfig){
			$this->throw("<interact> cannot have any children if fromConfig is set");
		}

		if($name === "ITEM"){
			return KineticNode::create(ItemFilterComponent::class)->addItemFilter($this->items);
		}
		if($name === "BLOCK"){
			return KineticNode::create(BlockFilterComponent::class)->addBlockFilter($this->blocks);
		}
		if($name === "TOUCH_MODE"){
			return KineticNode::create(TouchModeFilterComponent::class)->addTouchModeFilter($this->touchModes);
		}
		if($name === "FACE"){
			return KineticNode::create(FaceFilterComponent::class)->addFaceFilter($this->faces);
		}

		return null;
	}
}
