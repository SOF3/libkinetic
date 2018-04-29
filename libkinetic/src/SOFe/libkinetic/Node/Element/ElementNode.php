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

namespace SOFe\libkinetic\Node\Element;

use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Node\KineticNodeWithId;
use SOFe\libkinetic\Parser\KineticFileParser;

abstract class ElementNode extends KineticNode implements KineticNodeWithId{
	/** @var string */
	protected $id;
	/** @var string */
	protected $title;

	public function setAttribute(string $name, string $value) : bool{
		if($name === "ID"){
			if($this->nodeParent instanceof KineticNodeWithId){
				$this->id = $this->nodeParent->getId() . "." . $value;
			}else{
				if($this->nodeParent !== null){
					throw new InvalidNodeException("Only KineticNodeWithId can have child element node", $this);
				}
				$this->id = $value;
			}

			KineticFileParser::getParsingInstance()->idMap[$this->id] = $this;
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
		$this->requireAttributes("id", "title");
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"id" => $this->id,
				"title" => $this->title,
			];
	}

	public function getId() : string{
		return $this->id;
	}

	public function getTitle() : string{
		return $this->title;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$manager->requireTranslation($this, $this->title);
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
