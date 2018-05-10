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
use SOFe\Libkinetic\Node\ExitNode;
use SOFe\Libkinetic\Node\KineticNode;
use SOFe\Libkinetic\Node\KineticNodeTrait;
use SOFe\Libkinetic\Window\ListWindow\ListNode;

trait ClickableParentNode{
	use KineticNodeTrait;

	/** @var WindowNode[] */
	protected $buttons = [];

	public function cpn_startChild(string $name) : ?KineticNode{
		if($name === "INDEX"){
			return $this->buttons[] = new IndexNode();
		}

		if($name === "LIST"){
			return $this->buttons[] = new ListNode();
		}

		if($name === "INFO"){
			return $this->buttons[] = new InfoNode();
		}

		if($name === "LINK"){
			return $this->buttons[] = new LinkNode();
		}

		if($name === "EXIT"){
			return $this->buttons[] = new ExitNode();
		}

		return null;
	}

	public function cpn_resolve(KineticManager $manager) : void{
		foreach($this->buttons as $i => $button){
			$button->resolve($manager);
		}
	}

	public function cpn_jsonSerialize() : array{
		return [
			"buttons" => $this->buttons
		];
	}
}
