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

use SOFe\Libkinetic\API\DropdownOptionFactory;
use SOFe\Libkinetic\API\DropdownProvider;
use SOFe\Libkinetic\InvalidFormResponseException;
use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\WindowRequest;

trait DropdownComponentDynamicLike{
	/** @var string */
	protected $providerClass;
	/** @var DropdownProvider */
	protected $provider;

	public function setAttribute(string $name, string $value) : bool{
		if($name === "PROVIDER"){
			$this->providerClass = $value;
			return true;
		}
		return false;
	}

	public function endElement() : bool{
		$this->requireAttribute("provider", $this->providerClass);
		return true;
	}

	public function init() : void{
		$this->provider = $this->resolveClass($this->providerClass, DropdownProvider::class);
	}

	public function asFormComponent(WindowRequest $request, callable $onComplete) : void{
		$factory = new DropdownOptionFactory();
		$this->provider->provide($factory, $request, function() use ($request, $factory, $onComplete){
			$onComplete([
				"type" => $this->getFormType(),
				"text" => $request->translate($this->asElementComponent()->getTitle()),
				$this->getFormStepKey() => array_map(function(array $array) use ($request){
					return $request->translate($array[1]);
				}, $factory->getValues()),
				"default" => $factory->getDefaultId(),
			], function(int $choice) use ($factory){
				if(!$factory->getValue($choice, $value, $messageId)){
					throw new InvalidFormResponseException("No such option $choice");
				}
				return $value;
			});
		});
	}

	protected abstract function getFormType() : string;

	protected abstract function getFormStepKey() : string;

	protected abstract function getNode() : KineticNode;
}
