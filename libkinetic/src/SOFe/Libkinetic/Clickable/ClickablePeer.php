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

namespace SOFe\Libkinetic\Clickable;

use SOFe\Libkinetic\WindowRequest;

interface ClickablePeer{
	public const PRIORITY_EARLIER = 2;
	public const PRIORITY_EARLY = 1;
	public const PRIORITY_NORMAL = 0;
	public const PRIORITY_LATE = -1;
	public const PRIORITY_LATER = -2;

	public function onClick(WindowRequest $request) : bool;

	public function getPriority() : int;
}
