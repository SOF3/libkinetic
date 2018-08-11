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

use LogicException;

abstract class Variable{
	public const TYPE_BOOL = "bool";
	public const TYPE_INT = "int";
	public const TYPE_FLOAT = "float";
	public const TYPE_STRING = "string";
	public const TYPE_OBJECT = "object";

	public const LIST_TYPE_PREFIX = "list:";

	public const TYPES = [
		self::TYPE_BOOL,
		self::TYPE_INT,
		self::TYPE_FLOAT,
		self::TYPE_STRING,
		self::TYPE_OBJECT,
	];

	protected $set = false;

	public static function fromComponent(VarDeclarationComponent $var, int $minusListLevels = 0) : Variable{
		$listLevels = $var->getListLevels() - $minusListLevels;

		if($listLevels > 0){
			return new ListVariable($var, $minusListLevels + 1);
		}

		switch($var->getType()){
			case Variable::TYPE_BOOL:
			case Variable::TYPE_INT:
			case Variable::TYPE_FLOAT:
			case Variable::TYPE_STRING:
				return new ScalarVariable($var->getType());
			case Variable::TYPE_OBJECT:
				return new ObjectVariable($var);
		}
		throw new LogicException("Unexpected type " . $var->getType());
	}

	public function setValue($value) : void{
		$this->set = $value !== null;
		$this->setValueImpl($value);
	}

	public function isSet() : bool{
		return $this->set;
	}

	public abstract function getValue();

	protected abstract function setValueImpl($value);
}
