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

namespace SOFe\Libkinetic\UI\Advanced;

use Generator;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Element\ElementParentComponent;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\VarRefAttribute;
use SOFe\Libkinetic\Variable\Variable;

class RecurFormSectionComponent extends KineticComponent{
	/** @var bool */
	protected $isBody;
	/** @var string|null */
	protected $var = null;

	public function __construct(bool $isBody){
		$this->isBody = $isBody;
	}

	public function getDependencies() : Generator{
		yield new ElementParentComponent(true);
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("var", new VarRefAttribute(Variable::TYPE_OBJECT, $this->isBody ? 1 : 0), $this->var, false);
	}

	public function getVar() : ?string{
		return $this->var;
	}
}
