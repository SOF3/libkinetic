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

namespace SOFe\Libkinetic\Parser\Router;

use SOFe\Libkinetic\Base\KineticNode;
use function mb_strtolower;

class BooleanAttribute extends NodeAttribute{
	public function accept(KineticNode $node, string $value){
		$value = mb_strtolower($value);
		if($value === "true" || $value === "1" || $value === "i" || $value === "on" || $value === "y" || $value === "yes"){
			return true;
		}
		if($value === "false" || $value === "0" || $value === "o" || $value === "off" || $value === "n" || $value === "no"){
			return false;
		}
		throw $node->throw("Not a boolean value");
	}
}
