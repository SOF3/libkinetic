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

namespace SOFe\Libkinetic\Clickable\Entry\Command;

use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\KineticNode;

class CommandEntryComponent extends KineticComponent{
	/** @var string */
	protected $name;
	/** @var string */
	protected $description;
	/** @var CommandAliasComponent[] */
	protected $aliases = [];

	public function setAttribute(string $name, string $value) : bool{
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

	public function startChild(string $name) : ?KineticNode{
		if($name === "ALIAS"){
			return KineticNode::create(CommandAliasComponent::class)->addCommandAliasComponent($this->aliases);
		}
		return null;
	}

	public function endElement() : void{
		$this->requireAttribute("name", $this->name);
	}

	public function init() : void{
		$this->resolveConfigString($this->name);
		$this->requireTranslation($this->description);
	}

	public function getName() : string{
		return $this->name;
	}

	public function getDescription() : string{
		return $this->description;
	}

	public function getAliases() : array{
		return $this->aliases;
	}
}
