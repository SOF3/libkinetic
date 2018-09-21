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

namespace SOFe\Libkinetic\Variable;

use InvalidArgumentException;
use function gettype;

class ScalarVariable extends Variable{
	/** @var string */
	protected $type;
	/** @var bool|int|float|string */
	protected $value;

	public function __construct(string $type){
		$this->type = $type;
	}

	public function getType() : string{
		return $this->type;
	}

	public function getValue(){
		return $this->value;
	}

	public function setValueImpl($value) : void{
		if(gettype($value) !== $this->type){
			throw new InvalidArgumentException("Attempt to assign a " . gettype($value) . " value to a $this->type variable");
		}
		$this->value = $value;
	}
}
