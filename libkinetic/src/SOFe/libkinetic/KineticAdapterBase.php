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

namespace SOFe\libkinetic;

use InvalidArgumentException;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use function array_keys;
use function array_map;
use function array_values;
use function str_replace;

trait KineticAdapterBase{
	/** @var Plugin */
	private $plugin;

	/**
	 * @param Plugin $plugin
	 * @internal Only to be called by KineticManager
	 */
	public final function kinetic_setPlugin(Plugin $plugin) : void{
		$this->plugin = $plugin;
	}

	public function hasMessage(string $identifier) : bool{
		return true;
	}

	public function getMessage(?Player $player, string $identifier, array $parameters) : string{
		return str_replace(array_map(function(string $key) : string{
			return "\${{$key}}";
		}, array_keys($parameters)), array_values($parameters), $identifier);
	}

	public function getInstantiable(string $name) : object{
		throw new InvalidArgumentException("Nonexistent instantiable \"$name\"");
	}

	public function getKineticConfig(string $key){
		return $this->plugin->getConfig()->getNested($key);
	}
}
