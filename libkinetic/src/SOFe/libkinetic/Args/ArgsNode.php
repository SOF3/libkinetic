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
 * Args are passed through WindowRequest to modify the window shown to the client. Args are also directly passed as parameters to KineticAdapter::getMessage().
 *
 * There are 5 types of args nodes: `<simpleArgs>`, `<menuArgs>`, `<cycleArgs>`, `<listArgs>`, `<commandArg>`.
 *
 * A simple summary:
 * - `<simpleArgs>` is a CustomForm where the number of arguments is fixed, defined in the Kinetic File.
 * - `<menuArgs>` is a MenuForm that defines exactly one parameter, with the options either hardcoded or provided by a MenuProvider. This is similar to a config with a dropdown/stepSlider, except that it takes up the whole window as a MenuForm.
 * - `<cycleArgs>` is a static iteration of `<simpleArgs>`. It has a CustomForm that repeats the elements in its `<each>` node. The number of cycles and the arguments provided for each iteration are provided by a ComplexProvider.
 * - `<listArgs>` is a dynamic iteration of `<simpleArgs>`. It starts with a MenuForm with an "Add" and a "Submit" button. The "Add" button will open a CustomForm in a similar manner as `<simpleArgs>` according to the `<each>` node in `<listArgs>`. The CustomForm will append a new object to the unordered result list and show up on the original MenuForm. Clicking on the object deletes it from the list.
 * - `<commandArg>` is a special single-parameter config whose value can be set from the entry point command. If the user did not provide the arguments in the command, all required incomplete `<commandConfig>`s will be shown up in a CustomForm before the Configurable window is displayed.
 *
 * An args set can be either required or optional (default optional), set through the `required` boolean attribute. If the `<config>` is required, and it is not given in the Intent that opens the Configurable window, the config will be displayed as a form first.
 */

namespace SOFe\libkinetic\Args;

use SOFe\libkinetic\Node\KineticNode;

class ArgsNode extends KineticNode{
	/** @var bool */
	protected $required = false;
	/** @var bool */
	protected $local = true;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}


		if($name === "REQUIRED"){
			$this->required = $this->parseBoolean($value);
			return true;
		}

		if($name === "LOCAL"){
			$this->local = $this->parseBoolean($value);
			return true;
		}

		return false;
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"required" => $this->required,
				"local" => $this->local,
			];
	}

	public function isRequired() : bool{
		return $this->required;
	}

	public function isLocal() : bool{
		return $this->local;
	}
}
