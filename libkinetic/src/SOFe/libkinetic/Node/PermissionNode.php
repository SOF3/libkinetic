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

namespace SOFe\libkinetic\Node;

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

	/** @var PermissionMessageNode */
	protected $message;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "NEED"){
			$this->need = $this->parseBoolean($value);
			return true;
		}

		if($name === "VALUE"){
			$this->permission = $value;
			return true;
		}

		return false;
	}

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "MESSAGE"){
			return new PermissionMessageNode();
		}

		return null;
	}

	public function getPermissionString() : string{
		return $this->permission;
	}

	public function getPermissionMessage() : ?string{
		return $this->message !== null ? $this->message->getMessage() : null;
	}

	public function testPermission(Player $player) : bool{
		return $player->hasPermission($this->permission) === $this->need;
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"need" => $this->need,
				"permission" => $this->permission,
				"message" => $this->message,
			];
	}
}
