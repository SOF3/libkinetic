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
use SOFe\Libkinetic\API\MenuItemFactory;
use SOFe\Libkinetic\API\MenuProvider;
use SOFe\Libkinetic\Element\ElementParentWithRequiredFallbackComponent;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\Util\CallSequence;
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

	protected function isRequestSufficient(WindowRequest $request, bool $required, callable $sufficient, callable $insufficient) : void{
		if(!$required){
			$sufficient();
			return;
		}
		if(!$request->hasKey($this->asArgComponent()->getId())){
			$insufficient();
			return;
		}
		$factory = new MenuItemFactory();
		$this->provider->provide($factory, $request, function() use ($sufficient, $insufficient, $request, $factory){
			$array = $request->getArray($this->asArgComponent()->getId());

			/** @var string $id */
			foreach($factory->getValues() as [, $id]){
				if(!isset($array[$id])){
					$insufficient($factory->getValues());
					return;
				}
			}

			$sufficient($factory->getValues());
		});
	}

	protected function sendFormInterface(WindowRequest $request, Player $player, bool $explicit, ?string $error, callable $onConfigured, $cache) : void{
		$func = function(array $values) use ($request){
			$content = [];

			foreach($values as [$config, $key]){
				foreach($this->asElementParentWithRequiredFallbackComponent()->getElements() as $element){
				}
			}
		};
		if($cache !== null){
			$func($cache);
		}else{
			$factory = new MenuItemFactory();
			$this->provider->provide($factory, $request, function() use($factory, $func){
				$func($factory->getValues());
			});
		}
	}

	protected function sendCommandInterface(WindowRequest $request, bool $explicit, ?string $error, callable $onConfigured) : void{

	}
}
