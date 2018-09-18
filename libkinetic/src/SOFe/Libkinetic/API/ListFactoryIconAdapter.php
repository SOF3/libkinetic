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

namespace SOFe\Libkinetic\API;

use Generator;
use SOFe\Libkinetic\Flow\FlowContext;

class ListFactoryIconAdapter implements IconListProvider{
	/** @var ListProvider */
	protected $delegate;

	public function __construct(ListProvider $provider){
		$this->delegate = $provider;
	}

	public function provideIconList(FlowContext $context, IconListFactory $factory) : Generator{
		$delegateFactory = new ListFactory();
		yield $this->delegate->provideList($context, $delegateFactory);
		foreach($delegateFactory->getEntries() as $entry){
			$factory->add($entry->getCommandName(), $entry->getDisplayName(), $entry->getValue());
		}
		$factory->setDefault($delegateFactory->getDefault()->getCommandName());
	}
}
