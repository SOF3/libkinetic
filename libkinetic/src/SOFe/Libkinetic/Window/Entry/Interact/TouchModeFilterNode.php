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

namespace SOFe\Libkinetic\Window\Entry\Interact;

use pocketmine\event\player\PlayerInteractEvent;
use SOFe\Libkinetic\InvalidNodeException;
use function constant;
use function defined;
use function strtoupper;

class TouchModeFilterNode extends InteractFilterNode{
	/** @var int */
	protected $mode;

	public function acceptText(string $text) : void{
		if(defined($const = PlayerInteractEvent::class . "::" . strtoupper($text))){
			$this->mode = constant($const);
		}else{
			throw new InvalidNodeException("$text is not a supported touch mode", $this);
		}
	}

	public function endElement() : void{
		parent::endElement();
		if(!isset($this->mode)){
			throw new InvalidNodeException("The touch mode must be specified as text content", $this);
		}
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"touchMode" => $this->mode,
			];
	}

	public function getMode() : int{
		return $this->mode;
	}
}
