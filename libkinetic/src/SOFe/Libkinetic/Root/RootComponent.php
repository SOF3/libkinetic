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

namespace SOFe\Libkinetic\Root;

use Iterator;
use SOFe\Libkinetic\Clickable\ClickableParentComponent;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\KineticNode;

class RootComponent extends KineticComponent{
	/** @var string */
	protected $namespace;
	/** @var ContCommandComponent|null */
	protected $contCmd = null;

	public function dependsComponents() : Iterator{
		yield ClickableParentComponent::class;
	}

	public function setAttribute(string $name, string $value) : bool{
		if($name === "NAMESPACE"){
			$this->namespace = $value;
			return true;
		}
		return false;
	}

	public function startChild(string $name) : ?KineticNode{
		if($name === "CONT"){
			return KineticNode::create(ContCommandComponent::class)->getContCommandComponent($this->contCmd);
		}
		return null;
	}

	public function endElement() : void{
		$this->requireAttribute("namespace", $this->namespace);
	}

	public function getNamespace() : string{
		return $this->namespace;
	}
}