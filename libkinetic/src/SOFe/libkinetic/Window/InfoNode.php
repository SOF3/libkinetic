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

use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;

class InfoNode extends ArguedWindowNode{
	/** @var ModalButtonNode|null */
	protected $button1;
	/** @var ModalButtonNode|null */
	protected $button2;

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "BUTTON1"){
			return $this->button1 = new ModalButtonNode($this->getId() . ".button1");
		}

		if($name === "BUTTON2"){
			return $this->button1 = new ModalButtonNode($this->getId() . ".button2");
		}

		return null;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);

		if($this->button1 !== null){
			$this->button1->resolve($manager);
		}

		if($this->button2 !== null){
			$this->button2->resolve($manager);
		}
	}
}
