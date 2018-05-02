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
use SOFe\libkinetic\KineticManager;

/**
 * Describes the permission required for accessing a certain window.
 *
 * The attribute <code>NEED</code> is a boolean. If set to true, only those with the permission can access the window. If set to false, <i>only those without</i> the permission can access the window.
 */
class PermissionNode extends KineticNode{
	/** @var bool */
	protected $need = true;

	/** @var bool */
	protected $predicate = false;
	/** @var string */
	protected $permission;

	/** @var string|null */
	protected $message = null;

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

		if($name === "MESSAGE"){
			$this->message = $value;
			return true;
		}

		if($name === "PREDICATE"){
			$this->predicate = true;
			$this->permission = $value;
			return true;
		}

		return false;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		if($this->message !== null){
			$manager->requireTranslation($this, $this->message);
		}
	}

	public function getPermissionString() : string{
		return $this->permission;
	}

	public function getPermissionMessage(KineticManager $manager, Player $target) : ?string{
		return $this->message !== null ? $manager->translate($target, $this->message, []) : null;
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
