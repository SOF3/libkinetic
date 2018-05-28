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

namespace SOFe\Libkinetic\Clickable\Argument;

use Iterator;
use SOFe\Libkinetic\Element\ElementParentComponent;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\WindowComponent;

class SimpleArgsComponent extends KineticComponent implements ArgsInterface{
	/** @var string|null */
	protected $groupId = null;

	public function dependsComponents() : Iterator{
		yield ArgsComponent::class;
		yield WindowComponent::class;
		yield ElementParentComponent::class;
	}

	public function setAttribute(string $name, string $value) : bool{
		if($name === "ID"){
			$this->groupId = $value;
			return true;
		}
		return false;
	}
}
