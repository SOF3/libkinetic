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
use SOFe\libkinetic\Intent;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Window\Entry\AbstractEntryPointNode;

class ItemEntryPointNode extends AbstractEntryPointNode implements ItemFilter{
	use ItemTouchFilterNode;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value) || $this->ifn_setAttribute($name, $value)){
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->ifn_endAttributes();
	}

	public function startChild(string $name) : ?KineticNode{
		if(($delegate = parent::startChild($name)) || ($delegate = $this->ifn_startChild($name))){
			return $delegate;
		}

		return null;
	}

	public function endElement() : void{
		parent::endElement();
		$this->ifn_endElement();
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$this->ifn_resolve($manager);
		$manager->registerItemHandler($this);
	}

	public function onUseItem(KineticManager $manager, PlayerInteractEvent $event) : void{
		if(!$this->getParent()->testPermission($event->getPlayer())){
			return;
		}

		$data = [
			"item" => $event->getItem(),
			"touchVector" => $event->getTouchVector(),
		];

		$intent = new Intent($event->getPlayer(), $this->getParent()->getId(), $data);

	}
}
