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
use pocketmine\command\CommandSender;
use SOFe\Libkinetic\Base\KineticNode;
use SOFe\Libkinetic\UI\NodeState\BaseUiNodeStateComponent;
use SOFe\Libkinetic\Util\Await;
use function assert;

trait ConditionalTrait{
	public function getDependencies() : Generator{
		$parent = $this->getNode()->getParent();
		assert($parent !== null);
		yield new ConditionalComponent($parent->hasComponent(BaseUiNodeStateComponent::class));
	}

	public final function test(CommandSender $sender) : Generator{
		$bool = yield Await::FROM => $this->testCondition($sender);
		return $this->getNode()->asConditionalComponent()->applyNot($bool);
	}

	protected abstract function testCondition(CommandSender $sender) : Generator;

	protected abstract function getNode() : KineticNode;
}
