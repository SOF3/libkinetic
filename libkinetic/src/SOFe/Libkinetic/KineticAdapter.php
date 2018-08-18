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

namespace SOFe\Libkinetic;

use InvalidArgumentException;
use pocketmine\command\CommandSender;

interface KineticAdapter{
	/**
	 * @param string $identifier
	 *
	 * @return bool
	 */
	public function hasMessage(string $identifier) : bool;

	/**
	 * @param CommandSender|null $sender
	 * @param string             $identifier
	 * @param mixed[]            $parameters
	 *
	 * @return string
	 *
	 * @throws InvalidArgumentException
	 */
	public function getMessage(?CommandSender $sender, string $identifier, array $parameters) : string;

	public function getController(string $name) : object;

	/**
	 * @param string $key
	 *
	 * @return mixed
	 */
	public function getKineticConfig(string $key);
}
