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
use pocketmine\command\CommandSender;
use SOFe\Libkinetic\UI\Group\UiGroupComponent;
use SOFe\Libkinetic\UI\UiNode;
use SOFe\Libkinetic\Util\Await;

class EntryFlowContext extends FlowContext{
	public function __construct(UiNode $interface, CommandSender $user){
		parent::__construct($interface, $user);

		$vars = [];
		for($node = $interface->getNode(); $node !== null; $node = $node->getParent()){
			if($node->getComponent(UiGroupComponent::class) !== null){
				foreach($node->asUiGroupComponent()->getVars() as $var){
					$vars[] = $var;
				}
			}
		}
		$this->variableScope = new VariableScope($vars, null);
	}

	public function isRoot() : bool{
		return true;
	}

	public function execute() : Generator{
		yield Await::FROM => $this->interface->execute($this);
	}
}
