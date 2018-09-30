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

use SOFe\Libkinetic\API\Icon;
use SOFe\Libkinetic\UserString;

class IconListEntry{
	/** @var string */
	protected $mnemonic;
	/** @var string[] */
	protected $aliases;
	/** @var UserString */
	protected $display;
	/** @var mixed */
	protected $value;
	/** @var Icon|null */
	protected $icon;
	/** @var bool */
	protected $default = false;

	public function __construct(string $mnemonic, array $aliases, UserString $display, $value, ?Icon $icon){
		$this->mnemonic = $mnemonic;
		$this->aliases = $aliases;
		$this->display = $display;
		$this->value = $value;
		$this->icon = $icon;
	}

	public function getMnemonic() : string{
		return $this->mnemonic;
	}

	/**
	 * @return string[]
	 */
	public function getAliases() : array{
		return $this->aliases;
	}

	public function getDisplay() : UserString{
		return $this->display;
	}

	public function getValue(){
		return $this->value;
	}

	public function setValue($value) : void{
		$this->value = $value;
	}

	public function getIcon() : ?Icon{
		return $this->icon;
	}

	public function isDefault() : bool{
		return $this->default;
	}

	public function setDefault(bool $default) : void{
		$this->default = $default;
	}
}
