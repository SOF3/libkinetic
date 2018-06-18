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

namespace SOFe\Libkinetic\Clickable\Permission;

use Generator;
use Iterator;
use pocketmine\command\CommandSender;
use SOFe\Libkinetic\Clickable\ClickableComponent;
use SOFe\Libkinetic\Clickable\ClickablePeerInterface;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\WindowRequest;

class PermissionClickableComponent extends KineticComponent implements ClickablePeerInterface{
	/** @var PermissionComponent|null */
	protected $permission = null;

	public function dependsComponents() : Iterator{
		yield ClickableComponent::class;
	}

	public function startChild(string $name) : ?KineticNode{
		if($name === "PERMISSION"){
			return KineticNode::create(PermissionComponent::class)->getPermissionComponent($this->permission);
		}
		return null;
	}

	public function getPermission() : ?PermissionComponent{
		return $this->permission;
	}

	public function testPermission(CommandSender $user) : bool{
		return $this->permission === null || $this->permission->testPermission($user);
	}

	public function onClick(WindowRequest $request) : Generator{
		if(false){
			yield;
		}
		$perm = $this->getPermission();
		return $perm === null || $perm->testPermissionNoisy($request->getUser());
	}

	public function getPriority() : int{
		return self::PRIORITY_EARLIER;
	}
}
