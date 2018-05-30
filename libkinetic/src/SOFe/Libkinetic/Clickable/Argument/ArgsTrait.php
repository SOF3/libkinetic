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
use SOFe\Libkinetic\WindowRequest;

trait ArgsTrait{
	/**
	 * @param WindowRequest $request
	 * @param bool          $explicit     if the user explicitly requested to change this arg
	 * @param callable      $onConfigured action to execute after successful configuration of this arg; might never get called if user abandons this arg
	 */
	public function configure(WindowRequest $request, bool $explicit, callable $onConfigured) : void{
		if(!$explicit && $this->isRequestSufficient($request, $this->asArgs()->isRequired())){
			// if args are sufficient, skip this arg
			$validator = $this->asArgs()->getValidator();
			if($validator !== null){
				// if validator exists, validate the current args. if invalid, still request
				$validator->validate($request, $onConfigured, function(string $error = null) use ($explicit, $onConfigured, $request){
					$this->sendInterface($request, $explicit, $error, $onConfigured);
				});
			}else{
				// everything's ok, let's skip this arg
				$onConfigured();
			}
			return;
		}

		$this->sendInterface($request, $explicit, null, $onConfigured);
	}

	public function sendInterface(WindowRequest $request, bool $explicit, ?string $error, callable $onConfigured) : void{
		$user = $request->getUser();
		if($user instanceof Player){
			$this->sendFormInterface($request, $user, $explicit, $error, $onConfigured);
		}else{
			$this->sendCommandInterface($request, $explicit, $error, $onConfigured);
		}
	}

	protected abstract function sendFormInterface(WindowRequest $request, Player $player, bool $explicit, ?string $error, callable $onConfigured) : void;

	protected abstract function sendCommandInterface(WindowRequest $request, bool $explicit, ?string $error, callable $onConfigured) : void;

	public function afterResponse(WindowRequest $request, bool $wasExplicit, callable $onConfigured) : void{
		$validator = $this->asArgs()->getValidator();
		if($validator !== null){
			$validator->validate($request, $onConfigured, function(string $error = null) use ($onConfigured, $request){ // resend the form
				$this->sendInterface($request, true, $error, $onConfigured);
			});
		}else{
			$onConfigured();
		}
	}

	protected abstract function isRequestSufficient(WindowRequest $request, bool $baseRequired);

	protected abstract function getManager() : KineticManager;

	protected abstract function asArgs() : ArgsComponent;
}
