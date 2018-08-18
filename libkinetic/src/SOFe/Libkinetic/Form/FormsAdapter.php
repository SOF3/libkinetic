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

namespace SOFe\Libkinetic\Form;

use Generator;
use pocketmine\Player;

interface FormsAdapter{
	public function sendModalForm(Player $player, string $title, string $text, string $trueText, string $falseText, float $timeout) : Generator;

	public function sendMenuForm(Player $player, string $title, string $text, array $options, float $timeout) : Generator;

	public function sendCustomForm(Player $player, string $title, array $elements, float $timeout) : Generator;
}
