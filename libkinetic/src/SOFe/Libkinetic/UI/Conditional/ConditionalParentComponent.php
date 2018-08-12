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

namespace SOFe\Libkinetic\UI\Conditional;

use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Router\ChildNodeRouter;
use SOFe\Libkinetic\UI\Conditional\Group\AndComponent;
use SOFe\Libkinetic\UI\Conditional\Group\OrComponent;
use SOFe\Libkinetic\UI\Conditional\Group\XorComponent;
use const PHP_INT_MAX;

class ConditionalParentComponent extends KineticComponent{
	/** @var int */
	protected $min, $max;

	/** @var ConditionalNodeInterface[] */
	protected $predicates = [];

	public function __construct(int $min = 0, int $max = PHP_INT_MAX){
		$this->min = $min;
		$this->max = $max;
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("or", OrComponent::class, $this->predicates, $this->min, $this->max);
		$router->acceptMulti("and", AndComponent::class, $this->predicates, $this->min, $this->max);
		$router->acceptMulti("xor", XorComponent::class, $this->predicates, $this->min, $this->max);

		$router->acceptMulti("predicate", ControllerConditionalComponent::class, $this->predicates, $this->min, $this->max);
		$router->acceptMulti("hasVar", HasVarConditionalComponent::class, $this->predicates, $this->min, $this->max);
		$router->acceptMulti("permission", PermissionConditionalComponent::class, $this->predicates, $this->min, $this->max);
		$router->acceptMulti("const", ConstConditionalComponent::class, $this->predicates, $this->min, $this->max);
	}

	/**
	 * @return ConditionalNodeInterface[]
	 */
	public function getPredicates() : array{
		return $this->predicates;
	}
}
