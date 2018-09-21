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

use SOFe\Libkinetic\Flow\IObjectVariable;

class ObjectVariable extends Variable implements IObjectVariable{
	/** @var VarDeclarationComponent[] */
	protected $fields = [];

	/** @var Variable[] */
	protected $values = [];

	public function __construct(VarDeclarationComponent $component){
		$this->fields = $component->getFields();
		$this->values = $this->recreateValues();
	}

	public function getValue() : array{
		$output = [];
		foreach($this->values as $name => $field){
			$output[$name] = $this->values[$field->getValue()];
		}
		return $output;
	}

	protected function setValueImpl($value) : void{
		$this->values = $this->recreateValues();
		foreach($value as $k => $v){
			$this->values[$k]->setValue($v);
		}
	}

	public function getShallow(string $key) : ?Variable{
		return $this->values[$key] ?? null;
	}

	protected function recreateValues() : array{
		$output = [];
		foreach($this->fields as $name => $field){
			$output[$name] = Variable::fromComponent($field);
		}
		return $output;
	}
}
