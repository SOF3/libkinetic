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
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\UserString;

abstract class FlowContext{
	/** @var CommandSender */
	protected $user;
	/** @var string */
	protected $id;
	/** @var KineticManager */
	protected $manager;

	/** @var VariableScope */
	protected $variableScope;

	protected function __construct(CommandSender $user, string $id, KineticManager $manager){
		$this->user = $user;
		$this->id = $id;
		$this->manager = $manager;
	}

	public function getId() : ?string{
		return $this->id;
	}

	public function getUser() : CommandSender{
		return $this->user;
	}

	public function getVariables() : VariableScope{
		return $this->variableScope;
	}

	public function send(string $message, array $extraArgs = []) : void{
		$this->user->sendMessage($this->translate($message, $extraArgs));
	}

	public function sendUserString(UserString $message, array $extraArgs = []) : void{
		$this->user->sendMessage($this->translateUserString($message, $extraArgs));
	}

	public function translate(string $message, array $extraArgs = []) : string{
		return $this->manager->translate($this->getUser(), $message, $this->getVarsAsArgs($extraArgs));
	}

	public function translateUserString(UserString $message, array $extraArgs = []) : string{
		return $message->translate($this->getManager(), $this->getUser(), $this->getVarsAsArgs($extraArgs));
	}

	public function getManager() : KineticManager{
		return $this->manager;
	}

	public function getVarsAsArgs(array $extraArgs = []) : array{
		return $extraArgs + $this->variableScope->asArray();
	}
}
