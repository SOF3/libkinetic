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

namespace SOFe\Libkinetic\Node;

use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\Window\ClickableParentNode;
use SOFe\Libkinetic\Window\WindowNode;
use function rtrim;

class RootNode extends KineticNode{
	use ClickableParentNode;

	/** @var string */
	protected $namespace = "";

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}
		if($name === "NAMESPACE"){
			$this->namespace = rtrim($value, "\\");
			if($this->namespace !== ""){
				$this->namespace .= "\\";
			}
			return true;
		}

		return false;
	}

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($delegate = $this->cpn_startChild($name)){
			return $delegate;
		}

		return null;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$this->cpn_resolve($manager);
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"namespace" => $this->namespace,
				"roots" => $this->buttons,
			];
	}

	public function getNamespace() : string{
		return $this->namespace;
	}

	/**
	 * @return WindowNode[]
	 */
	public function getRoots() : array{
		return $this->buttons;
	}
}
