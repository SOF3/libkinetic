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
use SOFe\Libkinetic\Clickable\Argument\ArgInterface;
use SOFe\Libkinetic\Clickable\Argument\ArguableComponent;
use SOFe\Libkinetic\Clickable\Argument\SimpleArgComponent;
use SOFe\Libkinetic\Clickable\ClickableComponent;
use SOFe\Libkinetic\Clickable\ClickableContainerInterface;
use SOFe\Libkinetic\Clickable\ClickableInterface;
use SOFe\Libkinetic\Clickable\ClickableParentComponent;
use SOFe\Libkinetic\Clickable\ClickablePeerInterface;
use SOFe\Libkinetic\Clickable\Entry\Command\CommandAliasComponent;
use SOFe\Libkinetic\Clickable\Entry\Command\CommandEntryComponent;
use SOFe\Libkinetic\Clickable\Entry\DirectEntryClickableComponent;
use SOFe\Libkinetic\Clickable\Entry\Interact\BlockFilterComponent;
use SOFe\Libkinetic\Clickable\Entry\Interact\FaceFilterInterfaceComponent;
use SOFe\Libkinetic\Clickable\Entry\Interact\InteractEntryComponent;
use SOFe\Libkinetic\Clickable\Entry\Interact\InteractFilterInterface;
use SOFe\Libkinetic\Clickable\Entry\Interact\ItemFilterComponent;
use SOFe\Libkinetic\Clickable\Entry\Interact\TouchModeFilterInterfaceComponent;
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
use SOFe\Libkinetic\Element\EditableElementInterface;
use SOFe\Libkinetic\Element\ElementComponent;
use SOFe\Libkinetic\Element\ElementInterface;
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

	public abstract function findComponentsByInterface(string $interface, int $assertMinimum = 0) : array;


	public final function asAbsoluteIdComponent() : AbsoluteIdComponent{
		return $this->getComponent(AbsoluteIdComponent::class);
	}

	public final function getAbsoluteIdComponent(&$component) : KineticNode{
		$component = $this->getComponent(AbsoluteIdComponent::class);
		return $this;
	}

	public final function addAbsoluteIdComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(AbsoluteIdComponent::class);
		return $this;
	}


	public final function asArgComponent() : ArgComponent{
		return $this->getComponent(ArgComponent::class);
	}

	public final function getArgComponent(&$component) : KineticNode{
		$component = $this->getComponent(ArgComponent::class);
		return $this;
	}

	public final function addArgComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ArgComponent::class);
		return $this;
	}


	public final function asArguableComponent() : ArguableComponent{
		return $this->getComponent(ArguableComponent::class);
	}

	public final function getArguableComponent(&$component) : KineticNode{
		$component = $this->getComponent(ArguableComponent::class);
		return $this;
	}

	public final function addArguableComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ArguableComponent::class);
		return $this;
	}


	public final function asBlockFilterComponent() : BlockFilterComponent{
		return $this->getComponent(BlockFilterComponent::class);
	}

	public final function getBlockFilterComponent(&$component) : KineticNode{
		$component = $this->getComponent(BlockFilterComponent::class);
		return $this;
	}

	public final function addBlockFilterComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(BlockFilterComponent::class);
		return $this;
	}


	public final function asClickableComponent() : ClickableComponent{
		return $this->getComponent(ClickableComponent::class);
	}

	public final function getClickableComponent(&$component) : KineticNode{
		$component = $this->getComponent(ClickableComponent::class);
		return $this;
	}

	public final function addClickableComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ClickableComponent::class);
		return $this;
	}


	public final function asClickableParentComponent() : ClickableParentComponent{
		return $this->getComponent(ClickableParentComponent::class);
	}

	public final function getClickableParentComponent(&$component) : KineticNode{
		$component = $this->getComponent(ClickableParentComponent::class);
		return $this;
	}

	public final function addClickableParentComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ClickableParentComponent::class);
		return $this;
	}


	public final function asCommandAliasComponent() : CommandAliasComponent{
		return $this->getComponent(CommandAliasComponent::class);
	}

	public final function getCommandAliasComponent(&$component) : KineticNode{
		$component = $this->getComponent(CommandAliasComponent::class);
		return $this;
	}

	public final function addCommandAliasComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(CommandAliasComponent::class);
		return $this;
	}


	public final function asCommandEntryComponent() : CommandEntryComponent{
		return $this->getComponent(CommandEntryComponent::class);
	}

	public final function getCommandEntryComponent(&$component) : KineticNode{
		$component = $this->getComponent(CommandEntryComponent::class);
		return $this;
	}

	public final function addCommandEntryComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(CommandEntryComponent::class);
		return $this;
	}


	public final function asContCommandComponent() : ContCommandComponent{
		return $this->getComponent(ContCommandComponent::class);
	}

	public final function getContCommandComponent(&$component) : KineticNode{
		$component = $this->getComponent(ContCommandComponent::class);
		return $this;
	}

	public final function addContCommandComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ContCommandComponent::class);
		return $this;
	}


	public final function asDirectEntryClickableComponent() : DirectEntryClickableComponent{
		return $this->getComponent(DirectEntryClickableComponent::class);
	}

	public final function getDirectEntryClickableComponent(&$component) : KineticNode{
		$component = $this->getComponent(DirectEntryClickableComponent::class);
		return $this;
	}

	public final function addDirectEntryClickableComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(DirectEntryClickableComponent::class);
		return $this;
	}


	public final function asDropdownOptionComponent() : DropdownOptionComponent{
		return $this->getComponent(DropdownOptionComponent::class);
	}

	public final function getDropdownOptionComponent(&$component) : KineticNode{
		$component = $this->getComponent(DropdownOptionComponent::class);
		return $this;
	}

	public final function addDropdownOptionComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(DropdownOptionComponent::class);
		return $this;
	}


	public final function asDynamicDropdownComponent() : DynamicDropdownComponent{
		return $this->getComponent(DynamicDropdownComponent::class);
	}

	public final function getDynamicDropdownComponent(&$component) : KineticNode{
		$component = $this->getComponent(DynamicDropdownComponent::class);
		return $this;
	}

	public final function addDynamicDropdownComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(DynamicDropdownComponent::class);
		return $this;
	}


	public final function asDynamicStepSliderComponent() : DynamicStepSliderComponent{
		return $this->getComponent(DynamicStepSliderComponent::class);
	}

	public final function getDynamicStepSliderComponent(&$component) : KineticNode{
		$component = $this->getComponent(DynamicStepSliderComponent::class);
		return $this;
	}

	public final function addDynamicStepSliderComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(DynamicStepSliderComponent::class);
		return $this;
	}


	public final function asElementComponent() : ElementComponent{
		return $this->getComponent(ElementComponent::class);
	}

	public final function getElementComponent(&$component) : KineticNode{
		$component = $this->getComponent(ElementComponent::class);
		return $this;
	}

	public final function addElementComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ElementComponent::class);
		return $this;
	}


	public final function asElementParentComponent() : ElementParentComponent{
		return $this->getComponent(ElementParentComponent::class);
	}

	public final function getElementParentComponent(&$component) : KineticNode{
		$component = $this->getComponent(ElementParentComponent::class);
		return $this;
	}

	public final function addElementParentComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ElementParentComponent::class);
		return $this;
	}


	public final function asElementParentWithFallbackRequiredComponent() : ElementParentWithFallbackRequiredComponent{
		return $this->getComponent(ElementParentWithFallbackRequiredComponent::class);
	}

	public final function getElementParentWithFallbackRequiredComponent(&$component) : KineticNode{
		$component = $this->getComponent(ElementParentWithFallbackRequiredComponent::class);
		return $this;
	}

	public final function addElementParentWithFallbackRequiredComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ElementParentWithFallbackRequiredComponent::class);
		return $this;
	}


	public final function asExitComponent() : ExitComponent{
		return $this->getComponent(ExitComponent::class);
	}

	public final function getExitComponent(&$component) : KineticNode{
		$component = $this->getComponent(ExitComponent::class);
		return $this;
	}

	public final function addExitComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ExitComponent::class);
		return $this;
	}


	public final function asFaceFilterInterfaceComponent() : FaceFilterInterfaceComponent{
		return $this->getComponent(FaceFilterInterfaceComponent::class);
	}

	public final function getFaceFilterInterfaceComponent(&$component) : KineticNode{
		$component = $this->getComponent(FaceFilterInterfaceComponent::class);
		return $this;
	}

	public final function addFaceFilterInterfaceComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(FaceFilterInterfaceComponent::class);
		return $this;
	}


	public final function asIndexComponent() : IndexComponent{
		return $this->getComponent(IndexComponent::class);
	}

	public final function getIndexComponent(&$component) : KineticNode{
		$component = $this->getComponent(IndexComponent::class);
		return $this;
	}

	public final function addIndexComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(IndexComponent::class);
		return $this;
	}


	public final function asInfoComponent() : InfoComponent{
		return $this->getComponent(InfoComponent::class);
	}

	public final function getInfoComponent(&$component) : KineticNode{
		$component = $this->getComponent(InfoComponent::class);
		return $this;
	}

	public final function addInfoComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(InfoComponent::class);
		return $this;
	}


	public final function asInputComponent() : InputComponent{
		return $this->getComponent(InputComponent::class);
	}

	public final function getInputComponent(&$component) : KineticNode{
		$component = $this->getComponent(InputComponent::class);
		return $this;
	}

	public final function addInputComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(InputComponent::class);
		return $this;
	}


	public final function asInteractEntryComponent() : InteractEntryComponent{
		return $this->getComponent(InteractEntryComponent::class);
	}

	public final function getInteractEntryComponent(&$component) : KineticNode{
		$component = $this->getComponent(InteractEntryComponent::class);
		return $this;
	}

	public final function addInteractEntryComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(InteractEntryComponent::class);
		return $this;
	}


	public final function asItemFilterComponent() : ItemFilterComponent{
		return $this->getComponent(ItemFilterComponent::class);
	}

	public final function getItemFilterComponent(&$component) : KineticNode{
		$component = $this->getComponent(ItemFilterComponent::class);
		return $this;
	}

	public final function addItemFilterComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ItemFilterComponent::class);
		return $this;
	}


	public final function asLabelComponent() : LabelComponent{
		return $this->getComponent(LabelComponent::class);
	}

	public final function getLabelComponent(&$component) : KineticNode{
		$component = $this->getComponent(LabelComponent::class);
		return $this;
	}

	public final function addLabelComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(LabelComponent::class);
		return $this;
	}


	public final function asLinkComponent() : LinkComponent{
		return $this->getComponent(LinkComponent::class);
	}

	public final function getLinkComponent(&$component) : KineticNode{
		$component = $this->getComponent(LinkComponent::class);
		return $this;
	}

	public final function addLinkComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(LinkComponent::class);
		return $this;
	}


	public final function asListComponent() : ListComponent{
		return $this->getComponent(ListComponent::class);
	}

	public final function getListComponent(&$component) : KineticNode{
		$component = $this->getComponent(ListComponent::class);
		return $this;
	}

	public final function addListComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ListComponent::class);
		return $this;
	}


	public final function asPermissionClickableComponent() : PermissionClickableComponent{
		return $this->getComponent(PermissionClickableComponent::class);
	}

	public final function getPermissionClickableComponent(&$component) : KineticNode{
		$component = $this->getComponent(PermissionClickableComponent::class);
		return $this;
	}

	public final function addPermissionClickableComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(PermissionClickableComponent::class);
		return $this;
	}


	public final function asPermissionComponent() : PermissionComponent{
		return $this->getComponent(PermissionComponent::class);
	}

	public final function getPermissionComponent(&$component) : KineticNode{
		$component = $this->getComponent(PermissionComponent::class);
		return $this;
	}

	public final function addPermissionComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(PermissionComponent::class);
		return $this;
	}


	public final function asRequiredComponent() : RequiredComponent{
		return $this->getComponent(RequiredComponent::class);
	}

	public final function getRequiredComponent(&$component) : KineticNode{
		$component = $this->getComponent(RequiredComponent::class);
		return $this;
	}

	public final function addRequiredComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(RequiredComponent::class);
		return $this;
	}


	public final function asRequiredWithFallbackComponent() : RequiredWithFallbackComponent{
		return $this->getComponent(RequiredWithFallbackComponent::class);
	}

	public final function getRequiredWithFallbackComponent(&$component) : KineticNode{
		$component = $this->getComponent(RequiredWithFallbackComponent::class);
		return $this;
	}

	public final function addRequiredWithFallbackComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(RequiredWithFallbackComponent::class);
		return $this;
	}


	public final function asRootComponent() : RootComponent{
		return $this->getComponent(RootComponent::class);
	}

	public final function getRootComponent(&$component) : KineticNode{
		$component = $this->getComponent(RootComponent::class);
		return $this;
	}

	public final function addRootComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(RootComponent::class);
		return $this;
	}


	public final function asSimpleArgComponent() : SimpleArgComponent{
		return $this->getComponent(SimpleArgComponent::class);
	}

	public final function getSimpleArgComponent(&$component) : KineticNode{
		$component = $this->getComponent(SimpleArgComponent::class);
		return $this;
	}

	public final function addSimpleArgComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(SimpleArgComponent::class);
		return $this;
	}


	public final function asSliderComponent() : SliderComponent{
		return $this->getComponent(SliderComponent::class);
	}

	public final function getSliderComponent(&$component) : KineticNode{
		$component = $this->getComponent(SliderComponent::class);
		return $this;
	}

	public final function addSliderComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(SliderComponent::class);
		return $this;
	}


	public final function asStaticDropdownComponent() : StaticDropdownComponent{
		return $this->getComponent(StaticDropdownComponent::class);
	}

	public final function getStaticDropdownComponent(&$component) : KineticNode{
		$component = $this->getComponent(StaticDropdownComponent::class);
		return $this;
	}

	public final function addStaticDropdownComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(StaticDropdownComponent::class);
		return $this;
	}


	public final function asStaticStepSliderComponent() : StaticStepSliderComponent{
		return $this->getComponent(StaticStepSliderComponent::class);
	}

	public final function getStaticStepSliderComponent(&$component) : KineticNode{
		$component = $this->getComponent(StaticStepSliderComponent::class);
		return $this;
	}

	public final function addStaticStepSliderComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(StaticStepSliderComponent::class);
		return $this;
	}


	public final function asToggleComponent() : ToggleComponent{
		return $this->getComponent(ToggleComponent::class);
	}

	public final function getToggleComponent(&$component) : KineticNode{
		$component = $this->getComponent(ToggleComponent::class);
		return $this;
	}

	public final function addToggleComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(ToggleComponent::class);
		return $this;
	}


	public final function asTouchModeFilterInterfaceComponent() : TouchModeFilterInterfaceComponent{
		return $this->getComponent(TouchModeFilterInterfaceComponent::class);
	}

	public final function getTouchModeFilterInterfaceComponent(&$component) : KineticNode{
		$component = $this->getComponent(TouchModeFilterInterfaceComponent::class);
		return $this;
	}

	public final function addTouchModeFilterInterfaceComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(TouchModeFilterInterfaceComponent::class);
		return $this;
	}


	public final function asWindowComponent() : WindowComponent{
		return $this->getComponent(WindowComponent::class);
	}

	public final function getWindowComponent(&$component) : KineticNode{
		$component = $this->getComponent(WindowComponent::class);
		return $this;
	}

	public final function addWindowComponent(array &$component) : KineticNode{
		$component[] = $this->getComponent(WindowComponent::class);
		return $this;
	}


	public final function asArgInterface() : ArgInterface{
		return $this->findComponentsByInterface(ArgInterface::class, 1)[0];
	}

	/** @return ArgInterface[] */
	public final function getArgInterfaces(int $assertMinimum = 0) : array{
		return $this->findComponentsByInterface(ArgInterface::class, $assertMinimum);
	}


	public final function asClickableContainerInterface() : ClickableContainerInterface{
		return $this->findComponentsByInterface(ClickableContainerInterface::class, 1)[0];
	}

	/** @return ClickableContainerInterface[] */
	public final function getClickableContainerInterfaces(int $assertMinimum = 0) : array{
		return $this->findComponentsByInterface(ClickableContainerInterface::class, $assertMinimum);
	}


	public final function asClickableInterface() : ClickableInterface{
		return $this->findComponentsByInterface(ClickableInterface::class, 1)[0];
	}

	/** @return ClickableInterface[] */
	public final function getClickableInterfaces(int $assertMinimum = 0) : array{
		return $this->findComponentsByInterface(ClickableInterface::class, $assertMinimum);
	}


	public final function asClickablePeerInterface() : ClickablePeerInterface{
		return $this->findComponentsByInterface(ClickablePeerInterface::class, 1)[0];
	}

	/** @return ClickablePeerInterface[] */
	public final function getClickablePeerInterfaces(int $assertMinimum = 0) : array{
		return $this->findComponentsByInterface(ClickablePeerInterface::class, $assertMinimum);
	}


	public final function asEditableElementInterface() : EditableElementInterface{
		return $this->findComponentsByInterface(EditableElementInterface::class, 1)[0];
	}

	/** @return EditableElementInterface[] */
	public final function getEditableElementInterfaces(int $assertMinimum = 0) : array{
		return $this->findComponentsByInterface(EditableElementInterface::class, $assertMinimum);
	}


	public final function asElementInterface() : ElementInterface{
		return $this->findComponentsByInterface(ElementInterface::class, 1)[0];
	}

	/** @return ElementInterface[] */
	public final function getElementInterfaces(int $assertMinimum = 0) : array{
		return $this->findComponentsByInterface(ElementInterface::class, $assertMinimum);
	}


	public final function asInteractFilterInterface() : InteractFilterInterface{
		return $this->findComponentsByInterface(InteractFilterInterface::class, 1)[0];
	}

	/** @return InteractFilterInterface[] */
	public final function getInteractFilterInterfaces(int $assertMinimum = 0) : array{
		return $this->findComponentsByInterface(InteractFilterInterface::class, $assertMinimum);
	}


	public final function asIntermediateNodeInterface() : IntermediateNodeInterface{
		return $this->findComponentsByInterface(IntermediateNodeInterface::class, 1)[0];
	}

	/** @return IntermediateNodeInterface[] */
	public final function getIntermediateNodeInterfaces(int $assertMinimum = 0) : array{
		return $this->findComponentsByInterface(IntermediateNodeInterface::class, $assertMinimum);
	}
}
