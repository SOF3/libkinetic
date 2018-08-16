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
	public const MESSAGE_CONT_DESC = "libkinetic.cont.desc";
	public const MESSAGE_CONT_USAGE = "libkinetic.cont.usage";
	public const MESSAGE_CONT_NIL = "libkinetic.cont.nil";
	public const MESSAGE_LIST_TITLE_CLI = "libkinetic.list.title.cli";
	public const MESSAGE_LIST_SYNOPSIS_CLI = "libkinetic.list.synopsis.cli";
	public const MESSAGE_LIST_OPTION_CLI = "libkinetic.list.option.cli";

	public const MESSAGES = [
		self::MESSAGE_CONT_DESC => [
			"en_US" =>  'A special command. You will be told to use this command when you need to.',
		],
		self::MESSAGE_CONT_USAGE=> [
			"en_US" =>'/${alias} <value>',
		],
		self::MESSAGE_CONT_NIL => [
			"en_US" => TextFormat::RED . 'You don\'t have anything to continue.',
		],
		self::MESSAGE_LIST_TITLE_CLI => [
			"en_US" => TextFormat::BOLD . '${title}',
		],
		self::MESSAGE_LIST_SYNOPSIS_CLI => [
			"en_US" => '${synopsis}',
		],
		self::MESSAGE_LIST_OPTION_CLI => [
			"en_US" => TextFormat::LIGHT_PURPLE . '${mnemonic}' . TextFormat::GRAY . ' => ' . TextFormat::WHITE . '${display}',
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
