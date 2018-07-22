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

namespace SOFe\Libkinetic\API\Adapter;

use Generator;
use SOFe\Libkinetic\API\RequestValidator;
use SOFe\Libkinetic\API\RequestValidatorG;
use SOFe\Libkinetic\Flow\FlowContext;
use function assert;
use function is_string;

class RequestValidatorAdapter implements RequestValidatorG{
	/** @var RequestValidator */
	private $validator;

	public function __construct(RequestValidator $validator){
		$this->validator = $validator;
	}

	public function validate(FlowContext $context) : Generator{
		0 && yield;
		$error = "";
		$bool = $this->validator->validate($context, $error);
		assert(is_string($error));
		return $bool ? true : $error;
	}
}
