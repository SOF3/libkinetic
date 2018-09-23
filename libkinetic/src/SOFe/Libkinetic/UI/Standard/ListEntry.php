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

namespace SOFe\Libkinetic\UI\Standard;

use SOFe\Libkinetic\UserString;

class ListEntry{
	/** @var string */
	protected $commandName;
	/** @var UserString */
	protected $displayName;
	/** @var mixed */
	protected $value;
	/** @var bool */
	protected $default = false;

	public function __construct(string $commandName, UserString $displayName, $value){
		$this->commandName = $commandName;
		$this->displayName = $displayName;
		$this->value = $value;
	}

	public function getCommandName() : string{
		return $this->commandName;
	}

	public function getDisplayName() : UserString{
		return $this->displayName;
	}

	public function getValue(){
		return $this->value;
	}

	public function isDefault() : bool{
		return $this->default;
	}

	public function setDefault(bool $default) : void{
		$this->default = $default;
	}
}
