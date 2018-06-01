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

namespace SOFe\Libkinetic\Defaults;

use pocketmine\command\CommandSender;
use pocketmine\Player;
use SOFe\Libkinetic\API\UserPredicate;
use function mb_split;

class IsPlayerPredicate implements UserPredicate{
	/** @var string */
	protected $not = false;

	public function __construct(string $args){
		foreach(mb_split(';', $args) as $arg){
			if($arg === "not"){
				$this->not = true;
			}
		}
	}

	public function test(CommandSender $sender) : bool{
		return $sender instanceof Player !== $this->not;
	}
}
