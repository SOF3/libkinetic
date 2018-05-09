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

namespace SOFe\libkinetic\Node;

use pocketmine\plugin\PluginException;
use SOFe\libkinetic\Icon;
use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\KineticManager;
use function implode;
use function is_array;
use function is_string;
use function strtolower;

class IconNode extends KineticNode implements Icon{
	public const TYPE_CONFIG = "CONFIG";
	public const TYPE_URL = "URL";
	public const TYPE_PATH = "PATH";

	public const TYPES = [
		self::TYPE_CONFIG => self::TYPE_CONFIG,
		self::TYPE_URL => self::TYPE_URL,
		self::TYPE_PATH => self::TYPE_PATH,
	];

	/** @var string */
	protected $type;
	/** @var string */
	protected $value;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if(isset(self::TYPES[$name])){
			if(isset($this->type)){
				throw new InvalidNodeException("Only one of the " . implode("/", self::TYPES) . " attributes can be used", $this);
			}

			$this->type = $name;
			$this->value = $value;
			return true;
		}

		return false;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		if($this->type === self::TYPE_CONFIG){
			$value = $manager->getAdapter()->getKineticConfig($this->value);
			if(is_array($value)){
				if(!isset($value["type"]) ||
					(!isset($value["data"]) && !isset($value["value"])) ||
					($value["type"] !== "url" && $value["type"] !== "path")){
					$manager->getPlugin()->getLogger()->critical("Config problem at $this->value: Correct format should be:\n" .
						"\"type\": \"url\" or \"type\": \"path\"\n" .
						"\"data\": \"url/path here\"");
					throw new PluginException("Invalid config $this->value");
				}
				$this->type = $value["type"];
				$this->value = $value["data"] ?? $value["value"];
				if(!is_string($this->value)){
					$manager->getPlugin()->getLogger()->critical("Config problem at $this->value: Invalid {$this->type} data, should be a string");
					throw new PluginException("Invalid config $this->value");
				}
			}else{
				$this->type = self::TYPE_URL;
				$this->value = $value;
			}
		}else{
			$this->type = strtolower($this->type);
		}
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"type" => $this->type,
				"value" => $this->value,
			];
	}

	public function getType() : string{
		return $this->type;
	}

	public function getValue() : string{
		return $this->value;
	}
}
