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

namespace SOFe\Libkinetic\Base;

use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\StringAttribute;
use SOFe\Libkinetic\Parser\Child\Attribute\Configurable;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;

class CommandComponent extends KineticComponent{
	/** @var string */
	protected $name;
	/** @var AliasComponent[] */
	protected $aliases = [];

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("name", new Configurable(new StringAttribute()), $this->name, true);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("alias", AliasComponent::class, $this->aliases, 0);
	}

	public function getName() : string{
		return $this->name;
	}

	public function getAliases() : array{
		return $this->aliases;
	}
}
