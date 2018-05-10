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

namespace SOFe\Libkinetic\Window\ListWindow;

use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\Node\KineticNode;
use SOFe\Libkinetic\Node\KineticNodeWithId;
use SOFe\Libkinetic\Window\ClickableParentNode;
use function assert;

abstract class BeforeAfterListNode extends KineticNode implements KineticNodeWithId{
	use ClickableParentNode;

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($delegate = $this->cpn_startChild($name)){
			return $delegate;
		}

		return null;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$this->cpn_resolve($manager);
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + $this->cpn_jsonSerialize() + [
			];
	}

	public function getId() : string{
		assert($this->nodeParent instanceof ListNode);
		return $this->nodeParent->getId() . "." . $this->getIdPart();
	}

	protected abstract function getIdPart() : string;
}
