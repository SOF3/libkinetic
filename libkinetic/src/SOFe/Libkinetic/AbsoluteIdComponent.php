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

namespace SOFe\Libkinetic;

use AssertionError;

class AbsoluteIdComponent extends KineticComponent{
	protected $my;
	protected $full;

	public function setAttribute(string $name, string $value) : bool{
		if($name === "ID"){
			$this->my = $value;
			$this->full = ($this->node->nodeParent->isRoot() ? "" : ($this->node->nodeParent->asAbsoluteId()->getId() . ".")) . $value;
			return true;
		}
		return false;
	}

	public function endElement() : void{
		$this->requireAttribute("id", $this->full);
	}

	public function getId() : string{
		if($this->full === null){
			$this->requireAttribute("id", $this->full);
			throw new AssertionError();
		}
		return $this->full;
	}
}