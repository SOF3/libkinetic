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

namespace SOFe\libkinetic\Nodes\Element;

use SOFe\libkinetic\Nodes\KineticNode;
use SOFe\libkinetic\Nodes\Window\WindowNode;

abstract class ElementNode extends KineticNode{
	/** @var string */
	protected $id;
	/** @var string */
	protected $title;

	public function setAttribute(string $name, string $value) : bool{
		if($name === "ID"){
			$this->id = ($this->parent instanceof WindowNode ? ($this->parent->getId() . ".") : "") . $value;
			return true;
		}

		if($name === "TITLE"){
			$this->title = $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->requireAttribute("id", "title");
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"id" => $this->id,
				"title" => $this->title,
			];
	}

	public static function byName(string $name) : ?ElementNode{
		if($name === "LABEL"){
			return new LabelNode();
		}

		if($name === "INPUT"){
			return new InputNode();
		}

		if($name === "TOGGLE"){
			return new ToggleNode();
		}

		if($name === "DROPDOWN"){
			return new DropdownNode();
		}

		if($name === "STEP" . "SLIDER"){
			return new StepSliderNode();
		}

		if($name === "SLIDER"){
			return new SliderNode();
		}

		return null;
	}
}
