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
use SOFe\Libkinetic\Parser\Attribute\UserStringAttribute;
use SOFe\Libkinetic\UserString;

class LabelElementComponent extends BaseElement{
	use ElementTrait;

	/** @var UserString */
	protected $text;

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("text", new UserStringAttribute(), $this->text, true);
	}

	public function requestCliImpl(FlowContext $context, float $timeout) : Generator{
		false && yield;
		$context->send(LibkineticMessages::CUSTOM_CLI_TEXT_LABEL, ["text" => $context->translateUserString($this->text, $this->args)]);
	}

	public function addToFormAPI(FlowContext $context, CustomForm $form) : Generator{
		false && yield;
		$form->addLabel($context->translateUserString($this->text, $this->args));
	}

	public function parseFormResponse(FlowContext $context, $response, $temp) : ?object{ // just a constant null
		if($response !== null){
			throw new FormValidationException("Got non-null response for label");
		}
		return null;
	}

	protected function parse(FlowContext $context, &$value) : Generator{
		false && yield;
		return true;
	}
}
