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

namespace SOFe\libkinetic\Window;

use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Window\Entry\DirectEntryWindowNode;

/**
 * Index is displayed as a MenuForm, where options are hardcoded to be links to a child window or a link to a window identified by its ID.
 */
class IndexNode extends DirectEntryWindowNode{
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

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + $this->cpn_jsonSerialize() + [
			];
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$this->cpn_resolve($manager);
	}
}
