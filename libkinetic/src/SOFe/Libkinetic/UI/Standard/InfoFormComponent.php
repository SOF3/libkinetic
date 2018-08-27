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

use function assert;
use Generator;
use function is_bool;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\Hybrid\HybridForms;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\VarRefAttribute;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;
use SOFe\Libkinetic\UI\GenericFormComponent;
use SOFe\Libkinetic\UI\GenericFormTrait;
use SOFe\Libkinetic\UI\Group\MuxOptionComponent;
use SOFe\Libkinetic\UI\UiComponent;
use SOFe\Libkinetic\UI\UiNode;
use SOFe\Libkinetic\UI\UiNodeOutcome;
use SOFe\Libkinetic\UI\UiNodeTrait;
use SOFe\Libkinetic\Variable\Variable;

class InfoFormComponent extends KineticComponent implements UiNode{
	use UiNodeTrait;
	use GenericFormTrait;

	/** @var string|null */
	protected $defaultVar = null;
	/** @var MuxOptionComponent|null */
	protected $yes = null;
	/** @var MuxOptionComponent|null */
	protected $no = null;

	public function getDependencies() : Generator{
		yield UiComponent::class;
		yield GenericFormComponent::modalForm();
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("defaultVar", new VarRefAttribute(Variable::TYPE_BOOL), $this->defaultVar, false);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptSingle("yes", MuxOptionComponent::class, $this->yes, true);
		$router->acceptSingle("no", MuxOptionComponent::class, $this->no, true);
	}

	protected function executeFormNode(FlowContext $context) : Generator{
		if($this->defaultVar !== null){
			$var = $context->getVariables()->getNestedVariable($this->defaultVar);
			if($var->isSet()){
				$choice = $var->getValue();
				assert(is_bool($choice));
			}
		}

		if(!isset($choice)){
			$choice = yield $this->asGenericFormComponent()->sendModalForm($context, $this->yes->getCommandName(), $this->yes->getDisplayName(), $this->no->getCommandName(), $this->no->getDisplayName());
		}

		$option = $choice ? $this->yes : $this->no;
		if($option!==null){
			return $option->asUiParentComponent()->getChildren()[0]->execute($context);
		}
		return new UiNodeOutcome;
	}
}
