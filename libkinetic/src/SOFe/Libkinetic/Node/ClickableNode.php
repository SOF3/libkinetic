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

namespace SOFe\Libkinetic\Node;

use pocketmine\command\CommandSender;
use SOFe\Libkinetic\API\ClickHandler;
use SOFe\Libkinetic\ClickInterruptedException;
use SOFe\Libkinetic\InvalidNodeException;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\WindowRequest;

abstract class ClickableNode extends KineticNode{
	/** @var string */
	protected $indexName;

	/** @var PermissionNode|null */
	protected $permission = null;

	/** @var IconNode|null */
	protected $icon = null;

	/** @var string|null */
	protected $onClick = null;
	/** @var ClickHandler|null */
	protected $onClickHandler = null;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "INDEX" . "NAME"){
			$this->indexName = $value;
			return true;
		}

		if($name === "ON" . "CLICK"){
			$this->onClick = $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->requireAttributes("indexName");
	}

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "PERMISSION"){
			if($this->permission !== null){
				throw new InvalidNodeException("Only one <PERMISSION> node is allowed", $this);
			}
			return $this->permission = new PermissionNode();
		}

		if($name === "ICON"){
			return $this->icon = new IconNode();
		}

		return null;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);

		$manager->requireTranslation($this, $this->indexName);

		if($this->permission !== null){
			$this->permission->resolve($manager);
		}

		$this->onClickHandler = $manager->resolveClass($this, $this->onClick, ClickHandler::class);
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"indexName" => $this->indexName,
				"permission" => $this->permission,
				"icon" => $this->icon,
				"onClick" => $this->onClick,
			];
	}

	public function getOnClickHandler() : ?ClickHandler{
		return $this->onClickHandler;
	}

	public function getPermission() : ?PermissionNode{
		return $this->permission;
	}

	public function testPermission(CommandSender $sender, bool $ifUndefined = true) : bool{
		return $this->permission !== null ? $this->permission->testPermission($sender) : $ifUndefined;
	}


	public function onClick(WindowRequest $request) : void{
		$sender = $request->getSender();
		if($this->permission !== null && !$this->permission->testPermission($sender)){
			$sender->sendMessage($this->permission->getPermissionMessage($this->manager, $sender));
			throw new ClickInterruptedException();
		}

		if($this->onClickHandler !== null){
			$this->onClickHandler->onClick($request);
		}
	}
}
