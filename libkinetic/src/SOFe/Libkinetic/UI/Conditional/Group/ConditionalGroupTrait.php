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

namespace SOFe\Libkinetic\UI\Conditional\Group;

use Generator;
use LogicException;
use pocketmine\command\CommandSender;
use SOFe\Libkinetic\Base\KineticNode;
use SOFe\Libkinetic\UI\Conditional\ConditionalParentComponent;
use SOFe\Libkinetic\UI\Conditional\ConditionalTrait;
use SOFe\Libkinetic\Util\Await;
use function assert;
use function is_bool;

trait ConditionalGroupTrait{
	use ConditionalTrait;

	protected function testCondition(CommandSender $sender) : Generator{
		/** @var bool|null $left */
		$left = null;

		/** @var ConditionalParentComponent $parent */
		$parent = $this->getNode()->getComponent(ConditionalParentComponent::class);
		/** @var ConditionalGroupComponent $group */
		$group = $this->getNode()->getComponent(ConditionalGroupComponent::class);
		foreach($parent->getPredicates() as $predicate){
			$right = yield Await::FROM => $predicate->test($sender);
			assert(is_bool($right));

			if($left !== null){
				$left = $this->reduce($left, $right);
			}else{
				$left = $right;
			}

			if($group->isShortCircuit()){
				$short = $this->shouldShortCircuit($left);
				if($short){
					return $left;
				}
			}
		}

		return $left;
	}

	protected abstract function reduce(bool $left, bool $right) : bool;

	protected abstract function canShortCircuit() : bool;

	protected function shouldShortCircuit(bool $bool) : bool{
		throw new LogicException("Class allows short-circuiting, but shouldShortCircuit is not implemented");
	}

	public function getDependencies() : Generator{
		yield new ConditionalGroupComponent($this->canShortCircuit());
	}

	public abstract function getNode() : KineticNode;
}
