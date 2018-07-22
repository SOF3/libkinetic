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

use pocketmine\utils\TextFormat;

/**
 * Some translations are temporarily hardcoded in this class. They are not part of the API, and plugins must not use them. They are not valid user strings in the kinetic file.
 */
final class libkinetic{
	public const MESSAGE_CONT_NIL = "libkinetic.cont.nil";
	public const MESSAGE_CONT_USAGE_HEADER = "libkinetic.cont.usage.header";
	public const MESSAGE_ENUM_ADD_ITEM = "libkinetic.enum-args.add-item";
	public const MESSAGE_GENERIC_USAGE = "libkinetic.generic-usage";
	public const MESSAGE_RUN_IN_GAME_FOR_INDEX = "libkinetic.index.run-in-game";

	public const MESSAGES = [
		self::MESSAGE_CONT_NIL => [
			"en_US" => TextFormat::RED . 'You don\'t have anything to continue.',
		],
		self::MESSAGE_CONT_USAGE_HEADER => [
			"en_US" => TextFormat::RED . 'Usage:',
		],
		self::MESSAGE_ENUM_ADD_ITEM => [
			"en_US" => 'Add Item',
		],
		self::MESSAGE_GENERIC_USAGE => [
			"en_US" => '/${cmd}',
		],
		self::MESSAGE_RUN_IN_GAME_FOR_INDEX => [
			"en_US" => TextFormat::AQUA . 'Run this command in-game to use more features',
		],
	];

	public const GH_RAW = "https://raw.githubusercontent.com/SOF3/libkinetic/master/";

	private static $raw;

	/**
	 * @return bool
	 */
	public static function isShaded() : bool{
		return self::$raw;
	}

	public static function internalInit() : void{
		self::$raw = self::class !== "SOFe\\lib" . "kinetic\\libkinetic";
	}

	public static function getNamespace() : string{
		return __NAMESPACE__;
	}
}

libkinetic::internalInit();
