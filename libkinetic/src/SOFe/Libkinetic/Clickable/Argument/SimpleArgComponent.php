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

use Iterator;
use pocketmine\Player;
use SOFe\Libkinetic\Element\ElementParentWithFallbackRequiredComponent;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\Util\CallSequence;
use SOFe\Libkinetic\WindowComponent;
use SOFe\Libkinetic\WindowRequest;

class SimpleArgComponent extends KineticComponent implements ArgsInterface{
	use ArgsTrait;

	protected $title;

	public function dependsComponents() : Iterator{
		yield ArgsComponent::class;
		yield WindowComponent::class;
		yield ElementParentWithFallbackRequiredComponent::class;
	}

	public function setAttribute(string $name, string $value) : bool{
		if($name === "TITLE"){
			$this->title = $value;
			return true;
		}
		return false;
	}

	public function init() : void{
		$this->requireTranslation($this->title);
	}

	protected function sendFormInterface(WindowRequest $request, Player $player, bool $explicit, ?string $error, callable $onConfigured) : void{
		CallSequence::forMethod($this->asElementParentWithFallbackRequired()->getElements(), "asFormComponent", function($elements) use ($onConfigured, $error, $player, $request, $explicit){
			$content = [];
			$callback = [];
			foreach($elements as $element){
				$content[] = $element[0];
				$callback[] = $element[1];
			}
			$formData = [
				"type" => "custom_form",
				"title" => $request->translate($this->title) . ($error !== null ? "\n$error" : ""),
				"content" => $content,
			];

			$this->getManager()->sendForm($player, $formData, function(?array $response) use ($callback, $onConfigured, $request, $explicit) : void{
				if($response === null){
					if($explicit){
						$onConfigured();
					} // else abandon
					return;
				}

				foreach($this->asElementParentWithFallbackRequired()->getElements() as $i => $element){
					$id = $this->composeId($element->getNode()->asElement()->getId());
					$value = $callback[$i]();
					$local = $element->getNode()->asRequired()->test($request->getUser());
					$request->put($local, $id, $value);
				}

				$this->afterResponse($request, $onConfigured);
			});
		}, [$request], [], CallSequence::YIELD_ALL);
	}

	protected function sendCommandInterface(WindowRequest $request, bool $explicit, ?string $error, callable $onConfigured) : void{

	}

	protected function isRequestSufficient(WindowRequest $request, bool $baseRequired) : bool{
		foreach($this->asElementParentWithFallbackRequired()->getElements() as $iElement){
			$element = $iElement->getNode()->asElement();
			$required = $iElement->getNode()->asRequired()->test($request->getUser()) ?? $baseRequired;
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
		$baseId = $this->asArgs()->getId();
		return $baseId !== null ? ($baseId . "." . $childId) : $childId;
	}
}
