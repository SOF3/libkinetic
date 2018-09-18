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

namespace SOFe\Libkinetic\Hybrid;

use Generator;
use pocketmine\Player;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\UI\Standard\IconListEntry;

interface FormsAdapter{
	public function sendModalForm(Player $player, string $title, string $text, string $trueText, string $falseText, float $timeout) : Generator;

	/**
	 * @param FlowContext     $context
	 * @param Player          $player
	 * @param string          $title
	 * @param string          $text
	 * @param IconListEntry[] $options
	 * @param float           $timeout
	 *
	 * @return Generator
	 */
	public function sendMenuForm(FlowContext $context, Player $player, string $title, string $text, array $options, float $timeout) : Generator;

	public function sendCustomForm(FlowContext $context, Player $player, string $title, array $elements, float $timeout) : Generator;
}
