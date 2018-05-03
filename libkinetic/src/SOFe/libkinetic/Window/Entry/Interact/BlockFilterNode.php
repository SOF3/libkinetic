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

use pocketmine\block\Block;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\plugin\PluginException;
use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\KineticManager;
use function explode;
use function in_array;
use function is_numeric;
use function strtoupper;

class BlockFilterNode extends InteractFilterNode{
	/** @var bool|null */
	protected $isFromConfig = null;
	/** @var string */
	protected $fromConfig;
	/** @var int */
	protected $blockId;
	/** @var int */
	protected $blockDamage;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "FROM" . "CONFIG"){
			$this->setIsFromConfig(true);
			$this->fromConfig = $value;
			return true;
		}

		if($name === "BLOCK" . "ID"){
			$this->setIsFromConfig(false);
			$this->blockId = $this->parseInt($value);
			return true;
		}

		if($name === "BLOCK" . "DAMAGE"){
			$this->setIsFromConfig(false);
			if($value === "-1" || $value === "*" || strtoupper($value) === "ANY"){
				$this->blockDamage = -1;
			}else{
				$this->blockDamage = $this->parseInt($value);
			}
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		if(!isset($this->isFromConfig) || (!$this->isFromConfig && !isset($this->blockId))){
			throw new InvalidNodeException("Either fromConfig or blockId/blockDamage should be declared, not both", $this);
		}
	}

	public function resolve(KineticManager $manager, bool $mimic = false) : void{
		parent::resolve($manager);
		if($mimic){
			return;
		}
		$config = $manager->getAdapter()->getKineticConfig($this->fromConfig);
		if($config === null){
			$manager->getPlugin()->getLogger()->critical("$this->fromConfig is not set! It should be an block ID or <block ID>:<block damage>");
			throw new PluginException("$this->fromConfig not set");
		}
		$this->parseConfig($manager, $config);
	}

	public function mimicConfig(KineticManager $manager, $config) : void{
		$this->setAttribute("fromConfig", "(internal)");
		$this->endAttributes();
		$this->endElement();
		$this->resolve($manager, true);
		$this->parseConfig($manager, $config);
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + ($this->isFromConfig ? [
				"fromConfig" => $this->fromConfig,
			] : [
				"blockId" => $this->blockId,
				"blockDamage" => $this->blockDamage,
			]);
	}

	public function isValid(Block $block) : bool{
		return $block->getId() === $this->blockId && ($this->blockId === -1 || $this->blockId === $block->getDamage());
	}

	public function setIsFromConfig(bool $isFromConfig) : void{
		if($this->isFromConfig !== null && $this->isFromConfig !== $isFromConfig){
			throw new InvalidNodeException("Either fromConfig or blockId/blockDamage should be declared, not both", $this);
		}
		$this->isFromConfig = $isFromConfig;
	}

	/**
	 * @param KineticManager $manager
	 * @param                $config
	 */
	private function parseConfig(KineticManager $manager, $config) : void{
		$config = explode(":", (string) $config, 2);
		if(is_numeric($config[0])){
			$this->blockId = (int) $config[0];
		}else{
			$item = ItemFactory::fromString($config[0]);
			if($item->getId() === Item::AIR || $item->getBlock()->getId() !== 0){
				$this->blockId = $item->getBlock()->getId();
			}else{
				$manager->getPlugin()->getLogger()->critical("$this->fromConfig contains an item ID, not a block ID!");
				throw new PluginException("$this->fromConfig is not a block");
			}
		}
		$this->blockDamage = in_array(strtoupper($config[1]) ?? "-1", ["-1", "*", "ANY"], true) ? -1 : (int) $config[1];
	}
}
