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

namespace SOFe\Libkinetic\Clickable\Window;

use Iterator;
use SOFe\Libkinetic\Clickable\Argument\ArguableComponent;
use SOFe\Libkinetic\Clickable\Entry\DirectEntryClickableComponent;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\WindowComponent;

class ListComponent extends KineticComponent{
	public function dependsComponents() : Iterator{
		yield DirectEntryClickableComponent::class;
		yield WindowComponent::class;
		yield ArguableComponent::class;
	}
}
