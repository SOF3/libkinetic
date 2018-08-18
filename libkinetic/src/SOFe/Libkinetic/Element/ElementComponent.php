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

use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\StringAttribute;

class ElementComponent extends KineticComponent{
	/** @var bool */
	protected $requiresId;

	/** @var string|null */
	protected $id;

	public function __construct(bool $requiresId){
		$this->requiresId = $requiresId;
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("id", new StringAttribute(), $this->id, $this->requiresId);
	}

	public function getId() : ?string{
		return $this->id;
	}
}
