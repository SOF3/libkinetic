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

namespace SOFe\Libkinetic\UI\NodeState;

use Generator;
use const PHP_INT_MAX;
use SOFe\Libkinetic\API\UiNodeStateHandler;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;
use SOFe\Libkinetic\UI\Conditional\ConditionalParentComponent;

class BaseUiNodeStateComponent extends KineticComponent{
	/** @var UiNodeStateHandler[] */
	protected $handlers = [];

	public function getDependencies() : Generator{
		yield new ConditionalParentComponent(0, PHP_INT_MAX, $this->handlers);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("controller", UiNodeStateControllerComponent::class, $this->handlers, 0);
	}

	/**
	 * @return UiNodeStateHandler[]
	 */
	public function &getHandlers() : array{
		return $this->handlers;
	}
}
