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

use InvalidArgumentException;
use Iterator;
use pocketmine\Player;
use SOFe\Libkinetic\Clickable\ClickableInterface;
use SOFe\Libkinetic\Clickable\Container\ClickableContainerInterface;
use SOFe\Libkinetic\Clickable\Container\ClickableContainerTrait;
use SOFe\Libkinetic\Clickable\Container\ClickableParentComponent;
use SOFe\Libkinetic\Clickable\Entry\DirectEntryClickableComponent;
use SOFe\Libkinetic\Clickable\PermissionClickableComponent;
use SOFe\Libkinetic\InvalidFormResponseException;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\libkinetic;
use SOFe\Libkinetic\WindowComponent;
use SOFe\Libkinetic\WindowRequest;
use function array_reverse;
use function implode;

class IndexComponent extends KineticComponent implements ClickableContainerInterface{
	use ClickableContainerTrait;

	public function dependsComponents() : Iterator{
		yield DirectEntryClickableComponent::class;
		yield WindowComponent::class;
		yield ClickableParentComponent::class;
	}

	protected function onClickImpl(WindowRequest $request) : void{
		/** @var ClickableInterface[]|KineticComponent[] $list */
		$list = [];
		foreach($this->asClickableParentComponent()->getClickableList() as $clickable){
			if($clickable->node->hasComponent(PermissionClickableComponent::class)){
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
				$list[$id]->onClick($request->push());
			});
		}else{
			$request->send($this->asWindowComponent()->getTitle());
			$request->send($this->asWindowComponent()->getSynopsis());

			// if ContCommand is present, use ContCommand; otherwise, only support direct-entry-through-index-path suggestions
			$cont = $this->node->findRoot()->asRootComponent()->getContCmd();
			if($cont !== null){
				$prefix = "/{$cont->getName()}";
			}else{
				$path = [];
				for($node = $this->node; !($node->nodeParent->hasComponent(DirectEntryClickableComponent::class) &&
					!empty($node->nodeParent->asDirectEntryClickableComponent()->getCommands())); $node = $node->nodeParent){
					if($node->nodeParent->hasComponent(IndexComponent::class)){
						$path[] = $node->asClickableComponent()->getArgName();
					}else{
						$request->send(libkinetic::MESSAGE_RUN_IN_GAME_FOR_INDEX);
						return;
					}
				}
				$prefix = "/{$node->asDirectEntryClickableComponent()->getCommands()[0]->getName()} " . implode(" ", array_reverse($path));
			}

			foreach($list as $component){
				$request->getUser()->sendMessage("/$prefix {$component->asClickableComponent()->getArgName()}: " . $request->translate($component->asClickableComponent()->getIndexName()));
			}
		}
	}

	public function getCommandPathFor(KineticNode $node) : ?array{
		foreach($this->asClickableParentComponent()->getClickableList() as $clickable){
			if($clickable->getNode() === $node){
				return [$clickable->asClickableComponent()->getArgName()];
			}
		}
		throw new InvalidArgumentException("Attempt to get command path for non-child node");
	}
}
