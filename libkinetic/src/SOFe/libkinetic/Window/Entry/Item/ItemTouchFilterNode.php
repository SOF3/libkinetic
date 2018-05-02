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

namespace SOFe\libkinetic\Window\Entry\Item;

use pocketmine\event\player\PlayerInteractEvent;
use SOFe\libkinetic\Node\KineticNode;
use function count;

trait ItemTouchFilterNode{
	use ItemFilterNode {
		matches as private ifn_matches;
		ifn_startChild as private parent_startChild;
		ifn_endElement as private parent_endElement;
	}

	/** @var array */
	protected $touchMode = [];
	/** @var TouchModeNode[] */
	protected $touchModeNodes = [];

	public function ifn_startChild(string $name) : ?KineticNode{
		if($delegate = $this->parent_startChild($name)){
			return $delegate;
		}

		if($name === "TOUCH" . "MODE"){
			return $this->touchModeNodes[] = new TouchModeNode();
		}

		return null;
	}

	public function ifn_endElement() : void{
		$this->parent_endElement();

		$this->touchMode = 0;
		foreach($this->touchModeNodes as $node){
			$this->touchMode[$node->getType()] = true;
		}
	}

	public function matches(PlayerInteractEvent $event) : bool{
		if(count($this->touchMode) !== 0 && !isset($this->touchMode[$event->getAction()])){
			return false;
		}
		return $this->ifn_matches($event);
	}
}
