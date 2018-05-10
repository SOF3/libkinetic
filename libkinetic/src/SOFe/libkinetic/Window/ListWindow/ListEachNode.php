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

namespace SOFe\libkinetic\Window\ListWindow;

use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Window\ArguedWindowNode;
use SOFe\libkinetic\Window\LinkNode;
use SOFe\libkinetic\Window\SingleClickableHolderNode;

class ListEachNode extends KineticNode{
	use SingleClickableHolderNode;

	/** @var string */
	protected $configName;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "CONFIG" . "NAME"){
			$this->configName = $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();

		$this->requireAttributes("configName");
	}

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($delegate = $this->schn_startChild($name)){
			if(!($delegate instanceof ArguedWindowNode) && !($delegate instanceof LinkNode)){
				throw new InvalidNodeException("The child must be a configurable node or a link to a configurable node, got a <{$this->child->nodeName}>", $this);
			}

			return $delegate;
		}

		return null;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);

		$this->schn_resolve($manager);

		if(!($this->child instanceof ArguedWindowNode)){
			throw new InvalidNodeException("The child must be a configurable node or a link to a configurable node, got a <{$this->child->nodeName}>", $this);
		}
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"configName" => $this->configName,
			];
	}
}
