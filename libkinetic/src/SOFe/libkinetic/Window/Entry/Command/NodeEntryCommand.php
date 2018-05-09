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

namespace SOFe\libkinetic\Window\Entry\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Window\ArguedWindowNode;
use SOFe\libkinetic\Window\WindowNode;
use function assert;

class NodeEntryCommand extends Command implements PluginIdentifiableCommand{

	/** @var KineticManager */
	protected $manager;
	/** @var CommandEntryPointNode */
	protected $command;

	/** @var \SOFe\libkinetic\Args\CommandArgNode[] */
	protected $args = [];

	public function __construct(KineticManager $manager, CommandEntryPointNode $command){
		assert($command->nodeParent instanceof WindowNode);

		$usage = "/{$command->getName()}";
		if($command->nodeParent instanceof ArguedWindowNode){
			$this->args = $command->nodeParent->getCommandConfigs();
			foreach($this->args as $arg){
				$usage .= " ";
				$element = $arg->getElement();
				if($arg->isRequired()){
					$usage .= "<";
					$usage .= $arg->getArgName();
					$usage .= ">";
				}else{
					$usage .= "[";
					$usage .= $arg->getArgName();
					$default = $element->getDefaultAsString();
					if($default !== null){
						$usage .= " = ";
						$usage .= $default;
					}
					$usage .= "]";
				}
			}
		}

		parent::__construct($command->getName(), $command->nodeParent->getSynopsisString(null), $usage, $command->getAliases()); // TODO make translated description into the client
		$this->manager = $manager;
		$this->command = $command;
	}

	public function testPermissionSilent(CommandSender $target) : bool{
		return $this->internalTestPermission($target) === null;
	}

	public function testPermission(CommandSender $target) : bool{
		$message = $this->internalTestPermission($target);

		if($message === null){
			return true;
		}

		$target->sendMessage($message);
		return false;
	}

	protected function internalTestPermission(CommandSender $target) : ?string{
		if(!($target instanceof Player)){
			return "Please run this command in-game.";
		}

		$parent = $this->command->nodeParent;
		assert($parent instanceof WindowNode);

		if($parent->getPermission() !== null && !$parent->getPermission()->testPermission($target)){
			return $parent->getPermission()->getPermissionMessage($this->manager, $target) ?? $target->getServer()->getLanguage()->translateString(TextFormat::RED . "%commands.generic.permission");
		}

		return null;
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){
		// TODO implement
	}

	public function getPlugin() : Plugin{
		return $this->manager->getPlugin();
	}
}
