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

use SOFe\Libkinetic\Clickable\Argument\ArgComponent;
use SOFe\Libkinetic\Clickable\Argument\ArguableComponent;
use SOFe\Libkinetic\Clickable\Argument\SimpleArgComponent;
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
use SOFe\Libkinetic\Clickable\PermissionClickableComponent;
use SOFe\Libkinetic\Clickable\PermissionComponent;
use SOFe\Libkinetic\Clickable\Window\IndexComponent;
use SOFe\Libkinetic\Clickable\Window\InfoComponent;
use SOFe\Libkinetic\Clickable\Window\ListComponent;
use SOFe\Libkinetic\Element\DropdownOptionComponent;
use SOFe\Libkinetic\Element\DynamicDropdownComponent;
use SOFe\Libkinetic\Element\DynamicStepSliderComponent;
use SOFe\Libkinetic\Element\ElementComponent;
use SOFe\Libkinetic\Element\ElementParentComponent;
use SOFe\Libkinetic\Element\ElementParentWithFallbackRequiredComponent;
use SOFe\Libkinetic\Element\InputComponent;
use SOFe\Libkinetic\Element\LabelComponent;
use SOFe\Libkinetic\Element\RequiredComponent;
use SOFe\Libkinetic\Element\RequiredWithFallbackComponent;
use SOFe\Libkinetic\Element\SliderComponent;
use SOFe\Libkinetic\Element\StaticDropdownComponent;
use SOFe\Libkinetic\Element\StaticStepSliderComponent;
use SOFe\Libkinetic\Element\ToggleComponent;
use SOFe\Libkinetic\Root\ContCommandComponent;
use SOFe\Libkinetic\Root\RootComponent;

/**
 * This file generates template functions to access KineticNode->getComponent().
 *
 * (This file would be unneeded if we had template functions in PHP)
 */
trait ComponentAdapter{
	public abstract function getComponent(string $class) : KineticComponent;


	public function asAbsoluteIdComponent() : AbsoluteIdComponent{
		return $this->getComponent(AbsoluteIdComponent::class);
	}

	public function getAbsoluteIdComponent(&$component) : KineticNode{
		$component = $this->getComponent(AbsoluteIdComponent::class);
		return $this;
	}

	public function addAbsoluteIdComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(AbsoluteIdComponent::class);
		return $this;
	}


	public function asArgComponent() : ArgComponent{
		return $this->getComponent(ArgComponent::class);
	}

	public function getArgComponent(&$component) : KineticNode{
		$component = $this->getComponent(ArgComponent::class);
		return $this;
	}

	public function addArgComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ArgComponent::class);
		return $this;
	}


	public function asArguableComponent() : ArguableComponent{
		return $this->getComponent(ArguableComponent::class);
	}

	public function getArguableComponent(&$component) : KineticNode{
		$component = $this->getComponent(ArguableComponent::class);
		return $this;
	}

	public function addArguableComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ArguableComponent::class);
		return $this;
	}


	public function asSimpleArgComponent() : SimpleArgComponent{
		return $this->getComponent(SimpleArgComponent::class);
	}

	public function getSimpleArgComponent(&$component) : KineticNode{
		$component = $this->getComponent(SimpleArgComponent::class);
		return $this;
	}

	public function addSimpleArgComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(SimpleArgComponent::class);
		return $this;
	}


	public function asClickableComponent() : ClickableComponent{
		return $this->getComponent(ClickableComponent::class);
	}

	public function getClickableComponent(&$component) : KineticNode{
		$component = $this->getComponent(ClickableComponent::class);
		return $this;
	}

	public function addClickableComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ClickableComponent::class);
		return $this;
	}


	public function asClickableParentComponent() : ClickableParentComponent{
		return $this->getComponent(ClickableParentComponent::class);
	}

	public function getClickableParentComponent(&$component) : KineticNode{
		$component = $this->getComponent(ClickableParentComponent::class);
		return $this;
	}

	public function addClickableParentComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ClickableParentComponent::class);
		return $this;
	}


	public function asCommandAliasComponent() : CommandAliasComponent{
		return $this->getComponent(CommandAliasComponent::class);
	}

	public function getCommandAliasComponent(&$component) : KineticNode{
		$component = $this->getComponent(CommandAliasComponent::class);
		return $this;
	}

	public function addCommandAliasComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(CommandAliasComponent::class);
		return $this;
	}


	public function asCommandEntryComponent() : CommandEntryComponent{
		return $this->getComponent(CommandEntryComponent::class);
	}

	public function getCommandEntryComponent(&$component) : KineticNode{
		$component = $this->getComponent(CommandEntryComponent::class);
		return $this;
	}

	public function addCommandEntryComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(CommandEntryComponent::class);
		return $this;
	}


	public function asDirectEntryClickableComponent() : DirectEntryClickableComponent{
		return $this->getComponent(DirectEntryClickableComponent::class);
	}

	public function getDirectEntryClickableComponent(&$component) : KineticNode{
		$component = $this->getComponent(DirectEntryClickableComponent::class);
		return $this;
	}

	public function addDirectEntryClickableComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(DirectEntryClickableComponent::class);
		return $this;
	}


	public function asBlockFilterComponent() : BlockFilterComponent{
		return $this->getComponent(BlockFilterComponent::class);
	}

	public function getBlockFilterComponent(&$component) : KineticNode{
		$component = $this->getComponent(BlockFilterComponent::class);
		return $this;
	}

	public function addBlockFilterComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(BlockFilterComponent::class);
		return $this;
	}


	public function asFaceFilterComponent() : FaceFilterComponent{
		return $this->getComponent(FaceFilterComponent::class);
	}

	public function getFaceFilterComponent(&$component) : KineticNode{
		$component = $this->getComponent(FaceFilterComponent::class);
		return $this;
	}

	public function addFaceFilterComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(FaceFilterComponent::class);
		return $this;
	}


	public function asInteractEntryComponent() : InteractEntryComponent{
		return $this->getComponent(InteractEntryComponent::class);
	}

	public function getInteractEntryComponent(&$component) : KineticNode{
		$component = $this->getComponent(InteractEntryComponent::class);
		return $this;
	}

	public function addInteractEntryComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(InteractEntryComponent::class);
		return $this;
	}


	public function asItemFilterComponent() : ItemFilterComponent{
		return $this->getComponent(ItemFilterComponent::class);
	}

	public function getItemFilterComponent(&$component) : KineticNode{
		$component = $this->getComponent(ItemFilterComponent::class);
		return $this;
	}

	public function addItemFilterComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ItemFilterComponent::class);
		return $this;
	}


	public function asTouchModeFilterComponent() : TouchModeFilterComponent{
		return $this->getComponent(TouchModeFilterComponent::class);
	}

	public function getTouchModeFilterComponent(&$component) : KineticNode{
		$component = $this->getComponent(TouchModeFilterComponent::class);
		return $this;
	}

	public function addTouchModeFilterComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(TouchModeFilterComponent::class);
		return $this;
	}


	public function asExitComponent() : ExitComponent{
		return $this->getComponent(ExitComponent::class);
	}

	public function getExitComponent(&$component) : KineticNode{
		$component = $this->getComponent(ExitComponent::class);
		return $this;
	}

	public function addExitComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ExitComponent::class);
		return $this;
	}


	public function asLinkComponent() : LinkComponent{
		return $this->getComponent(LinkComponent::class);
	}

	public function getLinkComponent(&$component) : KineticNode{
		$component = $this->getComponent(LinkComponent::class);
		return $this;
	}

	public function addLinkComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(LinkComponent::class);
		return $this;
	}


	public function asPermissionClickableComponent() : PermissionClickableComponent{
		return $this->getComponent(PermissionClickableComponent::class);
	}

	public function getPermissionClickableComponent(&$component) : KineticNode{
		$component = $this->getComponent(PermissionClickableComponent::class);
		return $this;
	}

	public function addPermissionClickableComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(PermissionClickableComponent::class);
		return $this;
	}


	public function asPermissionComponent() : PermissionComponent{
		return $this->getComponent(PermissionComponent::class);
	}

	public function getPermissionComponent(&$component) : KineticNode{
		$component = $this->getComponent(PermissionComponent::class);
		return $this;
	}

	public function addPermissionComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(PermissionComponent::class);
		return $this;
	}


	public function asIndexComponent() : IndexComponent{
		return $this->getComponent(IndexComponent::class);
	}

	public function getIndexComponent(&$component) : KineticNode{
		$component = $this->getComponent(IndexComponent::class);
		return $this;
	}

	public function addIndexComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(IndexComponent::class);
		return $this;
	}


	public function asInfoComponent() : InfoComponent{
		return $this->getComponent(InfoComponent::class);
	}

	public function getInfoComponent(&$component) : KineticNode{
		$component = $this->getComponent(InfoComponent::class);
		return $this;
	}

	public function addInfoComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(InfoComponent::class);
		return $this;
	}


	public function asListComponent() : ListComponent{
		return $this->getComponent(ListComponent::class);
	}

	public function getListComponent(&$component) : KineticNode{
		$component = $this->getComponent(ListComponent::class);
		return $this;
	}

	public function addListComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ListComponent::class);
		return $this;
	}


	public function asDropdownOptionComponent() : DropdownOptionComponent{
		return $this->getComponent(DropdownOptionComponent::class);
	}

	public function getDropdownOptionComponent(&$component) : KineticNode{
		$component = $this->getComponent(DropdownOptionComponent::class);
		return $this;
	}

	public function addDropdownOptionComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(DropdownOptionComponent::class);
		return $this;
	}


	public function asDynamicDropdownComponent() : DynamicDropdownComponent{
		return $this->getComponent(DynamicDropdownComponent::class);
	}

	public function getDynamicDropdownComponent(&$component) : KineticNode{
		$component = $this->getComponent(DynamicDropdownComponent::class);
		return $this;
	}

	public function addDynamicDropdownComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(DynamicDropdownComponent::class);
		return $this;
	}


	public function asDynamicStepSliderComponent() : DynamicStepSliderComponent{
		return $this->getComponent(DynamicStepSliderComponent::class);
	}

	public function getDynamicStepSliderComponent(&$component) : KineticNode{
		$component = $this->getComponent(DynamicStepSliderComponent::class);
		return $this;
	}

	public function addDynamicStepSliderComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(DynamicStepSliderComponent::class);
		return $this;
	}


	public function asElementComponent() : ElementComponent{
		return $this->getComponent(ElementComponent::class);
	}

	public function getElementComponent(&$component) : KineticNode{
		$component = $this->getComponent(ElementComponent::class);
		return $this;
	}

	public function addElementComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ElementComponent::class);
		return $this;
	}


	public function asElementParentComponent() : ElementParentComponent{
		return $this->getComponent(ElementParentComponent::class);
	}

	public function getElementParentComponent(&$component) : KineticNode{
		$component = $this->getComponent(ElementParentComponent::class);
		return $this;
	}

	public function addElementParentComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ElementParentComponent::class);
		return $this;
	}


	public function asElementParentWithFallbackRequiredComponent() : ElementParentWithFallbackRequiredComponent{
		return $this->getComponent(ElementParentWithFallbackRequiredComponent::class);
	}

	public function getElementParentWithFallbackRequiredComponent(&$component) : KineticNode{
		$component = $this->getComponent(ElementParentWithFallbackRequiredComponent::class);
		return $this;
	}

	public function addElementParentWithFallbackRequiredComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ElementParentWithFallbackRequiredComponent::class);
		return $this;
	}


	public function asInputComponent() : InputComponent{
		return $this->getComponent(InputComponent::class);
	}

	public function getInputComponent(&$component) : KineticNode{
		$component = $this->getComponent(InputComponent::class);
		return $this;
	}

	public function addInputComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(InputComponent::class);
		return $this;
	}


	public function asLabelComponent() : LabelComponent{
		return $this->getComponent(LabelComponent::class);
	}

	public function getLabelComponent(&$component) : KineticNode{
		$component = $this->getComponent(LabelComponent::class);
		return $this;
	}

	public function addLabelComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(LabelComponent::class);
		return $this;
	}


	public function asRequiredComponent() : RequiredComponent{
		return $this->getComponent(RequiredComponent::class);
	}

	public function getRequiredComponent(&$component) : KineticNode{
		$component = $this->getComponent(RequiredComponent::class);
		return $this;
	}

	public function addRequiredComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(RequiredComponent::class);
		return $this;
	}


	public function asRequiredWithFallbackComponent() : RequiredWithFallbackComponent{
		return $this->getComponent(RequiredWithFallbackComponent::class);
	}

	public function getRequiredWithFallbackComponent(&$component) : KineticNode{
		$component = $this->getComponent(RequiredWithFallbackComponent::class);
		return $this;
	}

	public function addRequiredWithFallbackComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(RequiredWithFallbackComponent::class);
		return $this;
	}


	public function asSliderComponent() : SliderComponent{
		return $this->getComponent(SliderComponent::class);
	}

	public function getSliderComponent(&$component) : KineticNode{
		$component = $this->getComponent(SliderComponent::class);
		return $this;
	}

	public function addSliderComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(SliderComponent::class);
		return $this;
	}


	public function asStaticDropdownComponent() : StaticDropdownComponent{
		return $this->getComponent(StaticDropdownComponent::class);
	}

	public function getStaticDropdownComponent(&$component) : KineticNode{
		$component = $this->getComponent(StaticDropdownComponent::class);
		return $this;
	}

	public function addStaticDropdownComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(StaticDropdownComponent::class);
		return $this;
	}


	public function asStaticStepSliderComponent() : StaticStepSliderComponent{
		return $this->getComponent(StaticStepSliderComponent::class);
	}

	public function getStaticStepSliderComponent(&$component) : KineticNode{
		$component = $this->getComponent(StaticStepSliderComponent::class);
		return $this;
	}

	public function addStaticStepSliderComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(StaticStepSliderComponent::class);
		return $this;
	}


	public function asToggleComponent() : ToggleComponent{
		return $this->getComponent(ToggleComponent::class);
	}

	public function getToggleComponent(&$component) : KineticNode{
		$component = $this->getComponent(ToggleComponent::class);
		return $this;
	}

	public function addToggleComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ToggleComponent::class);
		return $this;
	}


	public function asContCommandComponent() : ContCommandComponent{
		return $this->getComponent(ContCommandComponent::class);
	}

	public function getContCommandComponent(&$component) : KineticNode{
		$component = $this->getComponent(ContCommandComponent::class);
		return $this;
	}

	public function addContCommandComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ContCommandComponent::class);
		return $this;
	}


	public function asRootComponent() : RootComponent{
		return $this->getComponent(RootComponent::class);
	}

	public function getRootComponent(&$component) : KineticNode{
		$component = $this->getComponent(RootComponent::class);
		return $this;
	}

	public function addRootComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(RootComponent::class);
		return $this;
	}


	public function asWindowComponent() : WindowComponent{
		return $this->getComponent(WindowComponent::class);
	}

	public function getWindowComponent(&$component) : KineticNode{
		$component = $this->getComponent(WindowComponent::class);
		return $this;
	}

	public function addWindowComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(WindowComponent::class);
		return $this;
	}
}
