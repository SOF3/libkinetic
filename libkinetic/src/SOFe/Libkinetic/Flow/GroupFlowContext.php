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
use SOFe\Libkinetic\UI\UiNodeOutcome;
use SOFe\Libkinetic\Util\Await;
use UnexpectedValueException;
use function array_flip;
use function array_keys;
use function assert;

class GroupFlowContext extends FlowContext{
	/** @var UiGroupComponent */
	protected $group;
	/** @var FlowContext */
	protected $parent;

	public function __construct(UiNode $interface, FlowContext $parent){
		parent::__construct($interface, $parent->user);
		$this->group = $interface->getNode()->asUiGroupComponent();
		$this->parent = $parent;

		$this->variableScope = new VariableScope($this->group->getVars(), $parent->variableScope);
	}

	public function isRoot() : bool{
		return true;
	}

	public function getParent() : FlowContext{
		return $this->parent;
	}

	public function execute() : Generator{
		$list = $this->group->asUiParentComponent()->getChildren();
		/** @var string[] $indexToKey */
		$indexToKey = array_keys($list);
		/** @var int[] $keyToIndex */
		$keyToIndex = array_flip($indexToKey);

		$nextIndex = 0;
		while(true){
			$outcome = yield Await::FROM => $list[$indexToKey[$nextIndex]]->execute($this);
			assert($outcome instanceof UiNodeOutcome);
			switch($outcome->getOutcome()){
				case UiNodeOutcome::OUTCOME_SKIP:
					if($outcome->getTarget() !== null){
						if(isset($keyToIndex[$outcome->getTarget()])){
							$nextIndex = $keyToIndex[$outcome->getTarget()];
							continue 2;
						}else{
							return $outcome;
						}
					}

					++$nextIndex;
					if(isset($indexToKey[$nextIndex])){
						continue 2;
					}else{
						return $outcome; // outcome = SKIP, target = null
					}

				case UiNodeOutcome::OUTCOME_BREAK:
					if($outcome->getTarget() === null || $outcome->getTarget() === $this->getId()){
						return $outcome;
					}else{
						return new UiNodeOutcome(UiNodeOutcome::OUTCOME_SKIP, null);
					}

				case UiNodeOutcome::OUTCOME_EXIT:
					return $outcome;

				default:
					throw new UnexpectedValueException("Unexpected outcome ID " . $outcome->getOutcome());
			}
		}
	}
}
