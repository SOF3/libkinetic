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

namespace SOFe\Libkinetic\Flow;

use InvalidArgumentException;
use SOFe\Libkinetic\Variable\VarDeclarationComponent;
use SOFe\Libkinetic\Variable\Variable;
use function explode;
use function get_class;

class VariableScope implements IObjectVariable{
	/** @var VariableScope|null */
	protected $parent;

	/** @var Variable[] */
	protected $variables = [];

	public function __construct(array $vars, ?VariableScope $parent){
		$this->parent = $parent;

		/** @var VarDeclarationComponent $var */
		foreach($vars as $var){
			$this->variables[$var->getName()] = Variable::fromComponent($var);
		}
	}

	public function setNested(string $key, $value) : void{
		$this->getNestedVariable($key)->setValue($value);
	}

	public function getNested(string $key){
		return $this->getNestedVariable($key)->getValue();
	}

	public function getNestedVariable(string $key) : Variable{
		$parts = explode(".", $key);

		for($scope = $this; $scope !== null; $scope = $scope->parent){
			if(($value = $scope->resolveThis($parts)) !== null){
				return $value;
			}
		}

		throw new InvalidArgumentException("Key $key not found");
	}

	public function get(string $key) : ?Variable{
		return $this->variables[$key] ?? null;
	}

	protected function resolveThis(array $parts) : ?Variable{
		/** @var IObjectVariable $object */
		$object = $this;

		foreach($parts as $part){
			if(!($object instanceof IObjectVariable)){
				throw new InvalidArgumentException("$part resolves to be a " . get_class($object) . ", not an object");
			}
			$object = $object->get($part);
		}

		return $object;
	}
}
