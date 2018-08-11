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

use function array_map;
use function assert;
use function is_array;

class ListVariable extends Variable{
	/** @var VarDeclarationComponent */
	protected $component;
	/** @var int */
	protected $minusListLevels;

	/** @var Variable[] */
	protected $values = [];

	public function __construct(VarDeclarationComponent $component, int $minusListLevels){
		$this->component = $component;
		$this->minusListLevels = $minusListLevels;
	}

	public function getValue() : array{
		return array_map(function(Variable $variable){
			return $variable->getValue();
		}, $this->values);
	}

	protected function setValueImpl($value) : void{
		assert(is_array($value));
		foreach($value as $item){
			if($item !== null){
				$this->values[] = $this->createElementVariable($item);
			}
		}
	}

	protected function createElementVariable($value) : Variable{
		$var = Variable::fromComponent($this->component, $this->minusListLevels);
		$var->setValue($value);
		return $var;
	}
}
