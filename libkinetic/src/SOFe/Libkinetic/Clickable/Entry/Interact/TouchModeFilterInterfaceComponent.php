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

use pocketmine\event\player\PlayerInteractEvent;
use SOFe\Libkinetic\KineticComponent;
use function constant;
use function defined;
use function strtoupper;

class TouchModeFilterInterfaceComponent extends KineticComponent implements InteractFilterInterface{
	protected $mode;

	public function acceptText(string $text) : bool{
		$this->mode = $text;
		return true;
	}

	public function resolve() : void{
		$text = $this->mode;
		$this->resolveConfigString($text);
		if(!defined($constant = PlayerInteractEvent::class . "::" . strtoupper($text))){
			$this->throw("$text is not a valid touch mode");
		}
		$this->mode = constant($constant);
	}

	public function getMode() : int{
		return $this->mode;
	}

	public function test(PlayerInteractEvent $event) : bool{
		return $event->getAction() === $this->mode;
	}
}
