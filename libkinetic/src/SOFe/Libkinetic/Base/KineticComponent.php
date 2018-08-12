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
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\Parser\Router\AttributeRouter;
use SOFe\Libkinetic\Parser\Router\ChildNodeRouter;
use SOFe\Libkinetic\Util\GeneratorUtil;
use function get_class;

abstract class KineticComponent{
	use ComponentAdapter;

	/** @var KineticNode */
	protected $node;
	/** @var KineticManager */
	protected $manager;

	public function acceptAttributes(AttributeRouter $router) : void{
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
	}

	public function endElement() : void{
	}

	public function acceptText(string $text) : bool{
		return false;
	}

	public function resolve() : void{
	}

	public function init() : void{
	}

	public function getDependencies() : Generator{
		return GeneratorUtil::empty();
	}

	/**
	 * If multiple components in the node require components of the same getComponentClass(), this method will be invoked
	 * on the older object (which one is older is very difficult to define, though). This method should return $this if
	 * the new required component can be safely ignored, or return $that if the new required component can safely replace
	 * $this, or return null to trigger an error.
	 *
	 * @param KineticComponent $that
	 * @return null|KineticComponent
	 */
	public function thisOrThat(KineticComponent $that) : ?KineticComponent{
		return $this;
	}

	public function getComponentClass() : string{
		return get_class($this);
	}

	public function getNode() : KineticNode{
		return $this->node;
	}

	public function getManager() : KineticManager{
		return $this->manager;
	}

	public final function internalInitNode(KineticNode $node) : void{
		$this->node = $node;
	}

	public final function internalInitManager(KineticManager $manager) : void{
		$this->manager = $manager;
	}

	public function getComponent(string $class) : KineticComponent{
		return $this->node->getComponent($class);
	}
}
