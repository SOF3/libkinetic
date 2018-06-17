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

use pocketmine\Player;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\WindowRequest;

trait ArgTrait{
	/**
	 * @param WindowRequest $request
	 * @param bool          $explicit     if the user explicitly requested to change this arg
	 * @param callable      $onConfigured action to execute after successful configuration of this arg; might never get called if user abandons this arg
	 */
	public final function configure(WindowRequest $request, bool $explicit, callable $onConfigured) : void{
		$sufficient = function($cache = null) use ($explicit, $onConfigured, $request){
			$validator = $this->asArgComponent()->getValidator();
			if($validator !== null){
				// if validator exists, validate the current args. if invalid, still request
				$validator->validate($request, $onConfigured, function(string $error = null) use ($cache, $explicit, $onConfigured, $request): void{
					$this->sendInterface($request, $explicit, $error, $onConfigured, $cache);
				});
			}else{
				// everything's ok, let's skip this arg
				$next = $this->asArgComponent()->getNext();
				if($next !== null){
					$next->configure($request, false, $onConfigured);
				}else{
					$onConfigured();
				}
			}
		};
		$insufficient = function($cache = null) use ($onConfigured, $request, $explicit){
			$this->sendInterface($request, $explicit, null, $onConfigured, $cache);
		};

		if($explicit){
			$insufficient();
		}else{
			$this->isRequestSufficient($request, $this->asArgComponent()->isRequired(), $sufficient, $insufficient);
		}
	}

	public final function sendInterface(WindowRequest $request, bool $explicit, ?string $error, callable $onConfigured, $cache) : void{
		$user = $request->getUser();
		if($user instanceof Player){
			$this->sendFormInterface($request, $user, $explicit, $error, $onConfigured, $cache);
		}else{
			$this->sendCommandInterface($request, $explicit, $error, $onConfigured, $cache);
		}
	}

	protected abstract function sendFormInterface(WindowRequest $request, Player $player, bool $explicit, ?string $error, callable $onConfigured, $cache) : void;

	protected abstract function sendCommandInterface(WindowRequest $request, bool $explicit, ?string $error, callable $onConfigured, $cache) : void;

	public final function afterResponse(WindowRequest $request, callable $onConfigured) : void{
		$this->configure($request, false, $onConfigured);
	}

	protected abstract function isRequestSufficient(WindowRequest $request, bool $baseRequired, callable $sufficient, callable $insufficient) : void;

	protected abstract function getNode() : KineticNode;

	protected abstract function getManager() : KineticManager;

	protected abstract function asArgComponent() : ArgComponent;
}
