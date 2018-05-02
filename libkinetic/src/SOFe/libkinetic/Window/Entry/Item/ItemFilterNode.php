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
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Node\KineticNodeTrait;
use function array_change_key_case;
use function is_array;
use function strtoupper;
use const CASE_LOWER;

trait ItemFilterNode{
	use KineticNodeTrait;

	/** @var bool */
	protected $ifn_aggregate = true;
	/** @var bool */
	protected $ifn_fromConfig;// PHP why no trait constants

	/** @var int */
	protected $ifn_id;
	/** @var int */
	protected $ifn_damage = -1;

	/** @var string */
	protected $ifn_configKey;

	/** @var SimpleItemFilterNode[] */
	protected $ifn_union = [];

	public function ifn_setAttribute(string $name, string $value) : bool{
		if($name === "ITEM" . "ID"){
			$this->ifn_aggregate = false;
			if(!empty($this->ifn_fromConfig)){ // returns true for false
				throw $this->t_throw("Either declare \"fromConfig\" or \"itemId\"+\"itemDamage\", not both");
			}
			$this->ifn_fromConfig = false;
			$this->ifn_id = $this->t_typeFix()->parseInt($value);
			return true;
		}

		if($name === "ITEM" . "DAMAGE"){
			$this->ifn_aggregate = false;
			if(!empty($this->ifn_fromConfig)){ // returns true for false
				throw $this->t_throw("Either declare \"fromConfig\" or \"itemId\"+\"itemDamage\", not both");
			}
			$this->ifn_fromConfig = false;
			if($value === "*" || $value === "-1" || strtoupper($value) === "ANY"){
				$this->ifn_damage = -1;
			}else{
				$this->ifn_damage = $this->t_typeFix()->parseInt($value);
				if($this->ifn_damage < 0){
					$this->t_throw("\"itemDamage\" must either be \"*\" or a non-negative damage value");
				}
			}
			return true;
		}

		if($name === "FROM" . "CONFIG"){
			$this->ifn_aggregate = false;
			if(isset($this->ifn_fromConfig) && !$this->ifn_fromConfig){
				throw $this->t_throw("Either declare \"fromConfig\" or \"itemId\"+\"itemDamage\", not both");
			}
			$this->ifn_fromConfig = true;
			$this->ifn_configKey = $value;
			return true;
		}

		return false;
	}

	public function ifn_endAttributes() : void{
		if(!$this->ifn_aggregate && !$this->ifn_configKey && !isset($this->ifn_id)){
			$this->t_throw("\"itemDamage\" is set, but \"itemId\" is not set");
		}
	}

	public function ifn_startChild(string $name) : ?KineticNode{
		if($name === "ITEM"){
			if(!$this->ifn_aggregate){
				$this->t_throw("Child <{$name}> nodes are only allowed if the parent does not have itemId declared");
			}

			return $this->ifn_union[] = new SimpleItemFilterNode();
		}

		return null;
	}

	public function ifn_endElement() : void{
		if($this->ifn_aggregate && empty($this->ifn_union)){
			$this->t_throw("ItemFilterNode must either declare itemId or declare child <ITEM> nodes");
		}
	}

	public function ifn_resolve(KineticManager $manager) : void{
		if($this->ifn_fromConfig){
			$config = $manager->getPlugin()->getConfig()->getNested($this->ifn_configKey);
			if(is_array($config)){
				$config = array_change_key_case($config, CASE_LOWER);
				if(isset($config["id"])){
					$this->ifn_id = $this->t_typeFix()->parseInt($config["id"]);
				}
			}
		}
	}

	public function matches(PlayerInteractEvent $event) : bool{
		if($this->ifn_aggregate){
			foreach($this->ifn_union as $node){
				if($node->matches($event)){
					return true;
				}
			}
			return false;
		}

		if($event->getItem()->getId() !== $this->ifn_id){
			return false;
		}

		if($this->ifn_damage !== -1 && $this->ifn_damage !== $event->getItem()->getDamage()){
			return false;
		}

		return true;
	}
}
