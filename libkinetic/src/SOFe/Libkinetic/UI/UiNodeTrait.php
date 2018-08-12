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

namespace SOFe\Libkinetic\UI;

use Generator;
use SOFe\Libkinetic\API\UiNodeStateHandler;
use SOFe\Libkinetic\Base\KineticNode;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\Util\Await;
use UnexpectedValueException;
use function array_keys;
use function assert;
use function count;
use function get_class;
use function gettype;
use function in_array;
use function is_array;
use function is_int;
use function range;

trait UiNodeTrait{
	public function execute(FlowContext $context) : Generator{
		$allHandlers = [];
		$labels = [
			UiNodeStateHandler::STATE_START => 0,
		];

		foreach($this->getNode()->asUiComponent()->getOnStart()->asBaseUiNodeStateComponent()->getHandlers() as $handler){
			$allHandlers[] = [$handler, "onStartComplete"];
		}

		$labels[UiNodeStateHandler::STATE_EXECUTE] = count($allHandlers);
		$allHandlers[] = [$this, "executeNodeWrapper"];
		$labels[UiNodeStateHandler::STATE_COMPLETE] = count($allHandlers);

		foreach($this->getNode()->asUiComponent()->getOnComplete()->asBaseUiNodeStateComponent()->getHandlers() as $handler){
			$allHandlers[] = [$handler, "onStartComplete"];
		}

		$i = 0;
		while(true){
			if(!isset($allHandlers[$i])){
				return new UiNodeOutcome(UiNodeOutcome::OUTCOME_SKIP, null);
			}
			[$state, $target] = yield Await::FROM => $this->adaptStateHandler($context, $allHandlers[$i][0], $allHandlers[$i][1]);

			if($state === UiNodeStateHandler::STATE_NIL){
				++$i;
				continue;
			}

			if(in_array($state, [UiNodeStateHandler::STATE_SKIP, UiNodeStateHandler::STATE_BREAK, UiNodeStateHandler::STATE_EXIT], true)){
				if($state === UiNodeStateHandler::STATE_EXIT && $target !== null){
					$context->send($target);
				}
				return new UiNodeOutcome($state, $target);
			}

			$i = $labels[$state];
			if(isset($labels[$state])){
				$i = $labels[$state];
				continue;
			}

			$class = get_class($allHandlers[$i][0]);
			throw new UnexpectedValueException("Unexpected state returned from {$class}::{$allHandlers[$i][1]}(): " . $state);
		}
	}

	protected function adaptStateHandler(FlowContext $context, object $object, string $function) : Generator{
		$ret = yield Await::FROM => $object->{$function}($context);

		if(is_array($ret)){
			assert(array_keys($ret) === range(0, 1));
			[$state, $target] = $ret;
		}elseif(is_int($ret)){
			$state = $ret;
			$target = null;
		}elseif($ret === null){
			$state = UiNodeStateHandler::STATE_NIL;
			$target = null;
		}else{
			throw new UnexpectedValueException("Unexpected type returned from " . get_class($object) . "::$function(): " . gettype($ret));
		}

		return [$state, $target];
	}

	protected abstract function getNode() : KineticNode;

	protected function executeNodeAndReturn(FlowContext $context) : Generator{
		$outcome = yield Await::FROM => $this->executeNode($context);
		assert($outcome instanceof UiNodeOutcome);
		if($outcome instanceof ReturningUiNodeOutcome){
			$returns = $outcome->getReturns();
			foreach($this->getNode()->asUiComponent()->getReturns() as $returnComponent){
				if(isset($returns[$returnComponent->getName()])){
					$context->getVariables()->setNested($returnComponent->getAs(), $returns[$returnComponent->getName()]);
				}else{
					throw $returnComponent->getNode()->throw(get_class($this) . " does not return the \"{$returnComponent->getName()}\" value"); // TODO: Should we allow optional?
				}
			}
		}
		return $outcome;
	}

	protected abstract function executeNode(FlowContext $context) : Generator;
}
