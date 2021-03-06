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

namespace SOFe\Libkinetic\Variable;

use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\StringAttribute;
use SOFe\Libkinetic\Parser\Attribute\VarRefAttribute;
use SOFe\Libkinetic\UI\Group\UiGroupComponent;

class ReturnComponent extends KineticComponent{
	/** @var string */
	protected $name;
	/** @var string */
	protected $as = null;

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("name", new StringAttribute(), $this->name, true);
		$router->use("as", new VarRefAttribute(), $this->as, true);
	}

	public function endElement() : void{
		if($this->as === null){
			$this->as = $this->name;
		}
	}

	public function resolve() : void{
		$parts = explode(".", $this->as);

		$ok = false;
		for($node = $this->node; !$node->isRoot(); $node = $node->getParent()){
			if($node->hasComponent(UiGroupComponent::class)){
				$vars = $node->asUiGroupComponent()->getVars();
				foreach($vars as $var){
					if($var->getName() === $parts[0] && $var->declaresChild($parts)){
						$ok = true;
						break 2;
					}
				}
			}
		}

		if(!$ok){
			$this->node->throw("Unresolved variable {$this->as}");
		}
	}

	public function getName() : string{
		return $this->name;
	}

	public function getAs() : string{
		return $this->as;
	}
}
