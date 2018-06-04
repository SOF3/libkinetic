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

namespace SOFe\Libkinetic\Clickable\Window;

use InvalidArgumentException;
use Iterator;
use pocketmine\Player;
use SOFe\Libkinetic\Clickable\Clickable;
use SOFe\Libkinetic\Clickable\ClickableContainer;
use SOFe\Libkinetic\Clickable\ClickableParentComponent;
use SOFe\Libkinetic\Clickable\ClickableTrait;
use SOFe\Libkinetic\Clickable\Entry\DirectEntryClickableComponent;
use SOFe\Libkinetic\Clickable\PermissionClickableComponent;
use SOFe\Libkinetic\InvalidFormResponseException;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\WindowComponent;
use SOFe\Libkinetic\WindowRequest;

class IndexComponent extends KineticComponent implements Clickable, ClickableContainer{
	use ClickableTrait;

	public function dependsComponents() : Iterator{
		yield DirectEntryClickableComponent::class;
		yield WindowComponent::class;
		yield ClickableParentComponent::class;
	}

	protected function onClickImpl(WindowRequest $request) : void{
		/** @var Clickable[]|KineticComponent[] $list */
		$list = [];
		foreach($this->asClickableParentComponent()->getClickableList() as $clickable){
			if($clickable->getNode()->hasComponent(PermissionClickableComponent::class)){
				$perm = $clickable->asPermissionClickableComponent()->getPermission();
				if($perm !== null && !$perm->testPermission($request->getUser())){
					continue;
				}
			}
			$list[] = $clickable;
		}

		if($request->getUser() instanceof Player){
			/** @var Player $player */
			$player = $request->getUser();
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
			$this->manager->getFormHandler()->sendForm($player, $form, function(int $id) use ($request, $list){
				if(!isset($list[$id])){
					throw new InvalidFormResponseException("Undefined \$list[$id]");
				}
				$list[$id]->onClick($request);
			});
		}else{
			$request->send($this->asWindowComponent()->getTitle());
			$request->send($this->asWindowComponent()->getSynopsis());
			foreach($this->asClickableParentComponent()->getClickableList() as $clickable){
				$request->getUser()->sendMessage($request->translate($clickable->asClickableComponent()->getArgName()) . ": " .
					ClickableTrait::findCommandPath($this->node)); // TODO use translations API
			}
		}
	}

	public function getCommandPathFor(KineticNode $node) : string{
		foreach($this->asClickableParentComponent()->getClickableList() as $clickable){
			if($clickable->getNode() === $node){
				return $clickable->asClickableComponent()->getArgName();
			}
		}
		throw new InvalidArgumentException("Attempt to get command path for non-child node");
	}
}
