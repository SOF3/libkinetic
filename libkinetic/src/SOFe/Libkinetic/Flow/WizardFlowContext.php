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

use Generator;
use SOFe\Libkinetic\Wizard\WizardComponent;

class WizardFlowContext extends FlowContext{
	/** @var WizardComponent */
	protected $wizard;
	/** @var FlowContext */
	protected $parent;

	public function __construct(WizardComponent $wizard, FlowContext $parent){
		parent::__construct($parent->user, $wizard->asIdComponent()->getId(), $wizard->getManager());
		$this->wizard = $wizard;
		$this->parent = $parent;

		$this->variableScope = new VariableScope($wizard->asUiGroupComponent()->getVars(), $parent->variableScope);
	}

	public function execute() : Generator{
		return yield GroupFlowContext::executeNodes($this, $this->id, $this->wizard->asUiParentComponent()->getChildren());
	}
}
