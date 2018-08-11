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

namespace SOFe\Libkinetic\UI;

class UiNodeOutcome{
	public const OUTCOME_SKIP = 3471030473;
	public const OUTCOME_BREAK = 4213740138;
	public const OUTCOME_EXIT = 2728159674;

	/** @var int */
	protected $outcome;
	/** @var string|null */
	protected $target;

	public function __construct(int $outcome = self::OUTCOME_SKIP, ?string $target = null){
		$this->outcome = $outcome;
		$this->target = $target;
	}

	public function getOutcome() : int{
		return $this->outcome;
	}

	public function getTarget() : ?string{
		return $this->target;
	}
}
