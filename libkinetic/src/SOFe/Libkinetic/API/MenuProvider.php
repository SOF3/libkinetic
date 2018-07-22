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

interface MenuProvider{
	public const FLAG_ICON = "flag:icon";

	/**
	 * Returns a generator that yields the represented variable as keys and the option display text as values.
	 *
	 * Each key can have any data type compatible with the receiver.
	 *
	 * Each value can be a string or a TextContainer. It can also be an array where the first item (index 0) is a string
	 * or a TextContainer, and the following items are modifiers for this value. Modifiers can be used as the value if no
	 * value is required, or used as the key if a value is required.
	 *
	 * Allowed modifiers:
	 * @see MenuProvider::FLAG_ICON Use this as the key and the Icon object as the value to provide the menu option's
	 *                              icon.
	 *
	 * @param FlowContext $context
	 * @return Generator
	 */
	public function provide(FlowContext $context) : Generator;
}
