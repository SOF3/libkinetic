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
use SOFe\Libkinetic\API\ListFactory;
use SOFe\Libkinetic\API\ListProvider;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\LibkineticMessages;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\ControllerAttribute;
use SOFe\Libkinetic\Parser\Attribute\StringEnumAttribute;
use SOFe\Libkinetic\Parser\Attribute\UserStringAttribute;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;
use SOFe\Libkinetic\UserString;

class SelectElementComponent extends KineticComponent implements ElementInterface{
	use ElementTrait;

	public const DROPDOWN = "dropdown";
	public const STEP_SLIDER = "slider";

	/** @var UserString */
	protected $text;
	/** @var string */
	protected $mode = self::DROPDOWN;
	/** @var ListProvider|null */
	protected $provider = null;
	/** @var SelectOptionComponent[] */
	protected $optionNodes = [];
	/** @var string */
	protected $valueType;

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("text", new UserStringAttribute(), $this->text, true);
		$router->use("mode", new StringEnumAttribute([self::DROPDOWN, self::STEP_SLIDER], true), $this->mode, false);
		$router->use("provider", new ControllerAttribute(ListProvider::class, []), $this->provider, false);
		$router->use("valueType", new StringEnumAttribute([
			"bool",
			"int",
			"float",
			"string",
		], true), $this->valueType, false);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("select", SelectOptionComponent::class, $this->optionNodes, 0);
	}

	protected function requestCliImpl(FlowContext $context, float $timeout) : Generator{
		$options = yield $this->getOptions($context);
		$context->send(LibkineticMessages::MESSAGE_CUSTOM_CLI_TEXT_GENERIC, ["text" => $context->translateUserString($this->text)]);
		$context->send(LibkineticMessages::MESSAGE_CUSTOM_CLI_INSTRUCTION_SELECT, ["cont" => $context->getManager()->getContName()]);
		$valueMap = [];
		foreach($options as [$mnemonic, $display, $value]){
			$valueMap[$mnemonic] = $value;
			$context->send(LibkineticMessages::MESSAGE_CUSTOM_CLI_SELECT_OPTION, [
				"mnemonic" => $mnemonic,
				"display" => $context->translateUserString($display),
			]);
		}
		$choice = yield $context->getManager()->waitCont($context->getUser(), $timeout);
		return isset($valueMap[$choice]) ? [true, $valueMap[$choice]] : [false];
	}

	protected function parse(FlowContext $context, &$value) : Generator{
		yield from [];
		if($value[0]){
			$value = $value[1];
			return true;
		}else{
			return false;
		}
	}

	protected function getOptions(FlowContext $context) : Generator{
		if($this->provider !== null){
			$factory = new ListFactory();
			yield $this->provider->provideList($context, $factory);
			return $factory->toOptions();
		}

		$options = [];
		foreach($this->optionNodes as $option){
			$options[] = [$option->getCommandName(), $option->getDisplayName(), $option->getValue()];
		}
		return $options;
	}

	public function getText() : UserString{
		return $this->text;
	}

	public function getMode() : string{
		return $this->mode;
	}

	public function getProvider() : ?ListProvider{
		return $this->provider;
	}

	/**
	 * @return SelectOptionComponent[]
	 */
	public function getOptionNodes() : array{
		return $this->optionNodes;
	}

	public function getValueType() : string{
		return $this->valueType;
	}
}
