<?php /** @noinspection PhpIncompatibleReturnTypeInspection */
/** @noinspection PhpUnusedAliasInspection */

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
 *
 * This file was generated by libkinetic tools/generateAdapter.php from libkinetic sources,
 * which are also licensed under the License.
 */

declare(strict_types=1);

namespace SOFe\Libkinetic\Base;

use SOFe\Libkinetic\UI\Advanced\DynFormComponent;
use SOFe\Libkinetic\UI\Advanced\RecurFormComponent;
use SOFe\Libkinetic\UI\Conditional\ConditionalComponent;
use SOFe\Libkinetic\UI\Conditional\ConditionalParentComponent;
use SOFe\Libkinetic\UI\Conditional\ConstConditionalComponent;
use SOFe\Libkinetic\UI\Conditional\ControllerConditionalComponent;
use SOFe\Libkinetic\UI\Conditional\Group\AndComponent;
use SOFe\Libkinetic\UI\Conditional\Group\ConditionalGroupComponent;
use SOFe\Libkinetic\UI\Conditional\Group\OrComponent;
use SOFe\Libkinetic\UI\Conditional\Group\XorComponent;
use SOFe\Libkinetic\UI\Conditional\PermissionConditionalComponent;
use SOFe\Libkinetic\UI\Control\BufferComponent;
use SOFe\Libkinetic\UI\Control\CallComponent;
use SOFe\Libkinetic\UI\Control\ExitComponent;
use SOFe\Libkinetic\UI\Entry\ArgComponent;
use SOFe\Libkinetic\UI\Entry\EntryCommandComponent;
use SOFe\Libkinetic\UI\Entry\OverloadComponent;
use SOFe\Libkinetic\UI\Group\IndexComponent;
use SOFe\Libkinetic\UI\Group\SeriesComponent;
use SOFe\Libkinetic\UI\Group\SwitchComponent;
use SOFe\Libkinetic\UI\Group\UiGroupComponent;
use SOFe\Libkinetic\UI\Group\UiParentComponent;
use SOFe\Libkinetic\UI\NodeState\AlwaysOnCompleteComponent;
use SOFe\Libkinetic\UI\NodeState\BaseUiNodeStateComponent;
use SOFe\Libkinetic\UI\NodeState\GotoOnCompleteComponent;
use SOFe\Libkinetic\UI\NodeState\OnCompleteComponent;
use SOFe\Libkinetic\UI\NodeState\OnStartComponent;
use SOFe\Libkinetic\UI\NodeState\UiNodeStateControllerComponent;
use SOFe\Libkinetic\UI\Standard\BasicFormComponent;
use SOFe\Libkinetic\UI\Standard\InfoFormComponent;
use SOFe\Libkinetic\UI\Standard\ListFormComponent;
use SOFe\Libkinetic\UI\UiComponent;
use SOFe\Libkinetic\Variable\ReturnComponent;
use SOFe\Libkinetic\Variable\VarDeclarationComponent;
use SOFe\Libkinetic\Wizard\WizardComponent;

/**
 * This file generates template functions to access KineticNode->getComponent().
 *
 * (This file would be unneeded if we had template functions in PHP)
 */
trait ComponentAdapter{
	public abstract function getComponent(string $class) : KineticComponent;

	public final function asAliasComponent() : AliasComponent{
		return $this->getComponent(AliasComponent::class);
	}

	public final function asAlwaysOnCompleteComponent() : AlwaysOnCompleteComponent{
		return $this->getComponent(AlwaysOnCompleteComponent::class);
	}

	public final function asAndComponent() : AndComponent{
		return $this->getComponent(AndComponent::class);
	}

	public final function asArgComponent() : ArgComponent{
		return $this->getComponent(ArgComponent::class);
	}

	public final function asBaseUiNodeStateComponent() : BaseUiNodeStateComponent{
		return $this->getComponent(BaseUiNodeStateComponent::class);
	}

	public final function asBasicFormComponent() : BasicFormComponent{
		return $this->getComponent(BasicFormComponent::class);
	}

	public final function asBufferComponent() : BufferComponent{
		return $this->getComponent(BufferComponent::class);
	}

	public final function asCallComponent() : CallComponent{
		return $this->getComponent(CallComponent::class);
	}

	public final function asCommandComponent() : CommandComponent{
		return $this->getComponent(CommandComponent::class);
	}

	public final function asConditionalComponent() : ConditionalComponent{
		return $this->getComponent(ConditionalComponent::class);
	}

	public final function asConditionalGroupComponent() : ConditionalGroupComponent{
		return $this->getComponent(ConditionalGroupComponent::class);
	}

	public final function asConditionalParentComponent() : ConditionalParentComponent{
		return $this->getComponent(ConditionalParentComponent::class);
	}

	public final function asConstConditionalComponent() : ConstConditionalComponent{
		return $this->getComponent(ConstConditionalComponent::class);
	}

	public final function asControllerConditionalComponent() : ControllerConditionalComponent{
		return $this->getComponent(ControllerConditionalComponent::class);
	}

	public final function asDynFormComponent() : DynFormComponent{
		return $this->getComponent(DynFormComponent::class);
	}

	public final function asEntryCommandComponent() : EntryCommandComponent{
		return $this->getComponent(EntryCommandComponent::class);
	}

	public final function asExitComponent() : ExitComponent{
		return $this->getComponent(ExitComponent::class);
	}

	public final function asGotoOnCompleteComponent() : GotoOnCompleteComponent{
		return $this->getComponent(GotoOnCompleteComponent::class);
	}

	public final function asIdComponent() : IdComponent{
		return $this->getComponent(IdComponent::class);
	}

	public final function asIncludeComponent() : IncludeComponent{
		return $this->getComponent(IncludeComponent::class);
	}

	public final function asIndexComponent() : IndexComponent{
		return $this->getComponent(IndexComponent::class);
	}

	public final function asInfoFormComponent() : InfoFormComponent{
		return $this->getComponent(InfoFormComponent::class);
	}

	public final function asListFormComponent() : ListFormComponent{
		return $this->getComponent(ListFormComponent::class);
	}

	public final function asOnCompleteComponent() : OnCompleteComponent{
		return $this->getComponent(OnCompleteComponent::class);
	}

	public final function asOnStartComponent() : OnStartComponent{
		return $this->getComponent(OnStartComponent::class);
	}

	public final function asOrComponent() : OrComponent{
		return $this->getComponent(OrComponent::class);
	}

	public final function asOverloadComponent() : OverloadComponent{
		return $this->getComponent(OverloadComponent::class);
	}

	public final function asPermissionConditionalComponent() : PermissionConditionalComponent{
		return $this->getComponent(PermissionConditionalComponent::class);
	}

	public final function asRecurFormComponent() : RecurFormComponent{
		return $this->getComponent(RecurFormComponent::class);
	}

	public final function asReturnComponent() : ReturnComponent{
		return $this->getComponent(ReturnComponent::class);
	}

	public final function asRootComponent() : RootComponent{
		return $this->getComponent(RootComponent::class);
	}

	public final function asSeriesComponent() : SeriesComponent{
		return $this->getComponent(SeriesComponent::class);
	}

	public final function asSwitchComponent() : SwitchComponent{
		return $this->getComponent(SwitchComponent::class);
	}

	public final function asUiComponent() : UiComponent{
		return $this->getComponent(UiComponent::class);
	}

	public final function asUiGroupComponent() : UiGroupComponent{
		return $this->getComponent(UiGroupComponent::class);
	}

	public final function asUiNodeStateControllerComponent() : UiNodeStateControllerComponent{
		return $this->getComponent(UiNodeStateControllerComponent::class);
	}

	public final function asUiParentComponent() : UiParentComponent{
		return $this->getComponent(UiParentComponent::class);
	}

	public final function asVarDeclarationComponent() : VarDeclarationComponent{
		return $this->getComponent(VarDeclarationComponent::class);
	}

	public final function asWizardComponent() : WizardComponent{
		return $this->getComponent(WizardComponent::class);
	}

	public final function asXorComponent() : XorComponent{
		return $this->getComponent(XorComponent::class);
	}
}
