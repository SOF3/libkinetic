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

namespace SOFe\Libkinetic\API;

use InvalidArgumentException;
use SOFe\Libkinetic\UserString;
use UnexpectedValueException;

class ListFactory{
	/** @var string */
	protected $default;
	/** @var string[]|UserString[]|mixed[] */
	protected $elements = [];

	public function addElement(string $commandName, UserString $displayName, $value, bool $default = false) : void{
		$this->elements[] = [$commandName, $displayName, $value];
		if($default){
			if(isset($this->default)){
				throw new InvalidArgumentException("Duplicate default value");
			}
			$this->default = $commandName;
		}
	}

	public function setDefault(string $default) : void{
		if(isset($this->default)){
			throw new InvalidArgumentException("Default value already set");
		}
		$this->default = $default;
	}

	public function getElements() : array{
		return $this->elements;
	}

	public function toOptions() : array{
		$defaultSet = false;
		$elements = [];
		foreach($this->elements as $i => [$mnemonic, $display, $value]){
			$isDefault = (!isset($this->default) && $i === 0) || $mnemonic === $this->default;
			if($isDefault){
				$defaultSet = true;
			}
			$elements[] = [$mnemonic, $display, $value, $isDefault];
		}
		if(!$defaultSet){
			throw new UnexpectedValueException("Invalid default key $this->default: not such key in elements");
		}
		return $elements;
	}
}
