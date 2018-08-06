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

namespace SOFe\Libkinetic\UI\Conditional;

use Generator;
use pocketmine\command\CommandSender;
use SOFe\Libkinetic\API\FlowPredicate;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Router\AttributeRouter;
use SOFe\Libkinetic\Parser\Router\BooleanAttribute;
use SOFe\Libkinetic\Util\GeneratorUtil;

class ConstConditionalComponent extends KineticComponent implements FlowPredicate{
	use ConditionalTrait;

	/** @var bool */
	protected $value;

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("value", new BooleanAttribute(), $this->value, true);
	}

	protected function testCondition(CommandSender $sender) : Generator{
		return GeneratorUtil::empty($this->value);
	}
}
