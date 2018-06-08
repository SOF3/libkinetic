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

namespace SOFe\Libkinetic\Clickable\Types;

use Iterator;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use SOFe\Libkinetic\Clickable\ClickableInterface;
use SOFe\Libkinetic\Clickable\Container\ClickableContainerTrait;
use SOFe\Libkinetic\Clickable\Container\ClickableParentComponent;
use SOFe\Libkinetic\Clickable\Entry\DirectEntryClickableComponent;
use SOFe\Libkinetic\Clickable\Permission\PermissionClickableComponent;
use SOFe\Libkinetic\InvalidFormResponseException;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\WindowComponent;
use SOFe\Libkinetic\WindowRequest;
use function array_slice;
use function mb_strtolower;

class IndexComponent extends KineticComponent{
	use ClickableContainerTrait;

	public function dependsComponents() : Iterator{
		yield DirectEntryClickableComponent::class;
		yield WindowComponent::class;
		yield ClickableParentComponent::class;
	}

	protected function onClickForm(WindowRequest $request, Player $player) : void{
		$list = $this->getClickableListFor($player);
		/** @var array[] $buttons */
		$buttons = [];
		foreach($list as $clickable){
			$buttons[] = [
				"text" => $request->translate($clickable->asClickableComponent()->getIndexName()),
			]; // TODO add icon
		}
		$form = [
			"type" => "form",
			"title" => $request->translate($this->asWindowComponent()->getTitle()),
			"content" => $request->translate($this->asWindowComponent()->getSynopsis()),
			"buttons" => $buttons,
		];

		$push = $request->push();
		$this->manager->getFormHandler()->sendForm($player, $form, function(int $id) use ($push, $list){
			if(!isset($list[$id])){
				throw new InvalidFormResponseException("Undefined \$list[$id]");
			}
			$list[$id]->onClick($push, []);
		});
	}

	protected function onClickCommandHeader(WindowRequest $request) : void{
		$request->send($this->asWindowComponent()->getTitle());
		$request->send($this->asWindowComponent()->getSynopsis());
	}

	/**
	 * @param CommandSender $user
	 * @return ClickableInterface[]|KineticComponent[]
	 */
	protected function getClickableListFor(CommandSender $user) : array{
		$list = [];
		foreach($this->asClickableParentComponent()->getClickableList() as $clickable){
			if($clickable->node->hasComponent(PermissionClickableComponent::class) &&
				!$clickable->asPermissionClickableComponent()->testPermission($user)){
				continue;
			}
			$list[] = $clickable;
		}
		return $list;
	}

	/**
	 * @param WindowRequest $request
	 * @return string[]
	 */
	protected function getSubCommands(WindowRequest $request) : array{
		$cmds = [];
		foreach($this->getClickableListFor($request->getUser()) as $clickable){
			$cc = $clickable->asClickableComponent();
			$cmds[$cc->getArgName()] = $request->translate($cc->getIndexName());
		}
		return $cmds;
	}

	protected function handleSubCommand(WindowRequest $request, array $args) : bool{
		if(!isset($args[0])){
			return false;
		}
		foreach($this->getClickableListFor($request->getUser()) as $clickable){
			if(mb_strtolower($clickable->asClickableComponent()->getArgName()) === mb_strtolower($args[0])){
				$clickable->onClick($request, array_slice($args, 1)); // TODO what about the remaining args?
				return true;
			}
		}
		return false;
	}
}
