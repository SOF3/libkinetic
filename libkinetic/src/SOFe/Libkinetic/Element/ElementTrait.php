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
use SOFe\Libkinetic\Base\KineticNode;
use SOFe\Libkinetic\Flow\FlowContext;
use function microtime;

trait ElementTrait{
	/** @var bool */
	protected $requiresId;

	public abstract function getNode() : KineticNode;

	public function __construct(bool $requiresId){
		$this->requiresId = $requiresId;
	}

	public function getDependencies() : Generator{
		yield new ElementComponent($this->requiresId);
	}

	public function requestCli(FlowContext $context, float $expiry) : Generator{
		while(true){
			$value = yield $this->requestCliImpl($context, microtime(true) - $expiry);
			if($this->parse($context, $value)){
				return $value;
			}
		}
	}

	protected abstract function requestCliImpl(FlowContext $context, float $timeout) : Generator;

	protected abstract function parse(FlowContext $context, &$value) : Generator;
}
