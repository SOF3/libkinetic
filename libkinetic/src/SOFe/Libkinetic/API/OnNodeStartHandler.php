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

interface OnNodeStartHandler{
	/** @var string Signals that the node should be executed normally. Default behaviour if no value is returned. */
	public const ACTION_EXECUTE = "execute";
	/** @var string Signals that the node should skip the execution phase and jump to completion phase. */
	public const ACTION_COMPLETE = "complete";
	/** @var string Signals that the node should skip both the execution phase and the completion phase. */
	public const ACTION_POST_COMPLETE = "postComplete";

	public function onClick(FlowContext $context) : ?Generator;
}
