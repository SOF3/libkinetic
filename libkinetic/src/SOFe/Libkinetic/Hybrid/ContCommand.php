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

namespace SOFe\Libkinetic\Hybrid;

use pocketmine\command\Command;
use pocketmine\command\PluginIdentifiableCommand;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\LibkineticMessages;
use function array_slice;
use function assert;
use function count;
use function strlen;

class ContCommand extends Command implements PluginIdentifiableCommand{
	public static function registerOrAdapt(KineticManager $manager, array $names) : callable{
		$shortest = null;
		$missing = [];
		foreach($names as $name){
			if($manager->getPlugin()->getServer()->getCommandMap()->getCommand($name) === null){
				$missing[] = $name;
				if($shortest === null || strlen($shortest) > strlen($name)){
					$shortest = $name;
				}
			}
		}
		if(count($missing) > 0){
			assert($shortest !== null);
			$command = new ContCommand(
				$missing[0],
				$manager->translate(null, LibkineticMessages::MESSAGE_CONT_DESC),
				$manager->translate(null, LibkineticMessages::MESSAGE_CONT_USAGE, ["alias" => $shortest]),
				array_slice($missing, 1)
			);
			$manager->getPlugin()->getServer()->getCommandMap()->register("libkinetic", $command);
		}
	}
}
