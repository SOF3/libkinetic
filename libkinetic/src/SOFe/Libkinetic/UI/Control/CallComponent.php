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

namespace SOFe\Libkinetic\UI\Control;

use Generator;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\Flow\WizardFlowContext;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\StringAttribute;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;
use SOFe\Libkinetic\UI\UiComponent;
use SOFe\Libkinetic\UI\UiNode;
use SOFe\Libkinetic\UI\UiNodeTrait;
use SOFe\Libkinetic\Wizard\WizardComponent;

class CallComponent extends KineticComponent implements UiNode{
	use UiNodeTrait;

	/** @var string */
	protected $target;
	/** @var WizardComponent */
	protected $wizard;
	/** @var CallParamComponent[] */
	protected $params = [];

	public function getDependencies() : Generator{
		yield UiComponent::class;
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("target", new StringAttribute(), $this->target, true);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("param", CallParamComponent::class, $this->params, 0);
	}

	public function resolve() : void{
		foreach($this->asRootComponent()->getWizards() as $wizard){
			if($wizard->asIdComponent()->getId() === $this->target){
				$this->wizard = $wizard;
				return;
			}
		}
		throw $this->node->throw("Undefined wizard ID " . $this->target);
	}

	protected function executeNode(FlowContext $context) : Generator{
		$child = new WizardFlowContext($this->wizard, $context);
		foreach($this->params as $param){
			$child->getVariables()->setNested($param->getAs(), $context->getVariables()->getNested($param->getVar()));
		}

		yield $child->execute();
	}
}
