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

namespace SOFe\Libkinetic\UI\Standard;

use Generator;
use SOFe\Libkinetic\API\IconListFactory;
use SOFe\Libkinetic\API\IconListProvider;
use SOFe\Libkinetic\API\ListFactoryIconAdapter;
use SOFe\Libkinetic\API\ListProvider;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Flow\FlowCancelledException;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\BooleanAttribute;
use SOFe\Libkinetic\Parser\Attribute\ControllerAttribute;
use SOFe\Libkinetic\Parser\Attribute\VarRefAttribute;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;
use SOFe\Libkinetic\UI\GenericFormComponent;
use SOFe\Libkinetic\UI\GenericFormTrait;
use SOFe\Libkinetic\UI\Group\MuxOptionComponent;
use SOFe\Libkinetic\UI\ReturningUiNodeOutcome;
use SOFe\Libkinetic\UI\UiComponent;
use SOFe\Libkinetic\UI\UiNode;
use SOFe\Libkinetic\UI\UiNodeTrait;
use function assert;
use function count;

class ListFormComponent extends KineticComponent implements UiNode{
	use UiNodeTrait;
	use GenericFormTrait;

	/** @var IconListProvider */
	protected $provider;
	/** @var string|null */
	protected $target = null;
	/** @var string|null */
	protected $defaultVar = null;
	/** @var MuxOptionComponent[] */
	protected $before = [];
	/** @var MuxOptionComponent[] */
	protected $after = [];
	/** @var bool */
	protected $autoSelect = false;

	public function getDependencies() : Generator{
		yield UiComponent::class;
		yield GenericFormComponent::listForm();
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("provider", new ControllerAttribute(IconListProvider::class, [
			ListProvider::class => function(ListProvider $provider) : IconListProvider{
				return new ListFactoryIconAdapter($provider);
			}
		]), $this->provider, true);
		$router->use("target", new VarRefAttribute(), $this->target, false);
		$router->use("defaultVar", new VarRefAttribute(), $this->defaultVar, false);
		$router->use("autoSelect", new BooleanAttribute(), $this->autoSelect, false);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptMulti("before", MuxOptionComponent::class, $this->before, 0);
		$router->acceptMulti("after", MuxOptionComponent::class, $this->after, 0);
	}

	protected function executeFormNode(FlowContext $context) : Generator{
		[$mux, $value] = yield $this->chooseValue($context);

		if($mux){
			assert($value instanceof MuxOptionComponent);
			return $value->asUiParentComponent()->getChildren()[0]->execute($context);
		}else{
			$context->getVariables()->setNested($this->target, $value);
			return new ReturningUiNodeOutcome([
				"choice" => $value,
			]);
		}
	}

	protected function chooseValue(FlowContext $context) : Generator{
		if($this->defaultVar !== null){
			$var = $context->getVariables()->getNestedVariable($this->defaultVar);
			if($var->isSet()){
				return [false, $var->getValue()];
			}
		}

		$factory = new IconListFactory();
		yield $this->provider->provideIconList($context, $factory);

		$entries = $factory->getEntries();
		if($this->autoSelect){
			$count = count($entries);
			if($count === 1){
				return [false, $entries[0][2]];
			}
			if($count === 0){
				throw new FlowCancelledException();
			}
		}

		$options = [];
		foreach($this->before as $component){
			$options[] = new IconListEntry($component->getCommandName(), $component->getDisplayName(), [true, $component], null); // TODO icon
		}
		foreach($entries as $entry){
			$option = clone $entry;
			$option->setValue([false, $entry->getValue()]);
			$options[] = $option;
		}
		foreach($this->after as $component){
			$options[] = new IconListEntry($component->getCommandName(), $component->getDisplayName(), [true, $component], null); // TODO icon
		}

		return yield $this->asGenericFormComponent()->sendListForm($context, $options);
	}
}
