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

namespace SOFe\libkinetic\Window\Entry\Interact;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerInteractEvent;
use SOFe\libkinetic\KineticManager;

class InteractListener implements Listener{
	/** @var KineticManager */
	protected $manager;
	/** @var InteractEntryPointNode[] */
	public $filters = [];

	public function __construct(KineticManager $manager){
		$this->manager = $manager;
	}

	public function e_interact(PlayerInteractEvent $event) : void{
		foreach($this->filters as $filter){
			if($filter->isValid($event)){
				$filter->onUseItem($event);
			}
		}
	}
}