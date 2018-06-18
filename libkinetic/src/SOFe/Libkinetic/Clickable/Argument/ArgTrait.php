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

namespace SOFe\Libkinetic\Clickable\Argument;

use Generator;
use pocketmine\Player;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\Util\Await;
use SOFe\Libkinetic\WindowRequest;

trait ArgTrait{
	/**
	 * @param WindowRequest $request
	 * @param bool          $explicit if the user explicitly requested to change this arg
	 * @return Generator
	 */
	public final function configure(WindowRequest $request, bool $explicit) : Generator{
		if($explicit && yield Await::FROM => $this->isRequestSufficient($request, $this->asArgComponent()->isRequired(), $cache)){
			$validator = $this->asArgComponent()->getValidator();

			$error = null;
			$valid = $validator === null || (yield Await::FROM => $validator->validate($request, $error));
			if($valid){
				return true;
			}

			return yield Await::FROM => $this->sendInterface($request, $explicit, $error, $cache);
		}

		return true;
	}

	public final function sendInterface(WindowRequest $request, bool $explicit, ?string $error, $cache) : Generator{
		$user = $request->getUser();
		$generator = $user instanceof Player ? $this->sendFormInterface($request, $user, $explicit, $error, $cache) : $this->sendCommandInterface($request, $explicit, $error, $cache);
		return yield Await::FROM => $generator;
	}

	protected abstract function sendFormInterface(WindowRequest $request, Player $player, bool $explicit, ?string $error, $cache) : Generator;

	protected abstract function sendCommandInterface(WindowRequest $request, bool $explicit, ?string $error, $cache) : Generator;

	public final function afterResponse(WindowRequest $request) : Generator{
		yield Await::FROM => $this->configure($request, false);
	}

	protected abstract function isRequestSufficient(WindowRequest $request, bool $baseRequired, &$cache) : Generator;

	protected abstract function getNode() : KineticNode;

	protected abstract function getManager() : KineticManager;

	protected abstract function asArgComponent() : ArgComponent;
}
