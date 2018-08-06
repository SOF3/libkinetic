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

interface UiNodeStateHandler{
	public const STATE_START = "start";
	public const STATE_NIL = "nil";
	public const STATE_EXECUTE = "execute";
	public const STATE_COMPLETE = "complete";
	public const STATE_SKIP = "skip";
	public const STATE_BREAK = "break";
	public const STATE_EXIT = "exit";

	public const ALL_STATES = [
		self::STATE_START,
		self::STATE_NIL,
		self::STATE_EXECUTE,
		self::STATE_COMPLETE,
		self::STATE_SKIP,
		self::STATE_BREAK,
		self::STATE_EXIT,
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
