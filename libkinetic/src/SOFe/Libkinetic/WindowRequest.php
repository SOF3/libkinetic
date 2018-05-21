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

use pocketmine\command\CommandSender;
use pocketmine\Player;
use function assert;
use function get_class;
use function gettype;
use function is_bool;
use function is_float;
use function is_int;
use function is_object;
use function is_string;

class WindowRequest{
	/** @var KineticManager */
	private $manager;
	/** @var Player */
	private $sender;
	private $local = [];
	private $inherit = [];

	public function __construct(KineticManager $manager, CommandSender $sender){
		$this->manager = $manager;
		$this->sender = $sender;
	}

	public function getBoolean(string $key) : bool{
		$value = $this->local[$key] ?? $this->inherit[$key] ?? null;

		assert($value !== null, "Undefined kinetic config $key");
		assert(is_bool($value), "Kinetic config $key has type " . gettype($value) . ", attempted to get as bool");

		return $value;
	}

	public function getInt(string $key) : int{
		$value = $this->local[$key] ?? $this->inherit[$key] ?? null;

		assert($value !== null, "Undefined kinetic config $key");
		assert(is_int($value), "Kinetic config $key has type " . gettype($value) . ", attempted to get as int");

		return $value;
	}

	public function getString(string $key) : string{
		$value = $this->local[$key] ?? $this->inherit[$key] ?? null;

		assert($value !== null, "Undefined kinetic config $key");
		assert(is_string($value), "Kinetic config $key has type " . gettype($value) . ", attempted to get as string");

		return $value;
	}

	public function getFloat(string $key) : float{
		$value = $this->local[$key] ?? $this->inherit[$key] ?? null;

		assert($value !== null, "Undefined kinetic config $key");
		assert(is_float($value), "Kinetic config $key has type " . gettype($value) . ", attempted to get as float");

		return $value;
	}

	public function getObject(string $key, string $class) : object{
		$value = $this->local[$key] ?? $this->inherit[$key] ?? null;

		assert($value !== null, "Undefined kinetic config $key");
		assert(is_object($value), "Kinetic config $key has type " . gettype($value) . ", attempted to get as object");
		assert($value instanceof $class, "Kinetic config $key has type " . get_class($value) . ", attempted to get as $class");

		return $value;
	}

	public function hasKey(string $key) : bool{
		return isset($this->local[$key]) || isset($this->inherit[$key]);
	}

	public function put(bool $local, string $key, $value) : void{
		if($local){
			$this->local[$key] = $value;
		}else{
			$this->inherit[$key] = $value;
		}
	}

	public function push() : WindowRequest{
		$request = new WindowRequest($this->manager, $this->sender);
		$request->inherit = $this->inherit;
		return $request;
	}


	public function getManager() : KineticManager{
		return $this->manager;
	}

	public function getSender() : CommandSender{
		return $this->sender;
	}

	public function translate(?string $message) : string{
		return $message !== "" && $message !== null ? $this->manager->translate($this->sender, $message, $this->local + $this->inherit) : "";
	}
}
