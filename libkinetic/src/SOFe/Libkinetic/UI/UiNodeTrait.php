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
use function get_class;
use function gettype;
use function is_array;
use function is_int;
use function range;

trait UiNodeTrait{
	public function execute(FlowContext $context) : Generator{
		$onStart = $this->getNode()->asUiComponent()->getOnStart()->asBaseUiNodeStateComponent()->getHandlers();
		$onComplete = $this->getNode()->asUiComponent()->getOnComplete()->asBaseUiNodeStateComponent()->getHandlers();

		onStart:
		foreach($onStart as $handler){
			[$state, $target] = yield from $this->adaptStateHandler($context, $handler);

			switch($state){
				case UiNodeStateHandler::STATE_START:
					goto onStart;
				case UiNodeStateHandler::STATE_NIL:
					continue 2;
				case UiNodeStateHandler::STATE_EXECUTE:
					goto execute;
				case UiNodeStateHandler::STATE_COMPLETE:
					goto onComplete;
				case UiNodeStateHandler::STATE_SKIP:
				case UiNodeStateHandler::STATE_BREAK:
				case UiNodeStateHandler::STATE_EXIT:
					return new UiNodeOutcome($state, $target);

				default:
					throw new UnexpectedValueException("Unexpected state returned from " . get_class($handler) . "::onStartComplete(): " . $state);
			}
		}

		execute:


		onComplete:
		foreach($onComplete as $handler){
			[$state, $target] = yield from $this->adaptStateHandler($context, $handler);

			switch($state){
				case UiNodeStateHandler::STATE_START:
					goto onStart;
				case UiNodeStateHandler::STATE_NIL:
					continue 2;
				case UiNodeStateHandler::STATE_EXECUTE:
					goto execute;
				case UiNodeStateHandler::STATE_COMPLETE:
					goto onComplete;
				case UiNodeStateHandler::STATE_SKIP:
				case UiNodeStateHandler::STATE_BREAK:
				case UiNodeStateHandler::STATE_EXIT:
					return new UiNodeOutcome($state, $target);

				default:
					throw new UnexpectedValueException("Unexpected state returned from " . get_class($handler) . "::onStartComplete(): " . $state);
			}
		}

		return new UiNodeOutcome(UiNodeOutcome::OUTCOME_SKIP, null);
	}

	protected function adaptStateHandler(FlowContext $context, UiNodeStateHandler $handler) : Generator{
		$ret = yield Await::FROM => $handler->onStartComplete($context);

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
			throw new UnexpectedValueException("Unexpected type returned from " . get_class($handler) . "::onStartComplete(): " . gettype($ret));
		}

		return [$state, $target];
	}

	protected abstract function getNode() : KineticNode;

	protected abstract function executeNode(FlowContext $context) : Generator;
}
