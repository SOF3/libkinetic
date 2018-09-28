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
use SOFe\Libkinetic\API\ListFactory;
use SOFe\Libkinetic\API\ListProvider;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\LibkineticMessages;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\ControllerAttribute;
use SOFe\Libkinetic\Parser\Attribute\StringEnumAttribute;
use SOFe\Libkinetic\Parser\Attribute\UserStringAttribute;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;
use SOFe\Libkinetic\UI\Standard\ListEntry;
use SOFe\Libkinetic\UserString;
use function array_map;
use function assert;
use function count;
use function is_int;

class SelectElementComponent extends BaseElement{
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
	protected $valueType = "string";

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("text", new UserStringAttribute(), $this->text, true);
		$router->use("mode", new StringEnumAttribute([self::DROPDOWN, self::STEP_SLIDER], true), $this->mode, false);
		$router->use("provider", new ControllerAttribute(ListProvider::class, []), $this->provider, false);
		$router->use("valueType", new StringEnumAttribute([
			"bool",
			"integer",
			"double",
			"string",
		], true), $this->valueType, false);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("option", SelectOptionComponent::class, $this->optionNodes, 0);
	}

	protected function requestCliImpl(FlowContext $context, float $timeout) : Generator{
		$options = yield $this->getOptions($context, $defaultOption);
		assert($defaultOption instanceof ListEntry);
		$context->send(LibkineticMessages::CUSTOM_CLI_TEXT_GENERIC, ["text" => $context->translateUserString($this->text, $this->args)]);
		$context->send(LibkineticMessages::CUSTOM_CLI_INSTRUCTION_SELECT, ["cont" => $context->getManager()->getContName()]);
		$valueMap = [];
		foreach($options as $option){
			assert($option instanceof ListEntry);
			$valueMap[$option->getCommandName()] = $option->getValue();
			$context->send(LibkineticMessages::CUSTOM_CLI_SELECT_OPTION, [
				"mnemonic" => $option->getCommandName(),
				"display" => $context->translateUserString($option->getDisplayName(), $this->args),
			]);
		}
		$choice = yield $context->getManager()->waitCont($context->getUser(), $timeout);
		if($choice === ""){
			$choice = $defaultOption->getCommandName();
		}
		return isset($valueMap[$choice]) ? [true, $valueMap[$choice]] : [false];
	}

	public function addToFormAPI(FlowContext $context, CustomForm $form) : Generator{
		$options = yield $this->getOptions($context, $defaultOption);

		$text = $context->translateUserString($this->text, $this->args);
		if($this->mode === self::DROPDOWN){
			$form->addDropdown($text, array_map(function(ListEntry $entry) use ($context) : string{
				return $context->translateUserString($entry->getDisplayName(), $this->args);
			}, $options), $defaultOption);
		}else{
			assert($this->mode === self::STEP_SLIDER);
			$form->addStepSlider($text, array_map(function(ListEntry $entry) use ($context) : string{
				return $context->translateUserString($entry->getDisplayName(), $this->args);
			}, $options), $defaultOption);
		}

		return count($options);
	}

	public function parseFormResponse(FlowContext $context, $response, $temp){
		if(!is_int($response)){
			throw new FormValidationException("Got non-int response for dropdown/stepSlider");
		}
		if($response < 0 || $response >= $temp){
			throw new FormValidationException("Got out-of-bounds response for dropdown/stepSlider");
		}

		return $response;
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

	protected function getOptions(FlowContext $context, ?ListEntry &$defaultOption) : Generator{
		if($this->provider !== null){
			$factory = new ListFactory();
			yield $this->provider->provideList($context, $factory);
			return $factory->getEntries();
		}

		$options = [];
		foreach($this->optionNodes as $option){
			$options[] = $entry = new ListEntry($option->getCommandName(), $option->getDisplayName(), $option->getValue());
			if($option->isDefault()){
				$entry->setDefault($option->isDefault());
				$defaultOption = $entry;
			}
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
