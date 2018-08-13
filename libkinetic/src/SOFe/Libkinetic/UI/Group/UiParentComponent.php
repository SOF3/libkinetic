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
use SOFe\Libkinetic\UI\UiNode;
use SOFe\Libkinetic\Util\ArrayUtil;

class UiParentComponent extends KineticComponent{
	/** @var UiNode[] */
	protected $children = [];

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("series", SeriesComponent::class, $this->children, 0);
		$router->acceptMulti("mux", MuxComponent::class, $this->children, 0);
		$router->acceptMulti("index", IndexComponent::class, $this->children, 0);
	}

	public function endElement() : void{
		$i = 0;
		$this->children = ArrayUtil::indexByProperty($this->children, function(UiGroup $group) use (&$i): string{
			return $group->getNode()->asIdComponent()->getId() ?? "libkinetic.internal.unnamedComponent#" . ($i++);
		});
	}

	/**
	 * @return UiGroup[]
	 */
	public function getChildren() : array{
		return $this->children;
	}
}
