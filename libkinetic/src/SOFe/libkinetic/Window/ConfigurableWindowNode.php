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

use SOFe\libkinetic\Config\AbstractConfigWindowNode;
use SOFe\libkinetic\Config\CommandConfigNode;
use SOFe\libkinetic\Config\ComplexConfigNode;
use SOFe\libkinetic\Config\ConfigNode;
use SOFe\libkinetic\Config\ListConfigNode;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Window\Entry\DirectEntryWindowNode;

abstract class ConfigurableWindowNode extends DirectEntryWindowNode{
	/** @var AbstractConfigWindowNode[] */
	protected $windowConfigs = [];
	/** @var CommandConfigNode[] */
	protected $commandConfigs = [];

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "CONFIG"){
			return $this->windowConfigs[] = new ConfigNode();
		}

		if($name === "LIST" . "CONFIG"){
			return $this->windowConfigs[] = new ListConfigNode();
		}

		if($name === "COMPLEX" . "CONFIG"){
			return $this->windowConfigs[] = new ComplexConfigNode();
		}

		if($name === "COMMAND" . "CONFIG"){
			return $this->commandConfigs[] = new CommandConfigNode();
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

	/**
	 * @return ConfigNode[]
	 */
	public function getWindowConfigs() : array{
		return $this->windowConfigs;
	}

	/**
	 * @return CommandConfigNode[]
	 */
	public function getCommandConfigs() : array{
		return $this->commandConfigs;
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"windowConfigs" => $this->windowConfigs,
				"commandConfigs" => $this->commandConfigs,
			];
	}
}
