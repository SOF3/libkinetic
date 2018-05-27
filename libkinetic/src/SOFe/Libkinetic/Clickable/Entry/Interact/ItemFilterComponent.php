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

use SOFe\Libkinetic\KineticComponent;

class ItemFilterComponent extends KineticComponent{
	/** @var bool|null */
	protected $isFromConfig = null;
	/** @var string */
	protected $fromConfig;
	/** @var int */
	protected $itemId;
	/** @var int */
	protected $itemDamage;

	public function setAttribute(string $name, string $value) : bool{
		if($name === "FROM" . "CONFIG"){
			$this->setIsFromConfig(true);
			$this->fromConfig = $value;
			return true;
		}
		if($name === "ITEM" . "ID"){
			$this->setIsFromConfig(false);
			$this->itemId = $value;
			return true;
		}
		if($name === "ITEM" . "DAMAGE"){
			$this->setIsFromConfig(false);
			if($value === "-1" || $value === "*" || strtoupper($value) === "ANY"){
				$this->itemDamage = -1;
			}else{
				$this->itemDamage = $value;
			}
			return true;
		}
		return false;
	}

	public function endElement() : void{
		if(!isset($this->isFromConfig) || (!$this->isFromConfig && !isset($this->itemId))){
			$this->throw("Either fromConfig or itemId/itemDamage should be declared, not both");
		}
	}

	public function init() : void{
		$this->resolveConfigNumber($this->itemId);
		$this->resolveConfigNumber($this->itemDamage);
	}

	public function setIsFromConfig(bool $isFromConfig) : void{
		if($this->isFromConfig !== null && $this->isFromConfig !== $isFromConfig){
			$this->throw("Either fromConfig or itemId/itemDamage should be declared, not both");
		}
		$this->isFromConfig = $isFromConfig;
	}
}
