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

namespace SOFe\Libkinetic\Clickable\Entry;

use Iterator;
use SOFe\Libkinetic\Clickable\ClickableComponent;
use SOFe\Libkinetic\Clickable\Entry\Command\CommandEntryComponent;
use SOFe\Libkinetic\Clickable\Entry\Interact\InteractEntryComponent;
use SOFe\Libkinetic\Clickable\PermissionClickableComponent;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\KineticNode;

class DirectEntryClickableComponent extends KineticComponent{
	protected $commands = [];
	protected $interacts = [];

	public function dependsComponents() : Iterator{
		yield PermissionClickableComponent::class;
	}

	public function startChild(string $name) : ?KineticNode{
		if($name === "COMMAND"){
			return KineticNode::create(CommandEntryComponent::class)->addCommandEntry($this->commands);
		}
		if($name === "INTERACT"){
			return KineticNode::create(InteractEntryComponent::class)->addInteractEntry($this->interacts);
		}
		return null;
	}

	public function getCommands() : array{
		return $this->commands;
	}

	public function getInteracts() : array{
		return $this->interacts;
	}
}
