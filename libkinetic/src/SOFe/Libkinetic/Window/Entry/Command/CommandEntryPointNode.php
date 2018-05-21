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

namespace SOFe\Libkinetic\Window\Entry\Command;

use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\Node\KineticNode;
use SOFe\Libkinetic\Window\Entry\AbstractEntryPointNode;
use function array_map;

class CommandEntryPointNode extends AbstractEntryPointNode{
	/** @var string */
	protected $name;
	/** @var string|null */
	protected $description = null;
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

		if($name === "DESCRIPTION"){
			$this->description = $value;
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
		parent::resolve($manager);

		if($this->description !== null){
			$manager->requireTranslation($this, $this->description);
		}
		foreach($this->aliases as $node){
			$node->resolve($manager);
		}
		$manager->getPlugin()->getServer()->getCommandMap()->register($manager->getPlugin()->getName(), new NodeEntryCommand($manager, $this));
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"name" => $this->name,
				"aliases" => $this->aliases,
			];
	}

	public function getName() : string{
		return $this->name;
	}

	public function getAliases() : array{
		return $this->aliases;
	}

	public function getAliasStrings() : array{
		return array_map(function(CommandAliasNode $node) : string{
			return $node->getText();
		}, $this->aliases);
	}
}
