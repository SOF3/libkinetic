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

class TouchModeNode extends KineticNode{
	protected $type;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "TYPE"){
			switch(strtoupper($value)){
				case "LEFT_CLICK_BLOCK":
					$this->type = PlayerInteractEvent::LEFT_CLICK_BLOCK;
					break;
				case "RIGHT_CLICK_BLOCK":
					$this->type = PlayerInteractEvent::RIGHT_CLICK_BLOCK;
					break;
				case "LEFT_CLICK_AIR":
					$this->type = PlayerInteractEvent::LEFT_CLICK_AIR;
					break;
				case "RIGHT_CLICK_AIR":
					$this->type = PlayerInteractEvent::RIGHT_CLICK_AIR;
					break;
				case "PHYSICAL":
					$this->type = PlayerInteractEvent::PHYSICAL;
					break;
			}
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->requireAttributes("type");
	}

	public function getType() : int{
		return $this->type;
	}
}
