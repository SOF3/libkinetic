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

use Generator;
use SOFe\Libkinetic\Parser\Router\AttributeRouter;
use SOFe\Libkinetic\Parser\Router\ChildNodeRouter;
use SOFe\Libkinetic\Parser\Router\StringAttribute;
use SOFe\Libkinetic\UI\Group\UiParentComponent;
use SOFe\Libkinetic\Wizard\WizardComponent;

class RootComponent extends KineticComponent{
	/** @var string */
	protected $namespace;
	/** @var IncludeComponent[] */
	protected $includes = [];
	/** @var CommandComponent */
	protected $cont = null;
	/** @var WizardComponent[] */
	protected $wizards = [];

	public function getDependencies() : Generator{
		yield UiParentComponent::class;
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("namespace", new StringAttribute(), $this->namespace, true);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("include", IncludeComponent::class, $this->includes, 0);
		$router->acceptSingle("cont", CommandComponent::class, $this->cont, true);
		$router->acceptMulti("wizard", WizardComponent::class, $this->wizards, 0);
	}
}