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

use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;
use SOFe\Libkinetic\UI\Advanced\DynFormComponent;
use SOFe\Libkinetic\UI\Advanced\RecurFormComponent;
use SOFe\Libkinetic\UI\Control\BufferComponent;
use SOFe\Libkinetic\UI\Control\CallComponent;
use SOFe\Libkinetic\UI\Control\ExitComponent;
use SOFe\Libkinetic\UI\Standard\BasicFormComponent;
use SOFe\Libkinetic\UI\Standard\InfoFormComponent;
use SOFe\Libkinetic\UI\Standard\ListFormComponent;
use SOFe\Libkinetic\UI\UiNode;
use SOFe\Libkinetic\Util\ArrayUtil;
use const PHP_INT_MAX;

class UiParentComponent extends KineticComponent{
	/** @var UiNode[] */
	protected $children = [];
	/** @var int */
	protected $min;
	/** @var int */
	protected $max;

	public function __construct(int $min = 0, int $max = PHP_INT_MAX){
		$this->min = $min;
		$this->max = $max;
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$components = [
			"exit" => ExitComponent::class,
			"buffer" => BufferComponent::class,
			"noOp" => BufferComponent::class,
			"call" => CallComponent::class,
			"series" => SeriesComponent::class,
			"mux" => MuxComponent::class,
			"index" => MuxComponent::class,
			"form" => BasicFormComponent::class,
			"list" => ListFormComponent::class,
			"info" => InfoFormComponent::class,
			"recurForm" => RecurFormComponent::class,
			"dynForm" => DynFormComponent::class,
		];

		foreach($components as $name => $class){
			$router->acceptMulti($name, $class, $this->children, $this->min, $this->max);
		}
	}

	public function endElement() : void{
		$i = 0;
		$this->children = ArrayUtil::indexByProperty($this->children, function(UiNode $node) use (&$i): string{
			return $node->getNode()->asIdComponent()->getId() ?? "libkinetic.internal.unnamedComponent#" . ($i++);
		});
	}

	/**
	 * @return UiNode[]
	 */
	public function getChildren() : array{
		return $this->children;
	}
}
