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

use pocketmine\Player;
use SOFe\libkinetic\WindowRequest;
use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\ClickableNode;

class LinkNode extends ClickableNode{
	/** @var string */
	protected $target;

	/** @var ClickableNode */
	protected $delegate;

	public function __construct(){
		parent::__construct();
		$this->indexName = "(fallback to target node)";
	}

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
		parent::resolve($manager);

		$this->delegate = $manager->getParser()->idMap[$this->target] ?? null;
		if(!($this->delegate instanceof ClickableNode)){
			throw new InvalidNodeException("$this->target does not resolve to a clickable node", $this);
		}
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"target" => $this->target,
			];
	}

	public function getTarget() : string{
		return $this->target;
	}

	public function getDelegateNode() : ClickableNode{
		return $this->delegate;
	}

	public function onClick(WindowRequest $request) : void{
		parent::onClick($request);
		$this->delegate->onClick($request);
	}
}
