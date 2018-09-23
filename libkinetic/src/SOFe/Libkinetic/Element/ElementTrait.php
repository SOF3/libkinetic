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

namespace SOFe\Libkinetic\Element;

use Generator;
use SOFe\Libkinetic\Flow\FlowCancelledException;
use SOFe\Libkinetic\Flow\FlowContext;
use function assert;
use function microtime;

trait ElementTrait{
	/** @var bool */
	protected $requiresId;
	/** @var array */
	protected $args = [];

	public function __construct(bool $requiresId){
		$this->requiresId = $requiresId;
	}

	public function getDependencies() : Generator{
		yield new ElementComponent($this->requiresId);
	}

	public function requestCli(FlowContext $context, float $expiry) : Generator{
		while(true){
			$timeout = microtime(true) - $expiry;
			if($timeout <= 0.0){
				throw new FlowCancelledException();
			}
			$value = yield $this->requestCliImpl($context, $timeout);
			if($this->parse($context, $value)){
				return $value;
			}
		}
	}

	public function attachArgs(array $args) : ElementInterface{
		$clone = clone $this;
		assert($clone instanceof ElementInterface);
		$clone->args = $args;
		return $clone;
	}

	protected abstract function requestCliImpl(FlowContext $context, float $timeout) : Generator;

	protected abstract function parse(FlowContext $context, &$value) : Generator;
}
