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
use jojoe77777\FormAPI\CustomForm;
use SOFe\Libkinetic\Base\KineticNode;
use SOFe\Libkinetic\Flow\FlowContext;

interface ElementInterface{
	public function requestCli(FlowContext $context, float $expiry) : Generator;

	public function addToFormAPI(FlowContext $context, CustomForm $form) : Generator;

	public function parseFormResponse(FlowContext $context, $response, $temp);

	public function getNode() : KineticNode;

	public function attachArgs(array $args) : ElementInterface;
}
