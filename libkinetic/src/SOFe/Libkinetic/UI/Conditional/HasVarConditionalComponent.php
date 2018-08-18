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

namespace SOFe\Libkinetic\UI\Conditional;

use Generator;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\StringAttribute;
use SOFe\Libkinetic\Util\GeneratorUtil;

class HasVarConditionalComponent extends KineticComponent implements ConditionalNodeInterface{
	use ConditionalTrait;

	/** @var string */
	protected $name;

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("name", new StringAttribute(), $this->name, true);
	}

	protected function testCondition(FlowContext $context) : Generator{
		false && yield;
		return $context->getVariables()->getNestedVariable($this->name)->isSet();
	}
}
