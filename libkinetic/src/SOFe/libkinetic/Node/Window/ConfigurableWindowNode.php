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

namespace SOFe\libkinetic\Node\Window;

use SOFe\libkinetic\Node\Command\CommandEntryWindowNode;
use SOFe\libkinetic\Node\Config\CommandConfigNode;
use SOFe\libkinetic\Node\Config\ComplexConfigNode;
use SOFe\libkinetic\Node\Config\ConfigNode;
use SOFe\libkinetic\Node\Config\ListConfigNode;
use SOFe\libkinetic\Node\KineticNode;

abstract class ConfigurableWindowNode extends CommandEntryWindowNode{
	protected $configs = [];
	protected $commandConfigs = [];

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "CONFIG"){
			return new ConfigNode();
		}

		if($name === "LIST" . "CONFIG"){
			return new ListConfigNode();
		}

		if($name === "COMPLEX" . "CONFIG"){
			return new ComplexConfigNode();
		}

		if($name === "COMMAND" . "CONFIG"){
			return new CommandConfigNode();
		}


		return null;
	}

	/**
	 * @return ConfigNode[]
	 */
	public function getConfigs() : array{
		return $this->configs;
	}

	/**
	 * @return CommandConfigNode[]
	 */
	public function getCommandConfigs() : array{
		return $this->commandConfigs;
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"configs" => $this->configs,
			];
	}
}
