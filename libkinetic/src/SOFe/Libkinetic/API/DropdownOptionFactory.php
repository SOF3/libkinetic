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
use InvalidStateException;
use function count;

class DropdownOptionFactory{
	/** @var array[] */
	protected $values = [];
	/** @var int|null */
	protected $default = null;

	public function addItem($value, string $messageId, bool $default = false) : void{
		$this->values[] = [$value, $messageId];
		if($default){
			if($this->default !== null){
				throw new InvalidStateException("Default has been set twice");
			}
			$this->default = count($this->values) - 1;
		}
	}

	public function setDefault(int $i) : void{
		if($this->default !== null){
			throw new InvalidStateException("Default has been set twice");
		}
		if(!isset($this->values[$i])){
			throw new InvalidArgumentException("Undefined option ID: $i");
		}
		$this->default = $i;
	}

	public function getValue(int $choice, &$value, &$messageId) : bool{
		if(!isset($this->values[$choice])){
			return false;
		}
		[$value, $messageId] = $this->values[$choice];
		return true;
	}

	public function getDefault(&$value, &$messageId) : bool{
		return $this->getValue($this->default ?? 0, $value, $messageId);
	}

	public function getDefaultId() : int{
		return $this->default ?? 0;
	}

	public function getValues() : array{
		return $this->values;
	}
}
