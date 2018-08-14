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

use const PHP_INT_MAX;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;

class ElementParentComponent extends KineticComponent{
	/** @var bool */
	private $requiresId;
	/** @var int */
	protected $min;
	/** @var int */
	protected $max;

	/** @var ElementInterface[] */
	protected $elements = [];

	public function __construct(bool $requiresId, int $min = 0, int $max = PHP_INT_MAX){
		$this->requiresId = $requiresId;
		$this->min = $min;
		$this->max = $max;
	}

	public function requiresId() : bool{
		return $this->requiresId;
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMultiArgs("label", LabelComponent::class, [$this->requiresId],$this->elements, $this->min, $this->max);
		$router->acceptMultiArgs("label", LabelComponent::class, [$this->requiresId],$this->elements, $this->min, $this->max);
		$router->acceptMultiArgs("label", LabelComponent::class, [$this->requiresId],$this->elements, $this->min, $this->max);
	}

	/**
	 * @return ElementInterface[]
	 */
	public function getElements() : array{
		return $this->elements;
	}
}
