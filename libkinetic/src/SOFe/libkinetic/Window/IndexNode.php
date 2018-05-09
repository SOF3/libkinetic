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

namespace SOFe\libkinetic\Window;

use pocketmine\Player;
use SOFe\libkinetic\WindowRequest;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;

/**
 * Index is displayed as a MenuForm, where options are hardcoded to be links to a child window or a link to a window identified by its ID.
 */
class IndexNode extends WindowNode{
	use ClickableParentNode;

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($delegate = $this->cpn_startChild($name)){
			return $delegate;
		}

		return null;
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + $this->cpn_jsonSerialize() + [
			];
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$this->cpn_resolve($manager);
	}

	public function onClick(WindowRequest $request) : void{
		parent::onClick($request);

		$player = $request->getPlayer();

		$buttons = [];
		/** @var WindowNode[] $buttonNodes */
		$buttonNodes = [];

		foreach($this->buttons as $node){
			if(!$node->testPermission($player)){
				continue;
			}

			$button = [
				"text" => $this->manager->translate($player, $node->indexName),
			];
			if($node->icon !== null){
				$buttons["icon"] = [
					"type" => $node->icon->getType(),
					"data" => $node->icon->getValue(),
				];
			}

			$buttons[] = $button;
			$buttonNodes[] = $node;
		}

		$form = [
			"type" => "form",
			"title" => $this->manager->translate($player, $this->title, $request),
			"content" => $this->getSynopsisString($player, $request),
			"buttons" => $buttons,
		];

		$this->manager->sendForm($player, $form, function(?int $button, Player $player) use ($buttonNodes, $request){
			if($button === null){
				return;
			}
			if(isset($buttonNodes[$button])){
				$buttonNodes[$button]->onClick($request);
			}
		});
	}
}
