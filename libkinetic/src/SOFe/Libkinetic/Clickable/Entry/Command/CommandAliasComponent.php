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

namespace SOFe\Libkinetic\Clickable\Entry\Command;

use SOFe\Libkinetic\KineticComponent;

class CommandAliasComponent extends KineticComponent{
	/** @var string */
	protected $value;

	public function acceptText(string $text) : bool{
		$this->value = $text;
		return true;
	}

	public function endElement() : void{
		$this->requireText($this->value);
	}

	public function init() : void{
		$this->resolveConfigString($this->value);
	}

	public function getValue():string{
		return $this->value;
	}
}