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

use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Router\AttributeRouter;
use SOFe\Libkinetic\Parser\Router\ChildNodeRouter;
use SOFe\Libkinetic\Parser\Router\StringAttribute;
use SOFe\Libkinetic\Parser\Router\StringEnumAttribute;
use function array_merge;
use function count;
use function in_array;
use function strpos;
use function substr;

class VarDeclarationComponent extends KineticComponent{
	/** @var string */
	protected $name;
	/** @var string */
	protected $type;
	/** @var int */
	protected $listLevels = 0;

	/** @var VarDeclarationComponent[] */
	protected $fields = [];

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("name", new StringAttribute(), $this->name, true);
		$router->use("type", new StringEnumAttribute(array_merge(Variable::TYPES), true),
			$this->type, true);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("field", VarDeclarationComponent::class, $this->fields, 0);
	}

	public function endElement() : void{
		while(strpos($this->type, Variable::LIST_TYPE_PREFIX) === 0){
			$this->type = substr($this->type, 5);
			$this->listLevels++;
		}

		if(!in_array($this->type, Variable::TYPES, true)){
			throw $this->node->throw("Unknown type $this->type");
		}

		if($this->type === Variable::TYPE_OBJECT){
			if(count($this->fields) === 0){
				throw $this->node->throw("Objects should have at least one field");
			}
		}elseif(count($this->fields) > 0){
			throw $this->node->throw("Fields are not allowed in non-object variables");
		}
	}

	public function getName() : string{
		return $this->name;
	}

	public function getType() : string{
		return $this->type;
	}

	public function getListLevels() : int{
		return $this->listLevels;
	}

	/**
	 * @return VarDeclarationComponent[]
	 */
	public function getFields() : array{
		return $this->fields;
	}
}
