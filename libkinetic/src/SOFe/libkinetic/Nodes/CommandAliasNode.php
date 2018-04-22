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

namespace SOFe\libkinetic\Nodes;

use SOFe\libkinetic\ParseException;

class CommandAliasNode extends KineticNode{
	protected $text;

	public function acceptText(string $text) : void{
		$this->text = $text;
	}

	public function endElement() : void{
		if(empty($this->text)){
			throw new ParseException("<{$this->nodeName}> must have text");
		}
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"text" => $this->text,
			];
	}
}
