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

use Generator;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\LibkineticMessages;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\VarRefAttribute;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;
use SOFe\Libkinetic\UI\GenericFormComponent;
use SOFe\Libkinetic\UI\GenericFormTrait;
use SOFe\Libkinetic\UI\Standard\IconListEntry;
use SOFe\Libkinetic\UI\UiComponent;
use SOFe\Libkinetic\UI\UiNode;
use SOFe\Libkinetic\UI\UiNodeTrait;
use SOFe\Libkinetic\UserString;
use SOFe\Libkinetic\Util\ArrayUtil;
use SOFe\Libkinetic\Variable\Variable;

class MuxComponent extends KineticComponent implements UiNode{
	use UiNodeTrait;
	use GenericFormTrait;

	/** @var string|null */
	protected $var = null;
	/** @var MuxOptionComponent[] */
	protected $options = [];

	public function getDependencies() : Generator{
		yield UiComponent::class;
		yield GenericFormComponent::listForm();
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("var", new VarRefAttribute(Variable::TYPE_STRING), $this->var, false);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("option", MuxOptionComponent::class, $this->options, 2);
	}

	public function endElement() : void{
		$this->options = ArrayUtil::indexByProperty($this->options, function(MuxOptionComponent $component, int $i) : string{
			return $component->getCommandName() ?? (string) $i;
		});
	}

	protected function executeFormNode(FlowContext $context) : Generator{
		$choice = yield $this->whichOption($context);
		return yield $this->options[$choice]->asUiParentComponent()->getChildren()[0]->execute($context);
	}

	protected function whichOption(FlowContext $context) : Generator{
		if($this->var !== null){
			$var = $context->getVariables()->getNestedVariable($this->var);
			if($var->isSet()){
				$choice = $var->getValue();

				if(isset($this->options[$choice])){
					return $this->options[$choice]->getCommandName();
				}else{
					$this->manager->getPlugin()->getLogger()->warning("[libkinetic] The $this->var variable contains an unknown choice $choice. This variable will be ignored, and the user will be asked to choose an option.");
				}
			}
		}
		$options = [];
		foreach($this->options as $mnemonic => $component){
			if($component->getCommandName() === $mnemonic){
				$options[] = new IconListEntry($mnemonic, $component->getAliases(), $component->getDisplayName() ?? new UserString(LibkineticMessages::LIST_FORM_DUMMY_OPTION), $mnemonic, null);
			}
		}
		return yield $this->asGenericFormComponent()->sendListForm($context, $options);
	}
}
