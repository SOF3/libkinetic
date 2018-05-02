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

namespace SOFe\libkinetic\Window\Entry;

use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Window\Entry\Command\CommandEntryPointNode;
use SOFe\libkinetic\Window\Entry\Item\ItemEntryPointNode;
use SOFe\libkinetic\Window\WindowNode;

abstract class DirectEntryWindowNode extends WindowNode{
	/** @var CommandEntryPointNode|null */
	protected $cmd = null;
	/** @var ItemEntryPointNode|null */
	protected $item = null;

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "COMMAND"){
			return $this->cmd = new CommandEntryPointNode();
		}

		if($name === "ITEM"){
			return $this->item = new ItemEntryPointNode();
		}

		return null;
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"cmd" => $this->cmd,
			];
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		if($this->cmd !== null){
			$this->cmd->resolve($manager);
		}
		if($this->item !== null){
			$this->item->resolve($manager);
		}
	}
}
