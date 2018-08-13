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

use Generator;
use SOFe\Libkinetic\API\ArgumentAssigner;
use SOFe\Libkinetic\API\CommandValidator;
use SOFe\Libkinetic\Base\CommandComponent;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\ControllerAttribute;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;

class EntryCommandComponent extends KineticComponent{
	/** @var ArgumentAssigner|null */
	protected $assigner;
	/** @var CommandValidator|null */
	protected $validator;

	/** @var OverloadComponent[] */
	protected $overloads = [];
	/** @var ArgComponent[] */
	protected $single = [];

	public function getDependencies() : Generator{
		yield CommandComponent::class;
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("assigner", new ControllerAttribute(ArgumentAssigner::class, []), $this->assigner, false);
		$router->use("validator", new ControllerAttribute(CommandValidator::class, []), $this->validator, false);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("overload", OverloadComponent::class, $this->overloads, 0);
		$router->acceptMulti("arg", ArgComponent::class, $this->single, 0);
	}

	public function endElement() : void{
		if(!empty($this->single) && !empty($this->overloads)){
			throw $this->node->throw("Use either <overload> or <arg> in a <command>, not both");
		}
	}
}
