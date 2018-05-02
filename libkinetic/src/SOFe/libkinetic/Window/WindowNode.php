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

namespace SOFe\libkinetic\Window;

use pocketmine\Player;
use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Node\KineticNodeWithId;
use SOFe\libkinetic\Node\PermissionNode;

/**
 * A window represents a form that can be displayed to the user.
 */
abstract class WindowNode extends KineticNode implements KineticNodeWithId{
	/** @var string */
	protected $id;
	/** @var string */
	protected $title;

	/** @var string|null */
	protected $synopsis = null;
	/** @var PermissionNode|null */
	protected $permission = null;

	public function setAttribute(string $name, string $value) : bool{
		if($name === "ID"){
			if($this->nodeParent instanceof KineticNodeWithId){
				$this->id = $this->nodeParent->getId() . "." . $value;
			}else{
				if($this->nodeParent !== null){
					throw new InvalidNodeException("Only KineticNodeWithId can have child window node", $this);
				}
				$this->id = $value;
			}

			return true;
		}

		if($name === "TITLE"){
			$this->title = $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->requireAttributes("id", "title");
	}

	public function startChild(string $name) : ?KineticNode{
		if($name === "PERMISSION"){
			if($this->permission !== null){
				throw new InvalidNodeException("Only one <PERMISSION> node is allowed", $this);
			}
			return new PermissionNode();
		}

		return null;
	}

	public function getId() : string{
		return $this->id;
	}

	public function getSynopsis() : ?string{
		return $this->synopsis;
	}

	public function getSynopsisString(KineticManager $manager, ?Player $context, array $args = []) : string{
		return $this->synopsis !== null ? $manager->translate($context, $this->synopsis, $args) : "";
	}

	public function getPermission() : ?PermissionNode{
		return $this->permission;
	}

	public function testPermission(Player $player, bool $ifUndefined = true) : bool{
		return $this->permission !== null ? $this->permission->testPermission($player) : $ifUndefined;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$manager->requireTranslation($this, $this->title);
		if($this->synopsis !== null){
			$manager->requireTranslation($this, $this->synopsis);
		}
		if($this->permission !== null){
			$this->permission->resolve($manager);
		}
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"id" => $this->id,
				"title" => $this->title,
				"synopsis" => $this->synopsis,
			];
	}
}
