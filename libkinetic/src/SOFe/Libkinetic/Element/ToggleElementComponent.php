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
use pocketmine\form\FormValidationException;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\LibkineticMessages;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\BooleanAttribute;
use SOFe\Libkinetic\Parser\Attribute\UserStringAttribute;
use SOFe\Libkinetic\UserString;
use function is_bool;

class ToggleElementComponent extends BaseElement{
	use ElementTrait;

	/** @var UserString */
	protected $text;
	/** @var bool */
	protected $default = false;

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("text", new UserStringAttribute(), $this->text, true);
		$router->use("default", new BooleanAttribute(), $this->default, false);
	}

	public function requestCliImpl(FlowContext $context, float $timeout) : Generator{
		$context->send(LibkineticMessages::CUSTOM_CLI_TEXT_GENERIC, ["text" => $context->translateUserString($this->text, $this->args)]);
		$context->send(LibkineticMessages::CUSTOM_CLI_INSTRUCTION_TOGGLE, ["cont" => $context->getManager()->getContName()]);
		$context->send(LibkineticMessages::CUSTOM_CLI_DEFAULT_GENERIC, ["default" => $this->default ? "true" : "false"]);
		return yield $context->getManager()->waitCont($context->getUser(), $timeout);
	}

	public function addToFormAPI(FlowContext $context, CustomForm $form) : Generator{
		false && yield;
		$form->addToggle($context->translateUserString($this->text, $this->args), $this->default);
	}

	public function parseFormResponse(FlowContext $context, $response, $temp) : bool{
		if(!is_bool($response)){
			throw new FormValidationException("Got non-bool response for toggle");
		}
		return $response;
	}

	protected function parse(FlowContext $context, &$value) : Generator{
		false && yield;
		$value = mb_strtolower($value);
		if($value === ""){
			$value = $this->default;
			return true;
		}
		if($value === "true" || $value === "1" || $value === "i" || $value === "on" || $value === "y" || $value === "yes"){
			$value = true;
			return true;
		}
		if($value === "false" || $value === "0" || $value === "o" || $value === "off" || $value === "n" || $value === "no"){
			$value = false;
			return true;
		}
		return false;
	}
}
