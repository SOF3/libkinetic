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

use SOFe\Libkinetic\Clickable\Argument\ArgsComponent;
use SOFe\Libkinetic\Clickable\Argument\ArguableComponent;
use SOFe\Libkinetic\Clickable\Argument\SimpleArgsComponent;
use SOFe\Libkinetic\Clickable\ClickableComponent;
use SOFe\Libkinetic\Clickable\ClickableParentComponent;
use SOFe\Libkinetic\Clickable\Entry\Command\CommandAliasComponent;
use SOFe\Libkinetic\Clickable\Entry\Command\CommandEntryComponent;
use SOFe\Libkinetic\Clickable\Entry\DirectEntryClickableComponent;
use SOFe\Libkinetic\Clickable\Entry\Interact\BlockFilterComponent;
use SOFe\Libkinetic\Clickable\Entry\Interact\FaceFilterComponent;
use SOFe\Libkinetic\Clickable\Entry\Interact\InteractEntryComponent;
use SOFe\Libkinetic\Clickable\Entry\Interact\ItemFilterComponent;
use SOFe\Libkinetic\Clickable\Entry\Interact\TouchModeFilterComponent;
use SOFe\Libkinetic\Clickable\ExitComponent;
use SOFe\Libkinetic\Clickable\LinkComponent;
use SOFe\Libkinetic\Clickable\PermissionComponent;
use SOFe\Libkinetic\Clickable\Window\IndexComponent;
use SOFe\Libkinetic\Clickable\Window\InfoComponent;
use SOFe\Libkinetic\Clickable\Window\ListComponent;
use SOFe\Libkinetic\Element\DropdownComponent;
use SOFe\Libkinetic\Element\DropdownOptionComponent;
use SOFe\Libkinetic\Element\ElementComponent;
use SOFe\Libkinetic\Element\ElementParentComponent;
use SOFe\Libkinetic\Element\InputComponent;
use SOFe\Libkinetic\Element\LabelComponent;
use SOFe\Libkinetic\Element\SliderComponent;
use SOFe\Libkinetic\Element\ToggleComponent;
use SOFe\Libkinetic\Root\RootComponent;

/**
 * This file generates template functions to access KineticNode->getComponent().
 *
 * (This file would be unneeded if we had template functions in PHP)
 *
 * @see KineticNode::getComponent()
 */
trait ComponentAdapter{
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


	public function asArgs() : ArgsComponent{
		return $this->getComponent(ArgsComponent::class);
	}

	public function getArgs(&$component) : KineticNode{
		$component = $this->getComponent(ArgsComponent::class);
		return $this;
	}

	public function addArgs(array &$component) : KineticNode{
		$component[] = $this->getComponent(ArgsComponent::class);
		return $this;
	}


	public function asArguable() : ArguableComponent{
		return $this->getComponent(ArguableComponent::class);
	}

	public function getArguable(&$component) : KineticNode{
		$component = $this->getComponent(ArguableComponent::class);
		return $this;
	}

	public function addArguable(array &$component) : KineticNode{
		$component[] = $this->getComponent(ArguableComponent::class);
		return $this;
	}


	public function asSimpleArgs() : SimpleArgsComponent{
		return $this->getComponent(SimpleArgsComponent::class);
	}

	public function getSimpleArgs(&$component) : KineticNode{
		$component = $this->getComponent(SimpleArgsComponent::class);
		return $this;
	}

	public function addSimpleArgs(array &$component) : KineticNode{
		$component[] = $this->getComponent(SimpleArgsComponent::class);
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


	public function asClickableParent() : ClickableParentComponent{
		return $this->getComponent(ClickableParentComponent::class);
	}

	public function getClickableParent(&$component) : KineticNode{
		$component = $this->getComponent(ClickableParentComponent::class);
		return $this;
	}

	public function addClickableParent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ClickableParentComponent::class);
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


	public function asBlockFilter() : BlockFilterComponent{
		return $this->getComponent(BlockFilterComponent::class);
	}

	public function getBlockFilter(&$component) : KineticNode{
		$component = $this->getComponent(BlockFilterComponent::class);
		return $this;
	}

	public function addBlockFilter(array &$component) : KineticNode{
		$component[] = $this->getComponent(BlockFilterComponent::class);
		return $this;
	}


	public function asFaceFilter() : FaceFilterComponent{
		return $this->getComponent(FaceFilterComponent::class);
	}

	public function getFaceFilter(&$component) : KineticNode{
		$component = $this->getComponent(FaceFilterComponent::class);
		return $this;
	}

	public function addFaceFilter(array &$component) : KineticNode{
		$component[] = $this->getComponent(FaceFilterComponent::class);
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


	public function asItemFilter() : ItemFilterComponent{
		return $this->getComponent(ItemFilterComponent::class);
	}

	public function getItemFilter(&$component) : KineticNode{
		$component = $this->getComponent(ItemFilterComponent::class);
		return $this;
	}

	public function addItemFilter(array &$component) : KineticNode{
		$component[] = $this->getComponent(ItemFilterComponent::class);
		return $this;
	}


	public function asTouchModeFilter() : TouchModeFilterComponent{
		return $this->getComponent(TouchModeFilterComponent::class);
	}

	public function getTouchModeFilter(&$component) : KineticNode{
		$component = $this->getComponent(TouchModeFilterComponent::class);
		return $this;
	}

	public function addTouchModeFilter(array &$component) : KineticNode{
		$component[] = $this->getComponent(TouchModeFilterComponent::class);
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


	public function asDropdown() : DropdownComponent{
		return $this->getComponent(DropdownComponent::class);
	}

	public function getDropdown(&$component) : KineticNode{
		$component = $this->getComponent(DropdownComponent::class);
		return $this;
	}

	public function addDropdown(array &$component) : KineticNode{
		$component[] = $this->getComponent(DropdownComponent::class);
		return $this;
	}


	public function asDropdownOption() : DropdownOptionComponent{
		return $this->getComponent(DropdownOptionComponent::class);
	}

	public function getDropdownOption(&$component) : KineticNode{
		$component = $this->getComponent(DropdownOptionComponent::class);
		return $this;
	}

	public function addDropdownOption(array &$component) : KineticNode{
		$component[] = $this->getComponent(DropdownOptionComponent::class);
		return $this;
	}


	public function asElement() : ElementComponent{
		return $this->getComponent(ElementComponent::class);
	}

	public function getElement(&$component) : KineticNode{
		$component = $this->getComponent(ElementComponent::class);
		return $this;
	}

	public function addElement(array &$component) : KineticNode{
		$component[] = $this->getComponent(ElementComponent::class);
		return $this;
	}


	public function asElementParent() : ElementParentComponent{
		return $this->getComponent(ElementParentComponent::class);
	}

	public function getElementParent(&$component) : KineticNode{
		$component = $this->getComponent(ElementParentComponent::class);
		return $this;
	}

	public function addElementParent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ElementParentComponent::class);
		return $this;
	}


	public function asInput() : InputComponent{
		return $this->getComponent(InputComponent::class);
	}

	public function getInput(&$component) : KineticNode{
		$component = $this->getComponent(InputComponent::class);
		return $this;
	}

	public function addInput(array &$component) : KineticNode{
		$component[] = $this->getComponent(InputComponent::class);
		return $this;
	}


	public function asLabel() : LabelComponent{
		return $this->getComponent(LabelComponent::class);
	}

	public function getLabel(&$component) : KineticNode{
		$component = $this->getComponent(LabelComponent::class);
		return $this;
	}

	public function addLabel(array &$component) : KineticNode{
		$component[] = $this->getComponent(LabelComponent::class);
		return $this;
	}


	public function asSlider() : SliderComponent{
		return $this->getComponent(SliderComponent::class);
	}

	public function getSlider(&$component) : KineticNode{
		$component = $this->getComponent(SliderComponent::class);
		return $this;
	}

	public function addSlider(array &$component) : KineticNode{
		$component[] = $this->getComponent(SliderComponent::class);
		return $this;
	}


	public function asToggle() : ToggleComponent{
		return $this->getComponent(ToggleComponent::class);
	}

	public function getToggle(&$component) : KineticNode{
		$component = $this->getComponent(ToggleComponent::class);
		return $this;
	}

	public function addToggle(array &$component) : KineticNode{
		$component[] = $this->getComponent(ToggleComponent::class);
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


	public function asWindow() : WindowComponent{
		return $this->getComponent(WindowComponent::class);
	}

	public function getWindow(&$component) : KineticNode{
		$component = $this->getComponent(WindowComponent::class);
		return $this;
	}

	public function addWindow(array &$component) : KineticNode{
		$component[] = $this->getComponent(WindowComponent::class);
		return $this;
	}
}
