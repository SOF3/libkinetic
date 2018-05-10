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

final class libkinetic{
	public const MESSAGES = [
		"libkinetic.enum-args.add-item" => [
			"en_US" => "Add Item"
		]
	];

	private static $raw;

	public static function isRaw() : bool{
		return self::$raw;
	}

	public static function internalInit() : void{
		self::$raw = self::class !== "SOFe\\libkinetic\\libkinetic";
	}

	public static function getNamespace() : string{
		return __NAMESPACE__;
	}
}

libkinetic::internalInit();
