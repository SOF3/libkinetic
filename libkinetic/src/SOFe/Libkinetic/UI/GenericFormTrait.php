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

namespace SOFe\Libkinetic\UI;

use Generator;
use SOFe\Libkinetic\Flow\FlowCancelledException;
use SOFe\Libkinetic\Flow\FlowContext;

trait GenericFormTrait{
	protected abstract function asGenericFormComponent() : GenericFormComponent;

	/**
	 * Executes the actual form
	 *
	 * @param FlowContext $context
	 *
	 * @return Generator
	 * @throws FlowCancelledException
	 */
	protected abstract function executeFormNode(FlowContext $context) : Generator;

	public final function executeNode(FlowContext $context) : Generator{
		return yield $this->executeFormNode($context);
	}
}
