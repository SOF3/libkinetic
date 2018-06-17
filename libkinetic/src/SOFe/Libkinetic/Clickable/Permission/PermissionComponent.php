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

use pocketmine\command\CommandSender;
use SOFe\Libkinetic\API\NamedPermissionUserPredicate;
use SOFe\Libkinetic\API\UserPredicate;
use SOFe\Libkinetic\KineticComponent;

class PermissionComponent extends KineticComponent{
	/** @var bool */
	protected $need = true;
	/** @var bool */
	protected $usesPredicate;
	/** @var string */
	protected $name;
	/** @var UserPredicate */
	protected $predicate;
	/** @var string|null */
	protected $message = null;

	public function setAttribute(string $name, string $value) : bool{
		if($name === "NEED"){
			$this->need = $this->parseBoolean($value);
			return true;
		}
		if($name === "NAME" || $name === "PREDICATE"){
			if(isset($this->usesPredicate)){
				$this->throw("Either name or predicate is allowed, not both");
			}
			$this->usesPredicate = $name === "PREDICATE";
			$this->name = $value;
			return true;
		}
		if($name === "MESSAGE"){
			$this->message = $value;
			return true;
		}
		return false;
	}

	public function endElement() : void{
		$this->requireAttribute("name or predicate", $this->name);
		if($this->usesPredicate && !$this->need){
			$this->throw("need is not allowed if predicate is used");
		}
	}

	public function resolve() : void{
		$this->predicate = $this->usesPredicate ? $this->resolveClass($this->name, UserPredicate::class) : new NamedPermissionUserPredicate($this->name, $this->need);
		$this->requireTranslation($this->message);
	}

	public function testPermission(CommandSender $sender) : bool{
		return $this->predicate->test($sender) === $this->need;
	}

	public function testPermissionNoisy(CommandSender $sender) : bool{
		if($this->testPermission($sender)){
			return true;
		}
		$sender->sendMessage($this->manager->translate($sender, $this->message));
		return false;
	}
}
