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

use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\WindowRequest;

interface ElementInterface{
	public function getNode() : KineticNode;

	/**
	 * @param WindowRequest $request
	 * @param callable      $onComplete a on-complete callable accepting an array (form components) and an argument adapter
	 */
	public function asFormComponent(WindowRequest $request, callable $onComplete) : void;
}
