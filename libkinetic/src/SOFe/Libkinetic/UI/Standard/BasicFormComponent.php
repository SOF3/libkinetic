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

namespace SOFe\Libkinetic\UI\Standard;

use Generator;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Element\ElementParentComponent;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\VarRefAttribute;
use SOFe\Libkinetic\UI\GenericFormComponent;
use SOFe\Libkinetic\UI\GenericFormTrait;
use SOFe\Libkinetic\UI\ReturningUiNodeOutcome;
use SOFe\Libkinetic\UI\UiComponent;
use SOFe\Libkinetic\UI\UiNode;
use SOFe\Libkinetic\UI\UiNodeTrait;
use SOFe\Libkinetic\Variable\Variable;

class BasicFormComponent extends KineticComponent implements UiNode{
	use UiNodeTrait;
	use GenericFormTrait;

	/** @var string */
	protected $var;

	public function getDependencies() : Generator{
		yield UiComponent::class;
		yield new ElementParentComponent(true);
		yield GenericFormComponent::customForm();
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("var", new VarRefAttribute(Variable::TYPE_OBJECT), $this->var, false);
	}

	protected function executeFormNode(FlowContext $context) : Generator{
		$data = yield $this->asGenericFormComponent()->sendCustomForm($context, $this->asElementParentComponent()->getElements());
		if($this->var !== null){
			$context->getVariables()->setNested($this->var, $data);
		}
		return new ReturningUiNodeOutcome($data);
	}
}
