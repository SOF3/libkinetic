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

namespace SOFe\libkinetic;

use function xml_set_default_handler;
use function xml_set_element_handler;

class ActionFileParser{
	/** @var ActionNode|null */
	private $root = null;
	private $leaf = null;

	public function __construct($parser){
		xml_set_element_handler($parser, [$this, "startElement"], [$this, "endElement"]);
		xml_set_default_handler($parser, [$this, "parseDefault"]);
	}

	public function startElement($parser, string $name, array $attr) : void{
		if($this->root === null){
			$this->root = ActionNode;
		}
	}

	public function endElement($parser, string $name) : void{

	}

	public function parseDefault() : void{

	}
}
