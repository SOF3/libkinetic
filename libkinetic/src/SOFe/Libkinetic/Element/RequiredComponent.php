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

namespace SOFe\Libkinetic\Element;

use pocketmine\command\CommandSender;
use SOFe\Libkinetic\API\UserPredicate;
use SOFe\Libkinetic\KineticComponent;

class RequiredComponent extends KineticComponent{
	/** @var bool|null */
	protected $required = null;
	/** @var string|null */
	protected $predicateClass = null;
	/** @var UserPredicate|null */
	protected $predicate = null;

	public function setAttribute(string $name, string $value) : bool{
		if($name === "REQUIRED"){
			if($this->predicateClass !== null){
				$this->throw("required and requiredPredicate cannot be used together");
			}
			$this->required = $this->parseBoolean($value);
			return true;
		}

		if($name === "REQUIRED" . "PREDICATE"){
			if($this->required !== null){
				$this->throw("required and requiredPredicate cannot be used together");
			}
			$this->predicateClass = $value;
			return true;
		}

		return false;
	}

	public function endElement() : void{
		if($this->predicateClass === null && $this->required === null){
			$this->required = false;
		}
	}

	public function resolve() : void{
		if($this->predicate !== null){
			$this->predicate = $this->resolveClass($this->predicateClass, UserPredicate::class);
		}
	}

	public function test(CommandSender $user) : bool{
		return $this->predicate !== null ? $this->predicate->test($user) : $this->required;
	}
}
