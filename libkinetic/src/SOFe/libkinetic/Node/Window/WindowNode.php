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

namespace SOFe\libkinetic\Node\Window;

use pocketmine\Player;
use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Node\KineticNodeWithId;
use SOFe\libkinetic\Node\PermissionNode;
use SOFe\libkinetic\Node\ResolvableNode;
use SOFe\libkinetic\Node\SynopsisNode;
use SOFe\libkinetic\Parser\KineticFileParser;

/**
 * A window represents a form that can be displayed to the user.
 */
abstract class WindowNode extends KineticNode implements KineticNodeWithId, ResolvableNode{
	/** @var string */
	protected $id;
	/** @var string */
	protected $title;

	/** @var SynopsisNode|null */
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

			KineticFileParser::getParsingInstance()->idMap[$this->id] = $this;
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
		if($name === "SYNOPSIS"){
			if($this->synopsis !== null){
				throw new InvalidNodeException("Only one <SYNOPSIS> node is allowed", $this);
			}
			return new SynopsisNode();
		}

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

	public function getName() : string{
		return $this->nodeName;
	}

	public function getSynopsis() : ?SynopsisNode{
		return $this->synopsis;
	}

	public function getSynopsisString() : string{
		return $this->synopsis !== null ? $this->synopsis->getText() : "";
	}

	public function getPermission() : ?PermissionNode{
		return $this->permission;
	}

	public function testPermission(Player $player, bool $ifUndefined = true) : bool{
		return $this->permission !== null ? $this->permission->testPermission($player) : $ifUndefined;
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"id" => $this->id,
				"title" => $this->title,
				"synopsis" => $this->synopsis,
			];
	}
}
