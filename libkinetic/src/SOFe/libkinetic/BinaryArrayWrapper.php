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

namespace SOFe\libkinetic;

use ArrayAccess;
use ArrayOutOfBoundsException;
use Iterator;
use RuntimeException;
use function count;
use function current;
use function is_array;
use function next;
use function reset;

/**
 * Wrapper for a `{0: any, 1: any}[]` as ArrayAccess and Iterator. ArrayAccess methods have O(n) performance.
 */
class BinaryArrayWrapper implements ArrayAccess, Iterator{
	/** @var bool */
	protected $isValid;
	protected $binaryArray = [];

	public function __construct(array $binaryArray){
		$this->binaryArray = $binaryArray;

		foreach($binaryArray as $value){
			if(!is_array($value) || count($value) !== 2 || !isset($value[0], $value[1])){
				throw new RuntimeException("BinaryIterator::__construct only accepts {0: ?, 1: ?}[]");
			}
		}
	}

	public function valid() : bool{
		return $this->isValid;
	}

	public function rewind() : void{
		reset($this->binaryArray);
		$this->isValid = reset($this->binaryArray) !== false;
	}

	public function key(){
		return current($this->binaryArray)[0];
	}

	public function current(){
		return current($this->binaryArray)[1];
	}

	public function next() : void{
		$this->isValid = next($this->binaryArray) !== false;
	}

	public function offsetExists($offset) : bool{
		foreach($this->binaryArray as [$k, $v]){
			if($k === $offset){
				return true;
			}
		}

		return false;
	}

	public function offsetGet($offset){
		foreach($this->binaryArray as [$k, $v]){
			if($k === $offset){
				return $v;
			}
		}

		throw new ArrayOutOfBoundsException("Undefined index $offset");
	}

	public function offsetSet($offset, $value) : void{
		if($offset !== null){
			foreach($this->binaryArray as $i => [$k]){
				if($k === $offset){
					$this->binaryArray[$i][1] = $value;
					return;
				}
			}
		}

		$this->binaryArray[] = [$offset, $value];
	}

	public function offsetUnset($offset) : void{
		foreach($this->binaryArray as $i => [$k => $v]){
			if($k === $offset){
				unset($this->binaryArray[$k]);
				return;
			}
		}

		throw new ArrayOutOfBoundsException("Undefined index $offset");
	}
}
