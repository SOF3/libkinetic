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
use SOFe\libkinetic\Node\LinkNode;
use SOFe\libkinetic\Window\ConfigurableWindowNode;
use SOFe\libkinetic\Window\InfoNode;

class EachListNode extends KineticNode{
	/** @var string */
	protected $configName;

	/** @var ConfigurableWindowNode|LinkNode */
	protected $child;

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
		if($this->child !== null){
			throw new InvalidNodeException("Only one child node is allowed", $this);
		}

		if($name === "LIST"){
			return $this->child = new ListNode();
		}

		if($name === "INFO"){
			return $this->child = new InfoNode();
		}

		if($name === "LINK"){
			return $this->child = new LinkNode();
		}

		return null;
	}

	public function resolve(KineticManager $manager) : void{
		if($this->child instanceof LinkNode){
			$this->child = $this->child->findTarget($manager);
			if(!($this->child instanceof ConfigurableWindowNode)){
				throw new InvalidNodeException("The child of <EACH> in <LIST> must be a configurable node or a link to a configurable node, got a link to a <{$this->child->nodeName}> ({$this->child->getHierarchyName()})", $this);
			}
		}
		$this->child->resolve($manager);
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"child" => $this->child,
			];
	}
}
