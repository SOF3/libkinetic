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

namespace SOFe\Libkinetic\UI\Control;

use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\VarRefAttribute;

class CallParamComponent extends KineticComponent{
	/** @var string */
	protected $var;
	/** @var string */
	protected $as;

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("var", new VarRefAttribute(), $this->var, true);
		$router->use("as", new VarRefAttribute(), $this->as, false);
	}

	public function endElement() : void{
		$this->as = $this->as ?? $this->var;
	}

	public function getVar() : string{
		return $this->var;
	}

	public function getAs() : string{
		return $this->as;
	}
}
