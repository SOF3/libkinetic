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

use Iterator;
use SOFe\Libkinetic\Clickable\ClickableComponent;
use SOFe\Libkinetic\Clickable\ClickablePeer;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\Util\CallSequence;
use SOFe\Libkinetic\WindowRequest;

class ArguableComponent extends KineticComponent implements ClickablePeer{
	/** @var ArgsInterface[] */
	protected $args = [];

	public function dependsComponents() : Iterator{
		yield ClickableComponent::class;
	}

	public function startChild(string $name) : ?KineticNode{
		if($name === "SIMPLE" . "ARGS"){
			return KineticNode::create(SimpleArgsComponent::class)->addSimpleArgs($this->args);
		}
		return null;
	}

	public function onClick(WindowRequest $request, callable $onComplete) : void{
		if(empty($this->args)){
			$onComplete();
			return;
		}

		CallSequence::forMethod($this->args, "configure", $onComplete, [$request], [false]);
	}

	public function getPriority() : int{
		return self::PRIORITY_EARLY;
	}
}
