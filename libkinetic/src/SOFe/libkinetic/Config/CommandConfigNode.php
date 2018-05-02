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

namespace SOFe\libkinetic\Config;

use SOFe\libkinetic\Element\EditableElementNode;
use SOFe\libkinetic\Element\ElementNode;
use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Window\ConfigurableWindowNode;
use function assert;
use function trim;

/**
 * CommandConfigNode is a variant of ConfigNode that only allows one child and requires an <code>argName</code> attribute.
 *
 * When a player tries to open a configurable from command, if there are required settings in ConfigNode, a CustomForm will be opened so that the player can edit them from the form. On the other hand, settings in CommandConfigNode will just go into the command's syntax, i.e. the player will fill the required and optional values from the command.
 */
class CommandConfigNode extends AbstractConfigNode{
	/** @var string */
	protected $argName;

	/** @var EditableElementNode */
	protected $element;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		$this->id = "(to be set in CommandConfigNode::endElement())";

		if($name === "ARG" . "NAME"){
			$this->argName = trim($value);
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->requireAttributes("argName");
	}

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($delegate = ElementNode::byName($name)){
			if(isset($this->element)){
				throw new InvalidNodeException("Only one child editable node is allowed", $this);
			}
			if(!($delegate instanceof EditableElementNode)){
				throw new InvalidNodeException("<{$name}> is not editable; the child node must be an editable element node", $this);
			}
			return $this->element = $delegate;
		}

		return null;
	}

	public function endElement() : void{
		parent::endElement();

		if(!isset($this->element)){
			throw new InvalidNodeException("Exactly one child node is accepted", $this);
		}

		$this->id = $this->element->getId();
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$manager->requireTranslation($this, $this->argName);
		$this->element->resolve($manager);
	}

	public function isRequired() : bool{
		return $this->required;
	}

	public function getArgName() : string{
		return $this->argName;
	}

	public function getElement() : EditableElementNode{
		return $this->element;
	}

	public function getId() : string{
		assert($this->nodeParent instanceof ConfigurableWindowNode);
		return $this->nodeParent->getId() . ".__commandArgs";
	}
}
