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

/**
 * Some translations are temporarily hardcoded in this class. They are not part of the API, and plugins must not use them. They are not valid user strings in the kinetic file.
 */
final class libkinetic{

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
