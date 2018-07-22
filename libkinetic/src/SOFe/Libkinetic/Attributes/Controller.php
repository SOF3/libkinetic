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

namespace SOFe\Libkinetic\Attributes;

use SOFe\Libkinetic\Base\KineticNode;

class Controller extends ResolvableNodeAttribute{
	/** @var string */
	protected $interface;
	/** @var callable[] */
	protected $adapters;

	/**
	 * Controller constructor.
	 * @param string     $interface FQN of the interface to implement
	 * @param callable[] $adapters  an associative array. Each key is the FQN of another interface, and the value is a callable that maps an instance of the key to an instance of $interface.
	 */
	public function __construct(string $interface, array $adapters){
		$this->interface = $interface;
		$this->adapters = $adapters;
	}

	public function accept(KineticNode $node, string $value){
		return $value;
	}

	public function resolve(KineticNode $node, $tempValue) : ?object{
		return $node->getManager()->resolveClass($node, $tempValue, $this->interface, $this->adapters); // TODO provide namespace
	}
}
