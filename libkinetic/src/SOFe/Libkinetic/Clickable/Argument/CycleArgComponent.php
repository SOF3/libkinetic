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
use SOFe\Libkinetic\API\MenuItemFactory;
use SOFe\Libkinetic\API\MenuProvider;
use SOFe\Libkinetic\Element\ElementParentWithRequiredFallbackComponent;
use SOFe\Libkinetic\InvalidFormResponseException;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\Util\Await;
use SOFe\Libkinetic\WindowComponent;
use SOFe\Libkinetic\WindowRequest;

class CycleArgComponent extends KineticComponent implements ArgInterface{
	use ArgTrait;

	/** @var string */
	protected $providerClass;
	/** @var MenuProvider */
	protected $provider;

	public function dependsComponents() : Iterator{
		yield ArgComponent::class;
		yield WindowComponent::class;
		yield ElementParentWithRequiredFallbackComponent::class;
	}

	public function setAttribute(string $name, string $value) : bool{
		if($name === "PROVIDER"){
			$this->providerClass = $value;
			return true;
		}
		return false;
	}

	public function endElement() : void{
		$this->requireAttribute("provider", $this->providerClass);
		$this->requireAttribute("id", $this->asArgComponent()->getId());
	}

	public function resolve() : void{
		$this->provider = $this->resolveClass($this->providerClass, MenuProvider::class);
	}

	protected function isRequestSufficient(WindowRequest $request, bool $baseRequired, &$cache) : Generator{
		if(!$baseRequired){
			return true;
		}
		if(!$request->hasKey($this->asArgComponent()->getId())){
			return false;
		}

		$factory = new MenuItemFactory();
		yield Await::ASYNC => $this->provider->provide($factory, $request, yield);
		$cache = $factory->getValues();
		$argId = $this->asArgComponent()->getId();
		foreach($cache as [, $entryId]){
			foreach($this->asElementParentWithRequiredFallbackComponent()->getElements() as $element){
				$elementId = $element->getNode()->asElementComponent()->getId();
				if(!$request->hasKey("$argId.$entryId.$elementId")){
					return false;
				}
			}
		}
		return true;
	}

	protected function sendFormInterface(WindowRequest $request, Player $player, bool $explicit, ?string $error, $values) : Generator{
		if($values === null){
			$factory = new MenuItemFactory();
			yield Await::ASYNC => $this->provider->provide($factory, $request, yield);
			$values = $factory->getValues();
		}

		$content = [];
		$callback = [];
		$synopsis = $this->asWindowComponent()->getSynopsis();
		if($synopsis !== null){
			$content[] = [
				"type" => "label",
				"text" => $request->translate($synopsis),
			];
			$callback[] = function($value){
				if($value !== null){
					throw new InvalidFormResponseException("Value should be null");
				}
				return null;
			};
		}

		foreach($values as [$config, $entryId]){
			$push = $request->push();
			foreach($config as $k => $v){
				$push->put(true, $k, $v);
			}

			foreach($this->asElementParentWithRequiredFallbackComponent()->getElements() as $element){
				[$ct, $cb] = yield Await::ASYNC => $element->asFormComponent($request, yield);
				$content[] = $ct;
				$callback[] = $cb;
			}
		}

		$formData = [
			"type" => "custom_form",
			"title" => $request->translate($this->asWindowComponent()->getTitle()) . ($error !== null ? " ($error)" : ""),
			"content" => $content,
		];

		$response = yield Await::ASYNC => $this->getManager()->getFormHandler()->sendForm($player, $formData, yield);
		if($response === null){
			return $explicit; // if explicit, flag as configured, else, flag as abandoned
		}

		$i = $synopsis !== null ? 1 : 0;
		$argId = $this->asArgComponent()->getId();
		foreach($values as [, $entryId]){
			foreach($this->asElementParentWithRequiredFallbackComponent()->getElements() as $element){
				$elementId = $element->getNode()->asElementComponent()->getId();
				$request->put(true, "$argId.$entryId.$elementId", $callback[$i++]());
			}
		}

		return true;
	}

	protected function sendCommandInterface(WindowRequest $request, bool $explicit, ?string $error, $cache) : Generator{
		0 && yield;

		// TODO implement
	}
}
