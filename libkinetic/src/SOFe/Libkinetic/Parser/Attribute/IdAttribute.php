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

use SOFe\Libkinetic\Base\IdComponent;
use SOFe\Libkinetic\Base\KineticNode;
use function array_reverse;
use function implode;
use function strpos;
use function substr;

class IdAttribute extends NodeAttribute{
	public function accept(KineticNode $node, string $value) : string{
		if(strpos($value, ".") !== 0){
			return $value;
		}

		$parts = [substr($value, 1)];
		for($parent = $node->getParent(); $parent !== null; $parent = $parent->getParent()){
			if($parent->hasComponent(IdComponent::class) && $parent->asIdComponent()->getId() !== null){
				$parts[] = $parent->asIdComponent()->getId();
			}
		}
		return implode(".", array_reverse($parts));
	}
}
