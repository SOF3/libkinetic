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

use InvalidStateException;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;

class LinkNode extends KineticNode{
	protected $target;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "TARGET"){
			$this->target = $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->requireAttributes("target");
	}

	public function resolve(KineticManager $manager) : void{
		throw new InvalidStateException("LinkNode should not be replaced before getting resolved");
	}

	public function getTarget() : string{
		return $this->target;
	}

	public function findTarget(KineticManager $manager) : WindowNode{
		return $manager->getParser()->idMap[$this->target];
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"target" => $this->target,
			];
	}
}
