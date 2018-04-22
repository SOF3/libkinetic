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

namespace SOFe\libkinetic\Nodes\Element;

use SOFe\libkinetic\Nodes\KineticNode;
use SOFe\libkinetic\ParseException;

class DropdownOptionNode extends KineticNode{
	/** @var string */
	protected $value;
	/** @var bool */
	protected $default = false;
	/** @var string */
	protected $text;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "VALUE"){
			$this->value = $value;
			return true;
		}

		if($name === "DEFAULT"){
			$this->default = self::parseBoolean($value);
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->requireAttribute("value");
	}

	public function acceptText(string $text) : void{
		$this->text = $text;
	}

	public function endElement() : void{
		parent::endElement();
		if(!isset($this->text)){
			throw new ParseException("<{$this->name}> must have text");
		}
	}

	public function isDefault() : bool{
		return $this->default;
	}
}
