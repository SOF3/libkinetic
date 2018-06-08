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

namespace SOFe\Libkinetic\Clickable\Cont;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\plugin\Plugin;
use SOFe\Libkinetic\Clickable\Entry\Command\CommandAliasComponent;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\libkinetic;
use function array_map;

class ContCommand extends Command implements PluginIdentifiableCommand{
	/** @var KineticManager */
	protected $manager;

	public function __construct(ContCommandComponent $component){
		$this->manager = $component->getManager();
		parent::__construct($component->getName(), $component->getManager()->translate(null, $component->getDescription()), "<args...>", array_map(function(CommandAliasComponent $component){
			return $component->getValue();
		}, $component->getAliases()));
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args) : void{
		$action = $this->manager->consumeContAction($sender);
		if($action !== null){
			$action($args);
		}else{
			$sender->sendMessage($this->manager->translate($sender, libkinetic::MESSAGE_CONT_NIL));
		}
	}

	public function getPlugin() : Plugin{
		return $this->manager->getPlugin();
	}
}
