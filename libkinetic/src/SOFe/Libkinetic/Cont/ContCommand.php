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

namespace SOFe\Libkinetic\Cont;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\plugin\Plugin;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\LibkineticMessages;
use SOFe\Libkinetic\Util\CallbackTask;
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
				$manager->translate(null, LibkineticMessages::CONT_DESC),
				$manager->translate(null, LibkineticMessages::CONT_USAGE, ["alias" => $shortest]),
				array_slice($missing, 1),
				$manager
			);
			$manager->getPlugin()->getServer()->getCommandMap()->register("libkinetic", $command);
		}

		$listener = new ContListener($manager, $names);
		$manager->getPlugin()->getScheduler()->scheduleDelayedTask(new CallbackTask([$listener, "cleanup"]), 200);

		return [$listener, "waitFor"];
	}

	/** @var KineticManager */
	private $manager;

	public function __construct(string $name, string $desc, string $usage, array $aliases, KineticManager $manager){
		$this->manager = $manager;
		parent::__construct($name, $desc, $usage, $aliases);
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){
		$sender->sendMessage($this->manager->translate($sender, LibkineticMessages::CONT_NIL));
	}

	public function getPlugin() : Plugin{
		return $this->manager->getPlugin();
	}
}
