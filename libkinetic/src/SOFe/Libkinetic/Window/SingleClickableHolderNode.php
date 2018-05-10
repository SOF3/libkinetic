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

namespace SOFe\Libkinetic\Window;

use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\Node\ClickableNode;
use SOFe\Libkinetic\Node\ExitNode;
use SOFe\Libkinetic\Node\KineticNode;
use SOFe\Libkinetic\Node\KineticNodeTrait;
use SOFe\Libkinetic\Window\ListWindow\ListNode;

trait SingleClickableHolderNode{
	use KineticNodeTrait;

	/** @var ClickableNode */
	protected $child;

	public function schn_startChild(string $name) : ?KineticNode{
		if($this->child !== null){
			throw $this->t_throw("Only one child node is allowed");
		}

		if($name === "INDEX"){
			return $this->child = new IndexNode();
		}
		if($name === "LIST"){
			return $this->child = new ListNode();
		}

		if($name === "INFO"){
			return $this->child = new InfoNode();
		}

		if($name === "EXIT"){
			return $this->child = new ExitNode();
		}

		if($name === "LINK"){
			return $this->child = new LinkNode();
		}

		return null;
	}

	public function schn_endElement() : void{
		if(!isset($this->child)){
			$this->t_throw("Exactly once child clickable node must be declared");
		}
	}

	public function schn_resolve(KineticManager $manager) : void{
		$this->child->resolve($manager);
	}

	public function schn_jsonSerialize() : array{
		return [
			"child" => $this->jsonSerialize(),
		];
	}
}