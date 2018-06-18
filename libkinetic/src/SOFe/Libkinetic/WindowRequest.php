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
use pocketmine\Player;
use function array_slice;
use function assert;
use function explode;
use function get_class;
use function gettype;
use function is_array;
use function is_bool;
use function is_float;
use function is_int;
use function is_object;
use function is_string;

class WindowRequest{
	/** @var KineticManager */
	private $manager;
	/** @var Player */
	private $user;
	private $local = [];
	private $inherit = [];

	public function __construct(KineticManager $manager, CommandSender $user){
		$this->manager = $manager;
		$this->user = $user;
	}

	public function getBoolean(string $key) : bool{
		$value = $this->getValue($key);

		assert($value !== null, "Undefined kinetic config $key");
		assert(is_bool($value), "Kinetic config $key has type " . gettype($value) . ", attempted to get as bool");

		return $value;
	}

	public function getInt(string $key) : int{
		$value = $this->getValue($key);

		assert($value !== null, "Undefined kinetic config $key");
		assert(is_int($value), "Kinetic config $key has type " . gettype($value) . ", attempted to get as int");

		return $value;
	}

	public function getString(string $key) : string{
		$value = $this->getValue($key);

		assert($value !== null, "Undefined kinetic config $key");
		assert(is_string($value), "Kinetic config $key has type " . gettype($value) . ", attempted to get as string");

		return $value;
	}

	public function getFloat(string $key) : float{
		$value = $this->getValue($key);

		assert($value !== null, "Undefined kinetic config $key");
		assert(is_float($value), "Kinetic config $key has type " . gettype($value) . ", attempted to get as float");

		return $value;
	}

	public function getObject(string $key, string $class) : object{
		$value = $this->getValue($key);

		assert($value !== null, "Undefined kinetic config $key");
		assert(is_object($value), "Kinetic config $key has type " . gettype($value) . ", attempted to get as object");
		assert($value instanceof $class, "Kinetic config $key has type " . get_class($value) . ", attempted to get as $class");

		return $value;
	}

	protected function getValue(string $key){
		$keyParts = explode(".", $key);
		foreach([$this->local, $this->inherit] as $array){
			foreach($keyParts as $keyPart){
				if(!is_array($array)){
					throw new InvalidArgumentException("Encountered non-array value while diving into multi-dimensional array");
				}
				if(!isset($array[$keyPart])){
					continue 2;
				}
				$array = $array[$keyPart];
			}
			return $array;
		}
		return null;
	}

	public function hasKey(string $key) : bool{
		return $this->getValue($key) !== null;
	}

	public function put(bool $local, string $key, $value) : void{
		if($value === null){
			throw new InvalidArgumentException("Cannot put null value");
		}

		if($local){
			$array =& $this->local;
		}else{
			$array =& $this->inherit;
		}
		/** @var string[] $keyParts */
		$keyParts = explode(".", $key);
		foreach(array_slice($keyParts, 0, -1) as $keyPart){
			if(!isset($array[$keyPart])){
				$array[$keyPart] = [];
			}elseif(!is_array($array[$keyPart])){
				throw new InvalidArgumentException("Encountered non-array value while diving into multi-dimensional array");
			}
			$array =& $array[$keyPart];
		}
		/** @var mixed $last */
		$last = array_slice($keyParts, -1)[0];
		$array[$last] = null;
	}

	public function push() : WindowRequest{
		$request = new WindowRequest($this->manager, $this->user);
		$request->inherit = $this->inherit;
		return $request;
	}


	public function getManager() : KineticManager{
		return $this->manager;
	}

	public function getUser() : CommandSender{
		return $this->user;
	}

	public function translate(?string $message, array $args = []) : string{
		return $message !== "" && $message !== null ? $this->manager->translate($this->user, $message, $args + $this->local + $this->inherit) : "";
	}

	public function send(?string $message, array $args = []) : void{
		$this->user->sendMessage($this->translate($message, $args));
	}
}
