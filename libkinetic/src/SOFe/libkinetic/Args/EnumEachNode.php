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

namespace SOFe\libkinetic\Args;

use SOFe\libkinetic\Element\ElementNode;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;

class EnumEachNode extends KineticNode{
	/** @var string */
	protected $title;
	/** @var ElementNode[] */
	protected $elements = [];

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "TITLE"){
			$this->title = $value;
			return true;
		}

		return false;
	}

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($delegate = ElementNode::byName($name)){
			return $this->elements[] = $delegate;
		}

		return null;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$manager->requireTranslation($this, $this->title);
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"title" => $this->title,
				"elements" => $this->elements,
			];
	}


	public function getTitle() : string{
		return $this->title;
	}

	/**
	 * @return ElementNode[]
	 */
	public function getElements() : array{
		return $this->elements;
	}
}
