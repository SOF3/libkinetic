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

namespace SOFe\Libkinetic\Element;

use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\BooleanAttribute;
use SOFe\Libkinetic\Parser\Attribute\FloatAttribute;
use SOFe\Libkinetic\Parser\Attribute\IntAttribute;
use SOFe\Libkinetic\Parser\Attribute\NodeAttribute;
use SOFe\Libkinetic\Parser\Attribute\StringAttribute;
use SOFe\Libkinetic\Parser\Attribute\UserStringAttribute;
use SOFe\Libkinetic\UserString;
use function assert;

class SelectOptionComponent extends KineticComponent{
	/** @var UserString */
	protected $displayName;
	/** @var string */
	protected $commandName;
	/** @var bool|int|float|string */
	protected $value;
	/** @var bool */
	protected $default = false;

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("displayName", new UserStringAttribute(), $this->displayName, true);
		$router->use("commandName", new StringAttribute(), $this->commandName, true);
		assert($this->getNode()->getParent() !== null);
		$router->use("value", $this->createAttributeByType(), $this->value, true);
		$router->use("default", new BooleanAttribute(), $this->default, false);
	}

	protected function createAttributeByType() : NodeAttribute{
		assert($this->getNode()->getParent() !== null);
		$type = $this->getNode()->getParent()->asSelectElementComponent()->getValueType();
		switch($type){
			case "bool":
				return new BooleanAttribute();
			case "integer":
				return new IntAttribute();
			case "double":
				return new FloatAttribute();
			case "string":
				return new StringAttribute();
		}
		throw $this->getNode()->getParent()->throw("Invalid valueType $type");
	}

	public function getDisplayName() : UserString{
		return $this->displayName;
	}

	public function getCommandName() : string{
		return $this->commandName;
	}

	/**
	 * @return bool|float|int|string
	 */
	public function getValue(){
		return $this->value;
	}

	public function isDefault() : bool{
		return $this->default;
	}
}
