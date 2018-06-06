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
use pocketmine\math\Vector3;
use SOFe\Libkinetic\KineticComponent;
use function strtoupper;

class FaceFilterInterfaceComponent extends KineticComponent implements InteractFilterInterface{
	public const SIDES = [
		"TOP" => Vector3::SIDE_UP,
		"UP" => Vector3::SIDE_UP,
		"DOWN" => Vector3::SIDE_DOWN,
		"BOTTOM" => Vector3::SIDE_DOWN,
		"NORTH" => Vector3::SIDE_NORTH,
		"SOUTH" => Vector3::SIDE_SOUTH,
		"EAST" => Vector3::SIDE_EAST,
		"WEST" => Vector3::SIDE_WEST,
	];

	protected $face;

	public function acceptText(string $text) : bool{
		$this->face = $text;
		return true;
	}

	public function resolve() : void{
		$text = $this->face;
		$this->resolveConfigString($text);
		if(!isset(self::SIDES[strtoupper($text)])){
			$this->throw("$text is not a valid touch mode");
		}
		$this->face = self::SIDES[strtoupper($text)];
	}

	public function getFace(){
		return $this->face;
	}

	public function test(PlayerInteractEvent $event) : bool{
		return $event->getFace() === $this->face;
	}
}
