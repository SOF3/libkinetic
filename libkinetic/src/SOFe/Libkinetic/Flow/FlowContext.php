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

namespace SOFe\Libkinetic\Flow;

use pocketmine\command\CommandSender;
use SOFe\Libkinetic\UI\UiComponent;
use SOFe\Libkinetic\UI\UiNode;

abstract class FlowContext{
	/** @var UiNode */
	protected $interface;
	/** @var UiComponent */
	protected $component;
	/** @var CommandSender */
	protected $user;
	/** @var VariableScope */
	protected $variableScope;

	protected function __construct(UiNode $interface, CommandSender $user){
		$this->interface = $interface;
		$this->component = $interface->getNode()->asUiComponent();
		$this->user = $user;
	}

	public function getId() : ?string{
		return $this->component->asIdComponent()->getId();
	}

	public function getUser() : CommandSender{
		return $this->user;
	}

	public function getVariables() : VariableScope{
		return $this->variableScope;
	}
}
