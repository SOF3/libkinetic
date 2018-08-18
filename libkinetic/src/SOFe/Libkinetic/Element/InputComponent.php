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
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\LibkineticMessages;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\StringAttribute;
use SOFe\Libkinetic\Parser\Attribute\UserStringAttribute;
use SOFe\Libkinetic\UserString;

class InputComponent extends KineticComponent implements ElementInterface{
	use ElementTrait;

	/** @var UserString */
	protected $text;
	/** @var UserString|null */
	protected $placeholder = null;
	/** @var string */
	protected $default = "";

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("text", new UserStringAttribute(), $this->text, true);
		$router->use("placeholder", new UserStringAttribute(), $this->placeholder, false);
		$router->use("default", new StringAttribute(), $this->default, false);
	}

	protected function requestCliImpl(FlowContext $context, float $timeout) : Generator{
		$context->send(LibkineticMessages::MESSAGE_CUSTOM_CLI_TEXT_GENERIC, ["text" => $context->translateUserString($this->text)]);
		$context->send(LibkineticMessages::MESSAGE_CUSTOM_CLI_INSTRUCTION_INPUT, [
			"cont" => $context->getManager()->getContName(),
			"placeholder" => $context->translateUserString($this->placeholder)
		]);
		if($this->default !== ""){
			$context->send(LibkineticMessages::MESSAGE_CUSTOM_CLI_DEFAULT_GENERIC, ["default" => $this->default]);
		}
		return yield $context->getManager()->waitCont($context->getUser(), $timeout);
	}

	protected function parse(FlowContext $context, &$value) : Generator{
		false && yield;
		return $value === "" ? $this->default : $value;
	}
}
