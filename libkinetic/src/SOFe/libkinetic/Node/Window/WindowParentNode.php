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

namespace SOFe\libkinetic\Node\Window;

use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\Entry\DirectEntryWindowNode;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Node\KineticNodeTrait;
use SOFe\libkinetic\Node\LinkNode;
use SOFe\libkinetic\Node\Window\ListWindow\ListNode;

trait WindowParentNode{
	use KineticNodeTrait;

	/** @var WindowNode[]|LinkNode[] */
	protected $buttons = [];

	public function startChild(string $name) : ?KineticNode{
		if($name === "INDEX"){
			return $this->buttons[] = new IndexNode();
		}

		if($name === "LIST"){
			return $this->buttons[] = new ListNode();
		}

		if($name === "INFO"){
			return $this->buttons[] = new InfoNode();
		}

		if($name === "TEXT"){
			return $this->buttons[] = new TextNode();
		}

		if($name === "LINK"){
			return $this->buttons[] = new LinkNode();
		}

		return null;
	}

	public function resolve(KineticManager $manager) : void{
		foreach($this->buttons as $i => $button){
			if($button instanceof LinkNode){
				$this->buttons[$i] = $button = $button->findTarget();
			}
			if(!($button instanceof DirectEntryWindowNode)){
				$this->t_throw("Only DirectEntryWindowNode children are allowed");
			}
			$button->resolve($manager);
		}
	}

	public function jsonSerialize() : array{
		return $this->buttons;
	}
}
