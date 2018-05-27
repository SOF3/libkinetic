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

use SOFe\Libkinetic\KineticComponent;

class DropdownOptionComponent extends KineticComponent{
	/** @var bool */
	protected $default = false;
	/** @var string */
	protected $value;
	/** @var string */
	protected $text;

	public function setAttribute(string $name, string $value) : bool{
		if($name === "DEFAULT"){
			$this->default = $this->parseBoolean($value);
			return true;
		}
		if($name === "VALUE"){
			$this->value = $value;
			return true;
		}
		return false;
	}

	public function acceptText(string $text) : bool{
		$this->text = $text;
		return true;
	}

	public function isMarkedDefault() : bool{
		return $this->default;
	}

	public function getValue() : string{
		return $this->value;
	}

	public function getText() : string{
		return $this->text;
	}
}
