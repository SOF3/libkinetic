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

namespace SOFe\Libkinetic\UI\Group;

use Generator;
use SOFe\Libkinetic\Base\CommandAliasComponent;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\StringAttribute;
use SOFe\Libkinetic\Parser\Attribute\UserStringAttribute;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;
use SOFe\Libkinetic\UI\UiNode;
use SOFe\Libkinetic\UserString;
use function array_map;

class MuxOptionComponent extends KineticComponent{
	/** @var UserString|null */
	protected $displayName;
	/** @var string|null */
	protected $commandName;
	/** @var string[] */
	protected $aliases = [];

	// TODO icon

	public function getDependencies() : Generator{
		yield new UiParentComponent(1, 1);
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("displayName", new UserStringAttribute(), $this->displayName, false);
		$router->use("commandName", new StringAttribute(), $this->commandName, false);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("alias", CommandAliasComponent::class, $this->aliases, 0);
	}

	public function endElement() : void{
		$this->aliases = array_map(function(CommandAliasComponent $component) : string{
			return $component->getText();
		}, $this->aliases);
	}

	public function getDisplayName() : ?UserString{
		return $this->displayName;
	}

	public function getCommandName() : ?string{
		return $this->commandName;
	}

	public function getChild() : UiNode{
		return $this->asUiParentComponent()->getChildren()[0];
	}

	/**
	 * @return string[]
	 */
	public function getAliases() : array{
		return $this->aliases;
	}
}
