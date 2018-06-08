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

namespace SOFe\Libkinetic\Clickable\Container;

use pocketmine\command\CommandSender;
use pocketmine\Player;
use SOFe\Libkinetic\Clickable\ClickableTrait;
use SOFe\Libkinetic\Clickable\Entry\DirectEntryClickableComponent;
use SOFe\Libkinetic\Clickable\Permission\PermissionClickableComponent;
use SOFe\Libkinetic\Clickable\Types\IndexComponent;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\libkinetic;
use SOFe\Libkinetic\WindowRequest;
use function array_reverse;
use function implode;

trait ClickableContainerTrait{
	use ClickableTrait;

	protected function onClickImpl(WindowRequest $request) : void{
		$user = $request->getUser();
		if($user instanceof Player){
			$this->onClickForm($request, $user);
		}else{
			$this->onClickCommandHeader($request);

			$subCmds = $this->getSubCommands($user);

			if(!empty($subCmds)){
				if($this->getManager()->hasCont()){
					$command = "/{$this->getManager()->getContComponents()[0]->getName()}";

					$this->getManager()->setContAction($user, function(array $args) use ($subCmds, $user, $command){
						$result = $this->handleSubCommand($user, $args);

						if(!$result){
							$user->sendMessage("Usage:");
							self::sendSubCommands($user, $command, $subCmds);
						}
					});
				}else{
					$path = [];
					for($node = $this->getNode(); $node !== null && !self::hasCommand($node, $user); $node = $node->nodeParent){
						if($node->nodeParent->hasComponent(IndexComponent::class)){
							$path[] = $node->asClickableComponent()->getArgName();
						}else{
							$request->send(libkinetic::MESSAGE_RUN_IN_GAME_FOR_INDEX);
							goto after_subcommands;
						}
					}

					if($node === null){
						goto after_subcommands;
					}

					$command = "/{$node->asDirectEntryClickableComponent()->getCommands()[0]->getName()} " . implode(" ", array_reverse($path));
				}

				self::sendSubCommands($user, $command, $subCmds);
			}

			after_subcommands:
			$this->onClickCommandFooter($request);
		}
	}

	private static function sendSubCommands(CommandSender $user, string $command, array $subCommands) : void{
		foreach($subCommands as $subCommand => $description){
			$user->sendMessage("/{$command} {$subCommand}: $description");
		}
	}

	private static function hasCommand(KineticNode $node, CommandSender $user) : ?string{
		if(!$node->hasComponent(DirectEntryClickableComponent::class)){
			return null;
		}
		if($node->hasComponent(PermissionClickableComponent::class) && !$node->asPermissionClickableComponent()->testPermission($user)){
			return null;
		}
		$cmds = $node->nodeParent->asDirectEntryClickableComponent()->getCommands();
		return empty($cmds) ? null : $cmds[0]->getName();
	}

	protected abstract function onClickForm(WindowRequest $request, Player $player) : void;

	protected function onClickCommandHeader(WindowRequest $request) : void{
	}

	protected function onClickCommandFooter(WindowRequest $request) : void{
	}

	/**
	 * Consume args that shall be consumed before the subcommand arg, e.g. take arguments for config.
	 *
	 * @param string[] &$args
	 */
	protected function handleBeforeSubCommand(array &$args) : void{
	}

	/**
	 * @return string[]
	 */
	protected function getArgsBeforeSubCommand() : array{
		return [];
	}

	/**
	 * @param WindowRequest $request
	 * @return string[]
	 */
	protected abstract function getSubCommands(WindowRequest $request) : array;

	/**
	 * @param WindowRequest $request
	 * @param string[]      $args
	 * @return bool
	 */
	protected abstract function handleSubCommand(WindowRequest $request, array $args) : bool;

	protected abstract function getNode() : KineticNode;

	protected abstract function getManager() : KineticManager;
}
