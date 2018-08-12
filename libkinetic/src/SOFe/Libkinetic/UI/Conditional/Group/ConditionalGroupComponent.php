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

namespace SOFe\Libkinetic\UI\Conditional\Group;

use function assert;
use Generator;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Router\AttributeRouter;
use SOFe\Libkinetic\Parser\Router\BooleanAttribute;
use SOFe\Libkinetic\UI\Conditional\ConditionalComponent;
use SOFe\Libkinetic\UI\Conditional\ConditionalParentComponent;
use const PHP_INT_MAX;
use SOFe\Libkinetic\UI\NodeState\BaseUiNodeStateComponent;

class ConditionalGroupComponent extends KineticComponent{
	/** @var bool */
	protected $canShortCircuit;
	/** @var int */
	private $min;
	/** @var int */
	private $max;
	/** @var bool */
	protected $shortCircuit;

	public function __construct(bool $canShortCircuit, bool $defaultShortCircuit = true, int $min = 0, int $max = PHP_INT_MAX){
		$this->canShortCircuit = $canShortCircuit;
		$this->min = $min;
		$this->max = $max;

		$this->shortCircuit = $defaultShortCircuit;
	}

	public function getDependencies() : Generator{
		$parent = $this->getNode()->getParent();
		assert($parent !== null);
		yield new ConditionalComponent($parent->hasComponent(BaseUiNodeStateComponent::class));
		yield new ConditionalParentComponent($this->min, $this->max);
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		if($this->canShortCircuit){
			$router->use("shortCircuit", new BooleanAttribute(), $this->shortCircuit, false);
		}
	}

	public function isShortCircuit() : bool{
		return $this->shortCircuit;
	}
}
