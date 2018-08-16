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

namespace SOFe\Libkinetic\API;

use Generator;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\UI\UiNodeOutcome;

interface UiNodeStateHandler{
	public const STATE_START = 1747818303; // crc32("START")
	public const STATE_NIL = 3683942447;
	public const STATE_EXECUTE = 3223776964;
	public const STATE_COMPLETE = 2220117103;
	public const STATE_SKIP = UiNodeOutcome::OUTCOME_SKIP;
	public const STATE_BREAK = UiNodeOutcome::OUTCOME_BREAK;
	public const STATE_EXIT = UiNodeOutcome::OUTCOME_EXIT;

	public const ALL_STATES = [
		"start" => self::STATE_START,
		"nil" => self::STATE_NIL,
		"execute" => self::STATE_EXECUTE,
		"complete" => self::STATE_COMPLETE,
		"skip" => self::STATE_SKIP,
		"break" => self::STATE_BREAK,
		"exit" => self::STATE_EXIT,
	];

	/**
	 * The generator returns one of the STATE_* constants, or an array [0 => STATE_*, 1 => target]. See the UiNode
	 * article in the wiki for explanation.
	 *
	 * @param FlowContext $context
	 * @return Generator
	 */
	public function onStartComplete(FlowContext $context) : Generator;
}
