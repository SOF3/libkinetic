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

namespace SOFe\Libkinetic\Util;

use function mb_strlen;
use function mb_strpos;
use function mb_strtolower;
use function mb_substr;
use function strlen;

final class StringUtil{
	public static $TIME_UNITS = [
		"ms" => 0.001,
		"millisecond" => 0.001,
		"milliseconds" => 0.001,
		"毫粆" => 0.001,
		"s" => 1,
		"sec" => 1,
		"second" => 1,
		"seconds" => 1,
		"秒" => 1,
		"m" => 60,
		"min" => 60,
		"minute" => 60,
		"minutes" => 60,
		"分" => 60,
		"分鐘" => 60,
		"h" => 3600,
		"hr" => 3600,
		"hrs" => 3600,
		"hour" => 3600,
		"hours" => 3600,
		"小時" => 3600,
		"d" => 86400,
		"day" => 86400,
		"days" => 86400,
		"日" => 86400,
		"天" => 86400,
		"w" => 604800,
		"wk" => 604800,
		"wks" => 604800,
		"week" => 604800,
		"weeks" => 604800,
		"週" => 604800,
		"周" => 604800,
		"星期" => 604800,
		"fn" => 1209600,
		"ftn" => 1209600,
		"fortnight" => 1209600,
		"month" => 2592000,
		"months" => 2592000,
		"月" => 2592000,
		"season" => 7889184,
		"季" => 7889184,
		"y" => 31556736,
		"yr" => 31556736,
		"yrs" => 31556736,
		"year" => 31556736,
		"years" => 31556736,
		"年" => 31556736,
		"dec" => 315567360,
		"decade" => 315567360,
		"decades" => 315567360,
		"年代" => 315567360,
		"cent" => 3155673600,
		"century" => 3155673600,
		"centuries" => 3155673600,
		"世紀" => 3155673600,
		"millennium" => 31556736000,
		"millenniums" => 31556736000,
		"millennia" => 31556736000,
	];

	public static function parseDuration(string $time, float $defaultUnit = 1.0) : float{
		$time = mb_strtolower($time);
		if($time === "never"){
			return INF;
		}
		if($time === "immediate"){
			return 0.0;
		}
		$totalLength = 0.0;
		$currentNumber = "";
		/** @noinspection ForeachInvariantsInspection */
		for($i = 0, $iMax = mb_strlen($time); $i < $iMax; ++$i){
			$char = mb_substr($time, $i, 1);
			if($char === "." || (strlen($char) === 1 && '0' <= $char && $char <= '9')){
				$currentNumber .= $char;
				continue;
			}
			foreach(self::$TIME_UNITS as $unitName => $unit){
				if(mb_strpos($time, $unitName, $i) === $i){
					$totalLength += ((float) $currentNumber) * $unit;
					$currentNumber = "";
					$i += mb_strlen($unitName) - 1;
					continue 2; // next word
				}
			}
		}
		if($currentNumber !== ""){
			$totalLength += ((float) $currentNumber) * $defaultUnit;
		}
		return $totalLength;
	}

	private function __construct(){
	}
}
