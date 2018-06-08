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

namespace SOFe\Libkinetic\Clickable;

use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\Util\CallSequence;
use SOFe\Libkinetic\WindowRequest;
use function usort;

trait ClickableTrait{
	private $peers;

	public function onClick(WindowRequest $request) : void{
		CallSequence::forMethod($this->getPeers(), "onClick", function() use ($request){
			$this->onClickImpl($request);
		}, [$request]);
	}

	/**
	 * @return ClickablePeerInterface[]
	 */
	private function getPeers() : array{
		if(isset($this->peers)){
			return $this->peers;
		}
		$this->peers = $this->getNode()->getClickablePeerInterfaces();
		usort($this->peers, function(ClickablePeerInterface $a, ClickablePeerInterface $b) : int{
			return $b->getPriority() <=> $a->getPriority();
		});
		return $this->peers;
	}

	protected abstract function getNode() : KineticNode;

	protected abstract function onClickImpl(WindowRequest $request) : void;
}
