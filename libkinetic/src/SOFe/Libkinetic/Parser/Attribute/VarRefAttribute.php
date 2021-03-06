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

namespace SOFe\Libkinetic\Parser\Attribute;

use SOFe\Libkinetic\Base\KineticNode;
use SOFe\Libkinetic\UI\Group\UiGroupComponent;
use function assert;
use function explode;
use function str_repeat;

class VarRefAttribute extends ResolvableNodeAttribute{
	/** @var null|string */
	private $type;
	/** @var int */
	private $listLevels;

	public function __construct(?string $type = null, int $listLevels = 0){
		$this->type = $type;
		$this->listLevels = $listLevels;
	}

	public function accept(KineticNode $node, string $value) : string{
		return $value;
	}

	public function resolve(KineticNode $leaf, $tempValue) : string{
		$parts = explode(".", $tempValue);

		$ok = false;
		for($node = $leaf; !$node->isRoot(); $node = $node->getParent()){
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
			throw $leaf->throw("Unresolved variable $tempValue");
		}
		assert(isset($var));
		if($this->type !== null){
			if($this->type !== $var->getType() || $this->listLevels !== $var->getListLevels()){
				$type = str_repeat("list:", $this->listLevels) . $this->type;
				throw $leaf->throw("Expected reference to variable of type $type, got {$var->getType()}");
			}
		}

		return $tempValue;
	}
}
