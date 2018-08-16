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

namespace SOFe\Libkinetic\Util;

use InvalidArgumentException;

final class ArrayUtil{
	public static function indexByProperty(array $array, callable $toIndex) : array{
		$output = [];
		foreach($array as $value){
			$index = $toIndex($value);
			if(isset($output[$index])){
				throw new InvalidArgumentException("Duplicate index $index");
			}
			$output[$index] = $value;
		}
		return $output;
	}

	private function __construct(){
	}
}
