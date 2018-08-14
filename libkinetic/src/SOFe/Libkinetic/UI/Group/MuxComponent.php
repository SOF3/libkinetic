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

namespace SOFe\Libkinetic\UI\Group;

use function array_map;
use Generator;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\Form\HybridForms;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\UserStringAttribute;
use SOFe\Libkinetic\Parser\Attribute\VarRefAttribute;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;
use SOFe\Libkinetic\UI\UiComponent;
use SOFe\Libkinetic\UI\UiNode;
use SOFe\Libkinetic\UI\UiNodeTrait;
use SOFe\Libkinetic\UserString;
use SOFe\Libkinetic\Util\Await;

class MuxComponent extends KineticComponent implements UiNode{
	use UiNodeTrait;

	/** @var UserString */
	protected $title, $synopsis;
	/** @var string */
	protected $var;
	/** @var MuxOptionComponent[] */
	protected $options;

	public function getDependencies() : Generator{
		yield UiComponent::class;
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("title", new UserStringAttribute(), $this->title, false);
		$router->use("synopsis", new UserStringAttribute(), $this->synopsis, false);
		$router->use("var", new VarRefAttribute(), $this->var, true);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("option", MuxOptionComponent::class, $this->options, 2);
	}

	protected function executeNode(FlowContext $context) : Generator{
		$var = $context->getVariables()->getNestedVariable($this->var);
		if($var->isSet()){
			$choice = $var->getValue();
		}else{
			$options = [];
			foreach($this->options as $i => $component){
				$options[] = [$component->getCommandName() ?? (string) $i, $component->getDisplayName() ?? "#$i", $i];
			}
			$choice = yield Await::FROM => HybridForms::list($context, $this->title, $this->synopsis, $options);
		}
		return yield Await::FROM => $this->options[$choice]->asUiParentComponent()->getChildren()[0]->execute($context);
	}
}
