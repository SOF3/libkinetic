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

use Generator;

class GeneratorUtil extends \SOFe\AwaitGenerator\GeneratorUtil{
	/**
	 * @param Generator  $generator
	 * @param mixed[][] &$yields
	 * @param null       $send
	 *
	 * @return mixed
	 */
	public static function resolveKeyValuePairs(Generator $generator, &$yields, $send = null){
		$yields = [];
		$generator->rewind();
		while($generator->valid()){
			$yields[] = [$generator->key(), $generator->current()];
			$generator->send($send);
		}
		return $generator->getReturn();
	}

	/**
	 * @param Generator  $generator
	 * @param mixed[]   &$yields
	 * @param null       $send
	 *
	 * @return mixed
	 */
	public static function resolveKeys(Generator $generator, &$yields, $send = null){
		/** @noinspection PhpParamsInspection */
		$ret = self::resolveKeyValuePairs($generator, $yields, $send);
		foreach($yields as &$value){
			$value = $value[0];
		}
		return $ret;
	}

	/**
	 * @param Generator  $generator
	 * @param mixed[]   &$yields
	 * @param null       $send
	 *
	 * @return mixed
	 */
	public static function resolveValues(Generator $generator, &$yields, $send = null){
		/** @noinspection PhpParamsInspection */
		$ret = self::resolveKeyValuePairs($generator, $yields, $send);
		foreach($yields as &$value){
			$value = $value[1];
		}
		return $ret;
	}
}
