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

/**
 * Configs are parameters that might affect the output of a Configurable window.
 *
 * There are 4 types of configs: config, listConfig, complexConfig, commandConfig.
 *
 * A simple summary:
 * - `<config>` is a CustomForm where the number of parameters is fixed, defined in the Kinetic File.
 * - `<listConfig>` is a MenuForm that defines exactly one parameter, with the options either hardcoded or provided by a ListProvider. This is similar to a config with a dropdown/stepSlider, except that it takes up the whole window as a MenuForm.
 * - `<complexConfig>` is a CustomForm with self-recurring content, each iteration providing the settings for a fixed number of parameters. The number of iterations is defined dynamically by a ComplexConfigProvider.
 * - `<commandConfig>` is a special single-parameter config whose value can be set from the entry point command. If the user did not provide the arguments in the command, all required incomplete `<commandConfig>`s will be shown up in a CustomForm before the Configurable window is displayed.
 *
 * A config is either required or optional (default optional), set through the `required` boolean attribute. If the `<config>` is required, and it is not given in the Intent that opens the Configurable window, the config will be displayed as a form first.
 */

namespace SOFe\libkinetic\Node\Config;

use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Node\KineticNodeWithId;
use SOFe\libkinetic\Node\Window\WindowNode;

class AbstractConfigNode extends KineticNode implements KineticNodeWithId{
	/** @var string */
	protected $id;
	/** @var bool */
	protected $required = false;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "ID"){
			if(!($this->nodeParent instanceof WindowNode)){
				throw new InvalidNodeException("Only WindowNode can have AbstractConfigNode children", $this);
			}
			$this->id = $this->nodeParent->getId() . "." . $value;
			return true;
		}

		if($name === "REQUIRED"){
			$this->required = $this->parseBoolean($value);
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();

		$this->requireAttributes("id");
	}

	public function getId() : string{
		return $this->id;
	}
}
