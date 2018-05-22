<?php /** @noinspection PhpIncompatibleReturnTypeInspection */

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

namespace SOFe\Libkinetic;

use SOFe\Libkinetic\Clickable\ClickableComponent;
use SOFe\Libkinetic\Clickable\ClickableListComponent;
use SOFe\Libkinetic\Clickable\Entry\Command\CommandAliasComponent;
use SOFe\Libkinetic\Clickable\Entry\Command\CommandEntryComponent;
use SOFe\Libkinetic\Clickable\Entry\DirectEntryClickableComponent;
use SOFe\Libkinetic\Clickable\Entry\Interact\InteractEntryComponent;
use SOFe\Libkinetic\Clickable\ExitComponent;
use SOFe\Libkinetic\Clickable\IndexComponent;
use SOFe\Libkinetic\Clickable\InfoComponent;
use SOFe\Libkinetic\Clickable\LinkComponent;
use SOFe\Libkinetic\Clickable\ListComponent;
use SOFe\Libkinetic\Clickable\PermissionComponent;
use SOFe\Libkinetic\Root\RootComponent;

/**
 * This file generates template functions to access KineticNode->getComponent().
 *
 * (This file would be unneeded if we had template functions in PHP)
 *
 * @see KineticNode::getComponent()
 */
abstract class ComponentAdapter{
	public abstract function getComponent(string $class) : KineticComponent;


	public function asAbsoluteId() : AbsoluteIdComponent{
		return $this->getComponent(AbsoluteIdComponent::class);
	}

	public function getAbsoluteId(&$component) : KineticNode{
		$component = $this->getComponent(AbsoluteIdComponent::class);
		return $this;
	}

	public function addAbsoluteId(array &$component) : KineticNode{
		$component[] = $this->getComponent(AbsoluteIdComponent::class);
		return $this;
	}


	public function asClickable() : ClickableComponent{
		return $this->getComponent(ClickableComponent::class);
	}

	public function getClickable(&$component) : KineticNode{
		$component = $this->getComponent(ClickableComponent::class);
		return $this;
	}

	public function addClickable(array &$component) : KineticNode{
		$component[] = $this->getComponent(ClickableComponent::class);
		return $this;
	}


	public function asClickableList() : ClickableListComponent{
		return $this->getComponent(ClickableListComponent::class);
	}

	public function getClickableList(&$component) : KineticNode{
		$component = $this->getComponent(ClickableListComponent::class);
		return $this;
	}

	public function addClickableList(array &$component) : KineticNode{
		$component[] = $this->getComponent(ClickableListComponent::class);
		return $this;
	}


	public function asCommandAlias() : CommandAliasComponent{
		return $this->getComponent(CommandAliasComponent::class);
	}

	public function getCommandAlias(&$component) : KineticNode{
		$component = $this->getComponent(CommandAliasComponent::class);
		return $this;
	}

	public function addCommandAlias(array &$component) : KineticNode{
		$component[] = $this->getComponent(CommandAliasComponent::class);
		return $this;
	}


	public function asCommandEntry() : CommandEntryComponent{
		return $this->getComponent(CommandEntryComponent::class);
	}

	public function getCommandEntry(&$component) : KineticNode{
		$component = $this->getComponent(CommandEntryComponent::class);
		return $this;
	}

	public function addCommandEntry(array &$component) : KineticNode{
		$component[] = $this->getComponent(CommandEntryComponent::class);
		return $this;
	}


	public function asDirectEntryClickable() : DirectEntryClickableComponent{
		return $this->getComponent(DirectEntryClickableComponent::class);
	}

	public function getDirectEntryClickable(&$component) : KineticNode{
		$component = $this->getComponent(DirectEntryClickableComponent::class);
		return $this;
	}

	public function addDirectEntryClickable(array &$component) : KineticNode{
		$component[] = $this->getComponent(DirectEntryClickableComponent::class);
		return $this;
	}


	public function asInteractEntry() : InteractEntryComponent{
		return $this->getComponent(InteractEntryComponent::class);
	}

	public function getInteractEntry(&$component) : KineticNode{
		$component = $this->getComponent(InteractEntryComponent::class);
		return $this;
	}

	public function addInteractEntry(array &$component) : KineticNode{
		$component[] = $this->getComponent(InteractEntryComponent::class);
		return $this;
	}


	public function asExit() : ExitComponent{
		return $this->getComponent(ExitComponent::class);
	}

	public function getExit(&$component) : KineticNode{
		$component = $this->getComponent(ExitComponent::class);
		return $this;
	}

	public function addExit(array &$component) : KineticNode{
		$component[] = $this->getComponent(ExitComponent::class);
		return $this;
	}


	public function asIndex() : IndexComponent{
		return $this->getComponent(IndexComponent::class);
	}

	public function getIndex(&$component) : KineticNode{
		$component = $this->getComponent(IndexComponent::class);
		return $this;
	}

	public function addIndex(array &$component) : KineticNode{
		$component[] = $this->getComponent(IndexComponent::class);
		return $this;
	}


	public function asInfo() : InfoComponent{
		return $this->getComponent(InfoComponent::class);
	}

	public function getInfo(&$component) : KineticNode{
		$component = $this->getComponent(InfoComponent::class);
		return $this;
	}

	public function addInfo(array &$component) : KineticNode{
		$component[] = $this->getComponent(InfoComponent::class);
		return $this;
	}


	public function asLink() : LinkComponent{
		return $this->getComponent(LinkComponent::class);
	}

	public function getLink(&$component) : KineticNode{
		$component = $this->getComponent(LinkComponent::class);
		return $this;
	}

	public function addLink(array &$component) : KineticNode{
		$component[] = $this->getComponent(LinkComponent::class);
		return $this;
	}


	public function asList() : ListComponent{
		return $this->getComponent(ListComponent::class);
	}

	public function getList(&$component) : KineticNode{
		$component = $this->getComponent(ListComponent::class);
		return $this;
	}

	public function addList(array &$component) : KineticNode{
		$component[] = $this->getComponent(ListComponent::class);
		return $this;
	}


	public function asPermission() : PermissionComponent{
		return $this->getComponent(PermissionComponent::class);
	}

	public function getPermission(&$component) : KineticNode{
		$component = $this->getComponent(PermissionComponent::class);
		return $this;
	}

	public function addPermission(array &$component) : KineticNode{
		$component[] = $this->getComponent(PermissionComponent::class);
		return $this;
	}


	public function asRoot() : RootComponent{
		return $this->getComponent(RootComponent::class);
	}

	public function getRoot(&$component) : KineticNode{
		$component = $this->getComponent(RootComponent::class);
		return $this;
	}

	public function addRoot(array &$component) : KineticNode{
		$component[] = $this->getComponent(RootComponent::class);
		return $this;
	}
}
