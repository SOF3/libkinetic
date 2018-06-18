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

namespace SOFe\Libkinetic\Clickable\Argument;

use Generator;
use Iterator;
use pocketmine\Player;
use SOFe\Libkinetic\Element\ElementParentWithRequiredFallbackComponent;
use SOFe\Libkinetic\InvalidFormResponseException;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\Util\Await;
use SOFe\Libkinetic\WindowComponent;
use SOFe\Libkinetic\WindowRequest;

class SimpleArgComponent extends KineticComponent implements ArgInterface{
	use ArgTrait;

	public function dependsComponents() : Iterator{
		yield ArgComponent::class;
		yield WindowComponent::class;
		yield ElementParentWithRequiredFallbackComponent::class;
	}

	protected function sendFormInterface(WindowRequest $request, Player $player, bool $explicit, ?string $error, $cache) : Generator{
		$content = [];
		$callback = [];
		if($this->asWindowComponent()->getSynopsis() !== null){
			$content[] = [
				"type" => "label",
				"text" => $request->translate($this->asWindowComponent()->getSynopsis()),
			];
			$callback[] = function($value){
				if($value !== null){
					throw new InvalidFormResponseException("Value should be null");
				}
				return null;
			};
		}

		foreach($this->asElementParentWithRequiredFallbackComponent()->getElements() as $element){
			[$ct, $cb] = yield Await::ASYNC => $element->asFormComponent($request, yield);
			$content[] = $ct;
			$callback[] = $cb;
		}

		$formData = [
			"type" => "custom_form",
			"title" => $request->translate($this->asWindowComponent()->getTitle()) . ($error !== null ? " ($error)" : ""),
			"content" => $content,
		];

		/** @var array|null $response */
		$response = yield Await::ASYNC => $this->getManager()->getFormHandler()->sendForm($player, $formData, yield);
		if($response === null){
			return $explicit; // if explicit, flag as configured, else, flag as abandoned
		}

		foreach($this->asElementParentWithRequiredFallbackComponent()->getElements() as $i => $element){
			$id = $this->composeId($element->getNode()->asElementComponent()->getId());
			$value = $callback[$this->asWindowComponent()->getSynopsis() !== null ? ($i + 1) : $i]();
			$local = $element->getNode()->asRequiredComponent()->test($request->getUser());
			$request->put($local, $id, $value);
		}

		yield Await::FROM => $this->afterResponse($request);
	}

	protected function sendCommandInterface(WindowRequest $request, bool $explicit, ?string $error, $cache) : Generator{
		0 && yield;
		// TODO implement
	}

	protected function isRequestSufficient(WindowRequest $request, bool $baseRequired) : Generator{
		0 && yield;

		foreach($this->asElementParentWithRequiredFallbackComponent()->getElements() as $iElement){
			$element = $iElement->getNode()->asElementComponent();
			$required = $iElement->getNode()->asRequiredComponent()->test($request->getUser()) ?? $baseRequired;
			if(!$required){
				continue;
			}
			$id = $this->composeId($element->getId());
			if(!$request->hasKey($id)){
				return false;
			}
		}
		return true;
	}

	private function composeId(string $childId) : string{
		$baseId = $this->asArgComponent()->getId();
		return $baseId !== null ? ($baseId . "." . $childId) : $childId;
	}
}
