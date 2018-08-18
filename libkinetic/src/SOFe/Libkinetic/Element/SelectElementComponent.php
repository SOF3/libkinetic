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
use SOFe\Libkinetic\Form\HybridForms;
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
		$allOptions = yield $this->getOptions($context);
		/** @var UserString[] $options */
		$options = [];
		foreach($allOptions as [$mnemonic, $display, $value]){
			$options[$mnemonic] = $display;
		}
		$choice = yield HybridForms::listNonPlayer($context, null, $this->text, $options, $timeout);
		return $options[$choice] ?? null;
	}

	protected function parse(FlowContext $context, &$value) : Generator{
		yield from [];
		return $value !== null;
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
