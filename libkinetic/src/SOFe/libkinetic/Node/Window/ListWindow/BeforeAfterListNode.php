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

namespace SOFe\libkinetic\Node\Window\ListWindow;

use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\Window\WindowNode;
use SOFe\libkinetic\Node\Window\WindowParentNode;
use function assert;

abstract class BeforeAfterListNode extends WindowNode{
	use WindowParentNode {
		resolve as private wpn_resolve;
	}

	public function setAttribute(string $name, string $value) : bool{
		if($name === "ID"){
			return false;
		}

		return parent::setAttribute($name, $value);
	}

	public function endAttributes() : void{
		assert($this->nodeParent instanceof ListNode);
		$this->id = $this->nodeParent->id . ".{$this->getIdPart()}";

		parent::endAttributes();
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$this->wpn_resolve($manager);
	}

	protected abstract function getIdPart() : string;
}
