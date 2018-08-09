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

namespace SOFe\Libkinetic\UI\Entry;

use SOFe\Libkinetic\API\StringInputAdapter;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Router\AttributeRouter;
use SOFe\Libkinetic\Parser\Router\BooleanAttribute;
use SOFe\Libkinetic\Parser\Router\ControllerAttribute;
use SOFe\Libkinetic\Parser\Router\StringEnumAttribute;
use SOFe\Libkinetic\Parser\Router\UserStringAttribute;

class ArgComponent extends KineticComponent{
	protected $name;
	protected $required = true;
	protected $type = "string";
	/** @var StringInputAdapter|null */
	protected $adapter = null;

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("name", new UserStringAttribute(), $this->name, true);
		$router->use("required", new BooleanAttribute(), $this->required, false);
		$router->use("type", new StringEnumAttribute([
			"string",
			"int",
			"float",
			"boolean",
		], true), $this->type, false);
		$router->use("adapter", new ControllerAttribute(StringInputAdapter::class, []), $this->adapter, false);
	}
}
