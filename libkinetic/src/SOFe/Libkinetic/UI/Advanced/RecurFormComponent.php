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

namespace SOFe\Libkinetic\UI\Advanced;

use Generator;
use SOFe\Libkinetic\API\DataListProvider;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Flow\FlowCancelledException;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\ControllerAttribute;
use SOFe\Libkinetic\Parser\Attribute\StringEnumAttribute;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;
use SOFe\Libkinetic\UI\GenericFormComponent;
use SOFe\Libkinetic\UI\ReturningUiNodeOutcome;
use SOFe\Libkinetic\UI\UiComponent;
use SOFe\Libkinetic\UI\UiNode;
use SOFe\Libkinetic\UI\UiNodeOutcome;
use SOFe\Libkinetic\UI\UiNodeTrait;
use function array_push;

class RecurFormComponent extends KineticComponent implements UiNode{
	use UiNodeTrait;

	/** @var DataListProvider */
	protected $provider;
	/** @var string */
	protected $eachAs = "it";
	/** @var string */
	protected $onEmpty = "execute";
	/** @var RecurFormSectionComponent|null */
	protected $before = null;
	/** @var RecurFormSectionComponent */
	protected $each;
	/** @var RecurFormSectionComponent|null */
	protected $after = null;

	public function getDependencies() : Generator{
		yield UiComponent::class;
		yield GenericFormComponent::customForm();
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("provider", new ControllerAttribute(DataListProvider::class, []), $this->provider, true);
		$router->use("onEmpty", new StringEnumAttribute([
			"execute" => "execute",
			"skip" => "skip",
			"cancel" => "cancel",
		], true), $this->onEmpty, false);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptSingle("before", RecurFormSectionComponent::class, $this->before, true);
		$router->acceptSingle("each", RecurFormSectionComponent::class, $this->each, false);
		$router->acceptSingle("after", RecurFormSectionComponent::class, $this->after, true);
	}

	protected function executeNode(FlowContext $context) : Generator{
		$iterations = yield $this->provider->provide($context);

		if(empty($iterations)){
			switch($this->onEmpty){
				case "skip":
					return new UiNodeOutcome();
				case "cancel":
					throw new FlowCancelledException();
			}
		}

		$elements = [];
		if($this->before !== null){
			array_push($elements, ...$this->before->asElementParentComponent()->getElements());
		}
		foreach($iterations as $iteration){
			foreach($this->each->asElementParentComponent()->getElements() as $element){
				$elements[] = $element->attachArgs(["it" => $iteration]);
			}
		}
		if($this->after !== null){
			array_push($elements, ...$this->after->asElementParentComponent()->getElements());
		}

		$responses = yield $this->asGenericFormComponent()->sendCustomForm($context, $elements);
		$i = 0;
		$beforeData = [];
		if($this->before !== null){
			foreach($this->before->asElementParentComponent()->getElements() as $before){
				$response = $responses[$i++];
				$beforeData[$before->getNode()->asElementComponent()->getId()] = $response;
			}
			if($this->before->getVar() !== null){
				$context->getVariables()->setNested($this->before->getVar(), $beforeData);
			}
		}

		$bodyData = [];
		foreach($iterations as $k => $_){
			$datum = [];
			foreach($this->each->asElementParentComponent()->getElements() as $element){
				$datum[$element->getNode()->asElementComponent()->getId()] = $responses[$i++];
			}
			$bodyData[] = $datum;
		}
		if($this->each->getVar() !== null){
			$context->getVariables()->setNested($this->each->getVar(), $bodyData);
		}

		$afterData = [];
		if($this->after !== null && $this->after->getVar() !== null){
			foreach($this->after->asElementParentComponent()->getElements() as $after){
				$iterations = $responses[$i++];
				$afterData[$after->getNode()->asElementComponent()->getId()] = $iterations;
			}
			if($this->after->getVar() !== null){
				$context->getVariables()->setNested($this->after->getVar(), $afterData);
			}
		}

		return new ReturningUiNodeOutcome([
			"before" => $beforeData,
			"body" => $bodyData,
			"after" => $afterData,
		]);
	}
}
