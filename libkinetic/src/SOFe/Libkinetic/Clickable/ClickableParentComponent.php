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

namespace SOFe\Libkinetic\Clickable;

use SOFe\Libkinetic\Clickable\Window\IndexComponent;
use SOFe\Libkinetic\Clickable\Window\InfoComponent;
use SOFe\Libkinetic\Clickable\Window\ListComponent;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\KineticNode;
use function assert;

/**
 * Accepts `<index>`, `<list>`, `<info>`, `<exit>`, `<link>`
 */
class ClickableParentComponent extends KineticComponent{
	/** @var Clickable[] */
	protected $clickables = [];

	public function startChild(string $name) : ?KineticNode{
		if($name === "INDEX"){
			return $this->clickables[] = KineticNode::create(IndexComponent::class)->addIndex($this->clickables);
		}
		if($name === "LIST"){
			return $this->clickables[] = KineticNode::create(ListComponent::class)->addList($this->clickables);
		}
		if($name === "INFO"){
			return $this->clickables[] = KineticNode::create(InfoComponent::class)->addInfo($this->clickables);
		}
		if($name === "EXIT"){
			return $this->clickables[] = KineticNode::create(ExitComponent::class)->addExit($this->clickables);
		}
		if($this->node->nodeParent !== null && $name === "LINK"){ // disallow <link> under root node
			return $this->clickables[] = KineticNode::create(LinkComponent::class)->addLink($this->clickables);
		}
		return null;
	}

	public function endElement() : void{
		assert((function(array $array) : bool{
			foreach($array as $item){
				if(!($item instanceof Clickable)){
					return false;
				}
			}
			return true;
		})($this->clickables));
	}

	/**
	 * @return Clickable[]|ClickableComponent[]
	 */
	public function getClickableList() : array{
		return $this->clickables;
	}
}
