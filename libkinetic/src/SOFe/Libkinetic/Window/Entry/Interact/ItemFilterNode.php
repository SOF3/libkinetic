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

namespace SOFe\Libkinetic\Window\Entry\Interact;

use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\plugin\PluginException;
use SOFe\Libkinetic\InvalidNodeException;
use SOFe\Libkinetic\KineticManager;
use function explode;
use function in_array;
use function is_numeric;
use function strtoupper;

class ItemFilterNode extends InteractFilterNode{
	/** @var bool|null */
	protected $isFromConfig = null;
	/** @var string */
	protected $fromConfig;
	/** @var int */
	protected $itemId;
	/** @var int */
	protected $itemDamage;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "FROM" . "CONFIG"){
			$this->setIsFromConfig(true);
			$this->fromConfig = $value;
			return true;
		}

		if($name === "ITEM" . "ID"){
			$this->setIsFromConfig(false);
			$this->itemId = $this->parseInt($value);
			return true;
		}

		if($name === "ITEM" . "DAMAGE"){
			$this->setIsFromConfig(false);
			if($value === "-1" || $value === "*" || strtoupper($value) === "ANY"){
				$this->itemDamage = -1;
			}else{
				$this->itemDamage = $this->parseInt($value);
			}
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		if(!isset($this->isFromConfig) || (!$this->isFromConfig && !isset($this->itemId))){
			throw new InvalidNodeException("Either fromConfig or itemId/itemDamage should be declared, not both", $this);
		}
	}

	public function resolve(KineticManager $manager, bool $mimic = false) : void{
		parent::resolve($manager);
		if($mimic){
			return;
		}
		$config = $manager->getAdapter()->getKineticConfig($this->fromConfig);
		if($config === null){
			$manager->getPlugin()->getLogger()->critical("$this->fromConfig is not set! It should be an item ID or <item ID>:<item damage>");
			throw new PluginException("$this->fromConfig not set");
		}
		$this->parseConfig($config);
	}

	public function mimicConfig(KineticManager $manager, $config) : void{
		$this->setAttribute("fromConfig", "(internal)");
		$this->endAttributes();
		$this->endElement();
		$this->resolve($manager, true);
		$this->parseConfig($config);
	}

	private function parseConfig($config) : void{
		$config = explode(":", (string) $config, 2);
		if(is_numeric($config[0])){
			$this->itemId = (int) $config[0];
		}else{
			$this->itemId = ItemFactory::fromString($config[0])->getId();
		}
		$this->itemDamage = in_array(strtoupper($config[1]) ?? "-1", ["-1", "*", "ANY"], true) ? -1 : (int) $config[1];
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + ($this->isFromConfig ? [
				"fromConfig" => $this->fromConfig,
			] : [
				"itemId" => $this->itemId,
				"itemDamage" => $this->itemDamage,
			]);
	}

	public function isValid(Item $item) : bool{
		return $item->getId() === $this->itemId && ($this->itemId === -1 || $this->itemId === $item->getDamage());
	}

	public function setIsFromConfig(bool $isFromConfig) : void{
		if($this->isFromConfig !== null && $this->isFromConfig !== $isFromConfig){
			throw new InvalidNodeException("Either fromConfig or itemId/itemDamage should be declared, not both", $this);
		}
		$this->isFromConfig = $isFromConfig;
	}
}
