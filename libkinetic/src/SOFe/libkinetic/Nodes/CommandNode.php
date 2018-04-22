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

namespace SOFe\libkinetic\Nodes;

use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\NodeEntryCommand;
use function assert;

class CommandNode extends KineticNode implements ResolvableNode{
	/** @var string */
	protected $name;
	/** @var CommandAliasNode[] */
	protected $aliases = [];

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "NAME"){
			$this->name = $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();

		$this->requireAttributes("name");
	}

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "ALIAS"){
			return $this->aliases[] = new CommandAliasNode();
		}

		return null;
	}

	public function resolve(KineticManager $manager) : void{
		assert($this->nodeParent instanceof CommandEntryWindowNode);
		$manager->getPlugin()->getServer()->getCommandMap()->register($manager->getPlugin()->getName(), new NodeEntryCommand($manager, $this));
	}

	public function getName() : string{
		return $this->name;
	}

	public function getAliases() : array{
		return $this->aliases;
	}
}
