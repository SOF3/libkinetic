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

namespace SOFe\libkinetic\Nodes;

use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\ParseException;
use SOFe\libkinetic\Parser\KineticFileParser;

class EachListNode extends KineticNode implements ResolvableNode{
	/** @var ConfigurableWindowNode|LinkNode */
	protected $child;

	public function startChild(string $name) : ?KineticNode{
		if($this->child !== null){
			throw new ParseException("<{$this->nodeName}> can only have one child node");
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
			$this->child = KineticFileParser::getParsingInstance()->idMap[$this->child->getId()];
			if(!($this->child instanceof ConfigurableWindowNode)){
				throw new ParseException("The child of <EACH> must be a configurable node or a link to a configurable node, got <{$this->child->nodeName}>");
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
