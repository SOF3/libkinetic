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
use function implode;
use function mb_strtolower;

class StringEnumAttribute extends NodeAttribute{
	/** @var string[] */
	protected $enum = [];
	/** @var bool */
	private $noCase;

	public function __construct(array $enum, bool $noCase = false){
		$this->noCase = $noCase;
		foreach($enum as $string){
			$this->enum[$noCase ? mb_strtolower($string) : $string] = $string;
		}
	}

	public function accept(KineticNode $node, string $value) : string{
		$corrected = $this->noCase ? mb_strtolower($value) : $value;
		if(!isset($this->enum[$corrected])){
			throw $node->throw("$value is not one of [" . implode(", ", $this->enum) . "]");
		}
		return $this->enum[$corrected];
	}
}
