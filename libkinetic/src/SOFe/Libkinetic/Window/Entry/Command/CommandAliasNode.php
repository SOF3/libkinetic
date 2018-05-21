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

namespace SOFe\Libkinetic\Window\Entry\Command;

use SOFe\Libkinetic\Node\KineticNode;
use SOFe\Libkinetic\ParseException;

class CommandAliasNode extends KineticNode{
	/** @var string */
	protected $text;

	public function acceptText(string $text) : void{
		$this->text = $text;
	}

	public function endElement() : void{
		parent::endElement();

		if(empty($this->text)){
			throw new ParseException("Text content is required", $this);
		}
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"text" => $this->text,
			];
	}


	public function getText() : string{
		return $this->text;
	}
}
