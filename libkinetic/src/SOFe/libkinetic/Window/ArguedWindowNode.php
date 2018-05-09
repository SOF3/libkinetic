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

namespace SOFe\libkinetic\Window;

use SOFe\libkinetic\Args\ArgsWindowNode;
use SOFe\libkinetic\Args\CommandArgNode;
use SOFe\libkinetic\Args\CycleArgsNode;
use SOFe\libkinetic\Args\SimpleArgsNode;
use SOFe\libkinetic\Args\MenuArgsNode;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;

abstract class ArguedWindowNode extends WindowNode{
	/** @var ArgsWindowNode[] */
	protected $windowConfigs = [];
	/** @var CommandArgNode[] */
	protected $commandConfigs = [];

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "SIMPLE"."ARGS"){
			return $this->windowConfigs[] = new SimpleArgsNode();
		}

		if($name === "MENU" . "ARGS"){
			return $this->windowConfigs[] = new MenuArgsNode();
		}

		if($name === "CYCLE" . "ARGS"){
			return $this->windowConfigs[] = new CycleArgsNode();
		}

		if($name === "COMMAND" . "ARG"){
			return $this->commandConfigs[] = new CommandArgNode();
		}


		return null;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		foreach($this->windowConfigs as $config){
			$config->resolve($manager);
		}
		foreach($this->commandConfigs as $config){
			$config->resolve($manager);
		}
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"windowConfigs" => $this->windowConfigs,
				"commandConfigs" => $this->commandConfigs,
			];
	}

	/**
	 * @return SimpleArgsNode[]
	 */
	public function getWindowConfigs() : array{
		return $this->windowConfigs;
	}

	/**
	 * @return CommandArgNode[]
	 */
	public function getCommandConfigs() : array{
		return $this->commandConfigs;
	}
}
