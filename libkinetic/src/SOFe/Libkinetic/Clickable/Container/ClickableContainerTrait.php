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

use pocketmine\Player;
use SOFe\Libkinetic\Clickable\ClickableTrait;
use SOFe\Libkinetic\Clickable\Cont\ContCommand;
use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\WindowRequest;

trait ClickableContainerTrait{
	use ClickableTrait;

	protected function onClickImpl(WindowRequest $request) : void{
		$user = $request->getUser();
		if($user instanceof Player){
			$this->onClickForm($request, $user);
		}else{
			$this->onClickCommandPrefix($request);

			if($this->getManager()->getRootNode()->hasComponent(ContCommand::class)){
				$command = "/{$this->getManager()}";
			}
		}
	}

	protected abstract function onClickForm(WindowRequest $request, Player $player) : void;

	protected abstract function onClickCommandPrefix(WindowRequest $request) : void;

	protected abstract function getNode() : KineticNode;
}
