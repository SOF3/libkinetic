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
use SOFe\libkinetic\Node\Config\ConfigNode;
use SOFe\libkinetic\Node\Config\SimpleConfigNode;
use SOFe\libkinetic\Node\KineticNode;

abstract class ConfigurableWindowNode extends CommandEntryWindowNode{
	protected $configs = [];
	protected $simpleConfigs = [];

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "CONFIG"){
			return new ConfigNode();
		}

		if($name === "SIMPLE"."CONFIG"){
			return new SimpleConfigNode();
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
	 * @return SimpleConfigNode[]
	 */
	public function getSimpleConfigs() : array{
		return $this->simpleConfigs;
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"configs" => $this->configs,
			];
	}
}
