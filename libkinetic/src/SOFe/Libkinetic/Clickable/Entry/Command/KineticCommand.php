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

namespace SOFe\Libkinetic\Clickable\Entry\Command;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;
use pocketmine\plugin\Plugin;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\KineticNode;
use function array_map;
use function implode;
use function iterator_to_array;

class KineticCommand extends Command implements PluginIdentifiableCommand{
	/** @var KineticManager */
	protected $manager;
	/** @var Plugin */
	protected $plugin;
	/** @var KineticNode the parent node of the one with CommandEntryComponent */
	protected $node;

	public function __construct(CommandEntryComponent $comp){
		$this->manager = $comp->getManager();
		$this->plugin = $this->manager->getPlugin();
		$this->node = $comp->getNode()->nodeParent;

		$name = $comp->getName();
		$desc = $this->manager->translate(null, $comp->getDescription());
		$usage = iterator_to_array($this->yieldUsage());

		$aliases = array_map(function(CommandAliasComponent $alias) : string{
			return $alias->getValue();
		}, $comp->getAliases());

		parent::__construct($name, $desc, implode(" ", $usage), $aliases);
	}

	public function execute(CommandSender $sender, string $commandLabel, array $args) : void{

	}

	public function getPlugin() : Plugin{
		return $this->plugin;
	}
}
