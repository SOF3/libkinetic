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

use pocketmine\Player;
use SOFe\libkinetic\ParseException;

/**
 * Describes the permission required for accessing a certain window.
 *
 * The attribute <code>NEED</code> is a boolean. If set to true, only those with the permission can access the window. If set to false, <i>only those without</i> the permission can access the window.
 */
class PermissionNode extends KineticNode{
	/** @var bool */
	protected $need = true;

	/** @var string */
	protected $permission;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "NEED"){
			$this->need = self::parseBoolean($value);
			return true;
		}

		return false;
	}

	public function acceptText(string $text) : void{
		$this->permission = $text;
	}

	public function endElement() : void{
		parent::endElement();
		if(empty($this->permission)){
			throw new ParseException("<{$this->nodeName}> must have text");
		}
	}

	public function validate(Player $player) : bool{
		return $player->hasPermission($this->permission) === $this->need;
	}
}
