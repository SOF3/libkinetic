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

namespace SOFe\Libkinetic\Element;

use SOFe\Libkinetic\WindowRequest;

class ToggleNode extends EditableElementNode{
	/** @var bool */
	protected $default = false;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "DEFAULT"){
			$this->default = $value;
			return true;
		}

		return false;
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"default" => $this->default,
			];
	}

	public function getDefault() : bool{
		return $this->default;
	}

	public function getDefaultAsString() : ?string{
		return $this->default ? "true" : "false";
	}

	public function asFormComponent(WindowRequest $request, callable &$adapter) : array{
		$adapter = function(bool $value) : bool{
			return $value;
		};

		return [
			"type" => "toggle",
			"text" => $request->translate($this->title),
			"default" => $this->default,
		];
	}
}