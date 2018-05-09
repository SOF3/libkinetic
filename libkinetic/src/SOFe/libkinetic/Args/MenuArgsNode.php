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

namespace SOFe\libkinetic\Args;

use function count;
use SOFe\libkinetic\Icon;
use SOFe\libkinetic\InvalidFormResponseException;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\MenuItemFactory;
use SOFe\libkinetic\MenuProvider;
use SOFe\libkinetic\ResendFormException;
use SOFe\libkinetic\WindowRequest;

/**
 * `<menuArgs>` is a variant of `<list>` as an ArgsNode. It is a MenuForm whose buttons are provided through a MenuProvider implementation. The whole config only outputs one value, which is the chosen button.
 */
class MenuArgsNode extends ArgsWindowNode{
	/** @var string|null */
	protected $synopsis = null;

	/** @var string */
	protected $provider;
	/** @var MenuProvider */
	protected $providerObject;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "SYNOPSIS"){
			$this->synopsis = $value;
			return true;
		}

		if($name === "PROVIDER"){
			$this->provider = $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->requireAttributes("provider");
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		if($this->synopsis !== null){
			$manager->requireTranslation($this, $this->synopsis);
		}
		$this->providerObject = $manager->resolveClass($this, $this->provider, MenuProvider::class);
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"provider" => $this->provider,
			];
	}


	public function sendForm(WindowRequest $request, callable $onComplete, bool $explicit) : void{
		if(!$explicit && (!$this->required || $request->hasKey($this->id))){
			$onComplete();
			return;
		}

		$factory = new MenuItemFactory();
		$this->providerObject->provide($factory, $request, function() use ($explicit, $onComplete, $request, $factory){
			$values = [];
			$buttons = [];
			/**
			 * @var mixed     $value
			 * @var string    $expr
			 * @var Icon|null $icon
			 */
			foreach($factory->getValues() as [$value, $expr, $icon]){
				$values[] = $value;
				$buttons[] = [
						"text" => $request->translate($expr),
					] + ($icon === null ? [] : [
						"image" => [
							"type" => $icon->getType(),
							"data" => $icon->getValue(),
						]
					]);
			}

			$form = [
				"type" => "form",
				"title" => $request->translate($this->title),
				"content" => $request->translate($this->synopsis),
				"buttons" => $buttons,
			];

			$this->manager->sendForm($request->getPlayer(), $form, function(?int $data) use ($request, $values, $onComplete, $explicit){
				if($data === null){
					if(!$explicit){
						throw new ResendFormException();
					}

					$onComplete();
					return;
				}

				if($data < 0 || $data >= count($values)){
					throw new InvalidFormResponseException("MenuForm response is out of range");
				}

				$request->put($this->local, $this->id, $values[$data]);
			});
		});
	}
}
