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

namespace SOFe\libkinetic;

use function assert;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\plugin\Plugin;
use SOFe\libkinetic\Nodes\CommandEntryWindowNode;
use SOFe\libkinetic\Nodes\CommandNode;

class NodeEntryCommand extends Command implements PluginIdentifiableCommand{
	/** @var CommandEntryWindowNode */
	protected $node;

	public function __construct(KineticManager$manager, CommandNode $command){
		// TODO support simpleConfig
		assert($command->nodeParent instanceof CommandEntryWindowNode);
		parent::__construct($command->getName(), $command->nodeParent->getSynopsisString(), "/{$command->getName()}", $command->getAliases());
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args){

	}

	/**
	 * @return Plugin
	 */
	public function getPlugin() : Plugin{

	}
}
