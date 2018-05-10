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

namespace SOFe\Libkinetic\Window;

use pocketmine\Player;
use SOFe\Libkinetic\InvalidNodeException;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\Node\ClickableNode;
use SOFe\Libkinetic\Node\KineticNode;
use SOFe\Libkinetic\Node\KineticNodeWithId;
use SOFe\Libkinetic\Node\RootNode;
use SOFe\Libkinetic\Window\Entry\Command\CommandEntryPointNode;
use SOFe\Libkinetic\Window\Entry\Interact\InteractEntryPointNode;
use SOFe\Libkinetic\WindowRequest;

/**
 * A window represents a form that can be displayed to the user.
 */
abstract class WindowNode extends ClickableNode implements KineticNodeWithId{
	/** @var string */
	protected $id;

	/** @var string */
	protected $title;

	/** @var string|null */
	protected $synopsis = null;

	/** @var CommandEntryPointNode[] */
	protected $cmds = [];
	/** @var InteractEntryPointNode[] */
	protected $interacts = [];

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "ID"){
			if($this->nodeParent instanceof KineticNodeWithId){
				$this->id = $this->nodeParent->getId() . "." . $value;
			}else{
				if(!($this->nodeParent instanceof RootNode)){
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

		if($name === "SYNOPSIS"){
			$this->synopsis = $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->requireAttributes("id");
		if(!isset($this->title)){
			$this->title = $this->indexName;
		}
	}

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "COMMAND"){
			return $this->cmds[] = new CommandEntryPointNode();
		}

		if($name === "INTERACT"){
			return $this->interacts[] = new InteractEntryPointNode();
		}

		return null;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);

		$manager->requireTranslation($this, $this->title);

		if($this->synopsis !== null){
			$manager->requireTranslation($this, $this->synopsis);
		}

		foreach($this->cmds as $cmd){
			$cmd->resolve($manager);
		}

		foreach($this->interacts as $interact){
			$interact->resolve($manager);
		}
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"id" => $this->id,
				"title" => $this->title,
				"synopsis" => $this->synopsis,
				"cmds" => $this->cmds,
				"interacts" => $this->interacts,
			];
	}


	public function getId() : string{
		return $this->id;
	}

	public function getSynopsis() : ?string{
		return $this->synopsis;
	}

	public function getSynopsisString(?Player $context, WindowRequest $request = null) : string{
		if($this->synopsis === null){
			return "";
		}

		return $request !== null ? $request->translate($this->synopsis) : $this->manager->translate($context, $this->synopsis);
	}
}
