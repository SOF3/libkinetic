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

namespace SOFe\Libkinetic\Util;

use InvalidArgumentCountException;
use function array_merge;

class CallSequence{
	public const YIELD_VOID = 0;
	public const YIELD_FIRST = 1;
	public const YIELD_ALL = 2;

	/** @var callable */
	protected $onComplete;
	/** @var callable[] */
	protected $callables = [];
	/** @var array */
	protected $argsBefore;
	/** @var array */
	protected $argsAfter;
	/** @var int */
	protected $nextCallable = 0;
	/** @var array[] */
	protected $results = [];
	/** @var int */
	private $yieldMode;

	public function __construct(array $callables, callable $onComplete, array $argsBefore = [], array $argsAfter = [], int $yieldMode = CallSequence::YIELD_VOID){
		$this->onComplete = $onComplete;
		$this->callables = $callables;
		$this->argsBefore = $argsBefore;
		$this->argsAfter = $argsAfter;
		$this->yieldMode = $yieldMode;

		$this();
	}

	public static function forMethod(array $objects, string $method, callable $onComplete, array $argsBefore = [], array $argsAfter = [], int $yieldMode = self::YIELD_VOID) : void{
		$callables = [];
		foreach($objects as $object){
			$callables[] = [$object, $method];
		}
		new CallSequence($callables, $onComplete, $argsBefore, $argsAfter, $yieldMode);
	}

	public function __invoke(...$args) : void{
		if($this->nextCallable > 0){
			if($this->yieldMode === self::YIELD_FIRST){
				if(!isset($args[0])){
					throw new InvalidArgumentCountException("CallSequence (next) requires 1 parameter, 0 given");
				}
				$this->results[] = $args[0];
			}elseif($this->yieldMode === self::YIELD_ALL){
				$this->results[] = $args;
			}
		}

		if(isset($this->callables[$this->nextCallable])){
			$args = array_merge($this->argsBefore, [$this], $this->argsAfter);
			$c = $this->callables[$this->nextCallable++];
			$c($args);
			return;
		}

		($this->onComplete)($this->results);
	}
}
