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
use SOFe\libkinetic\Window\Entry\Interact\InteractEntryPointNode;
use SOFe\libkinetic\Window\WindowNode;

abstract class DirectEntryWindowNode extends WindowNode{
	/** @var CommandEntryPointNode[] */
	protected $cmds = [];
	/** @var InteractEntryPointNode[] */
	protected $interacts = [];

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "COMMAND"){
			return $this->cmds[] = new CommandEntryPointNode();
		}

		if($name === "ITEM"){
			return $this->interacts[] = new InteractEntryPointNode();
		}

		return null;
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"cmds" => $this->cmds,
				"interacts" => $this->interacts,
			];
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		foreach($this->cmds as $cmd){
			$cmd->resolve($manager);
		}
		foreach($this->interacts as $interact){
			$interact->resolve($manager);
		}
	}
}
