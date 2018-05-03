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

use pocketmine\math\Vector3;
use pocketmine\plugin\PluginException;
use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\KineticManager;
use function array_keys;
use function implode;
use function is_string;
use function stripos;
use function strtoupper;
use function substr;

class FaceFilterNode extends InteractFilterNode{
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

	/** @var int|string */
	protected $face;

	public function acceptText(string $text) : void{
		if(isset(self::SIDES[strtoupper($text)])){
			$this->face = self::SIDES[strtoupper($text)];
		}elseif(stripos($text, "config:") === 0){
			$this->face = substr($text, 7);
		}else{
			throw new InvalidNodeException("$text is not a supported ", $this);
		}
	}

	public function endElement() : void{
		parent::endElement();
		if(!isset($this->face)){
			throw new InvalidNodeException("The touch mode must be specified as text content", $this);
		}
	}

	public function resolve(KineticManager $manager, bool $mimic = false) : void{
		parent::resolve($manager);
		if($mimic){
			return;
		}
		if(is_string($this->face)){
			$config = $manager->getAdapter()->getKineticConfig($configName = $this->face);
			$this->parseConfig($manager, $config, $configName);
		}
	}

	public function mimicConfig(KineticManager $manager, $config, string $configName) : void{
		$this->setAttribute("fromConfig", "(internal)");
		$this->endAttributes();
		$this->endElement();
		$this->resolve($manager, true);
		$this->parseConfig($manager, $config, $configName);
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"face" => $this->face,
			];
	}

	public function getFace() : int{
		return $this->face;
	}

	/**
	 * @param KineticManager $manager
	 * @param                $config
	 * @param                $configName
	 */
	private function parseConfig(KineticManager $manager, $config, $configName) : void{
		$this->face = self::SIDES[$config] ?? -1;
		if($this->face === -1){
			$manager->getPlugin()->getLogger()->critical("Config problem ($$configName): $config is not a valid block side! Accepted values: " . implode(", ", array_keys(self::SIDES)));
			throw new PluginException("$this->face is not a valid block side");
		}
	}
}
