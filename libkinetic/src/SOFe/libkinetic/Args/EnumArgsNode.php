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

use SOFe\libkinetic\Element\ElementNode;
use SOFe\libkinetic\InvalidFormResponseException;
use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\WindowRequest;
use function array_splice;
use function count;

class EnumArgsNode extends ArgsWindowNode{
	/** @var string */
	protected $synopsis;
	/** @var string */
	protected $addItem;
	/** @var string */
	protected $eachFormat;
	/** @var string */
	protected $submit;
	/** @var EnumEachNode */
	protected $each;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "SYNOPSIS"){
			$this->synopsis = $value;
			return true;
		}

		if($name === "ADD" . "ITEM"){
			$this->addItem = $value;
			return true;
		}
		if($name === "EACH" . "FORMAT"){
			$this->eachFormat = $value;
			return true;
		}
		if($name === "SUBMIT"){
			$this->submit = $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->requireAttributes("addItem", "eachFormat", "submit");
	}

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "EACH"){
			if(isset($this->each)){
				throw new InvalidNodeException("Only one <each> is allowed", $this);
			}
			return $this->each = new EnumEachNode();
		}

		return null;
	}

	public function endElement() : void{
		parent::endElement();
		$this->requireElements("each");
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$manager->requireTranslation($this, $this->synopsis);
		$manager->requireTranslation($this, $this->addItem);
		$manager->requireTranslation($this, $this->eachFormat);
		$manager->requireTranslation($this, $this->submit);
	}

	public function sendForm(WindowRequest $request, callable $onComplete, bool $explicit) : void{
		if($explicit || ($this->required && !$request->hasKey($this->id))){
			$this->sendMenu($request, [], $explicit, $onComplete);
		}else{
			$onComplete();
		}
	}

	private function sendMenu(WindowRequest $request, array $items, bool $explicit, callable $onComplete) : void{
		$buttons = [];
		$buttons[] = [
			"text" => $request->translate($this->addItem),
		];

		foreach($items as $item){
			$subRequest = clone $request;
			foreach($item as $k => $v){
				$subRequest->put(true, $k, $v);
			}
			$buttons[] = [
				"text" => $request->translate($this->eachFormat),
			];
			// TODO add image adapter
		}

		$buttons[] = [
			"text" => $request->translate($this->submit),
		];
		// TODO design images, put them in icons/ and access them through cdn.rawgit.com

		$form = [
			"type" => "form",
			"title" => $request->translate($this->title),
			"content" => $request->translate($this->synopsis),
			"buttons" => $buttons,
		];

		$this->manager->sendForm($request->getPlayer(), $form, function(?int $choice) use ($request, $items, $explicit, $onComplete){
			if($choice === null){
				// TODO onCancel API
				return;
			}

			if($choice === 0){
				$contents = [];
				$adapters = [];
				foreach($elements=$this->each->getElements() as $element){
					$adapter = ElementNode::class . "::cat";
					$contents[] = $element->asFormComponent($request, $adapter);
					$adapters[] = $adapter;
				}

				$form = [
					"type" => "custom_form",
					"title" => $request->translate($this->each->getTitle()),
					"content" => $contents,
				];

				$this->manager->sendForm($request->getPlayer(), $form, function(?array $data) use($request, $items, $explicit, $onComplete, $elements, $adapters){
					if($data === null){
						$this->sendMenu($request, $items, $explicit, $onComplete);
						return;
					}

					$item = [];
					foreach($elements as $i => $element){
						$item[$element->getId()] = $adapters[$i]($data[$i]);
					}
					$items[] = $item;

					$this->sendMenu($request, $items, $explicit, $onComplete);
				});
				return;
			}

			if(isset($items[$choice - 1])){
				array_splice($items, $choice - 1, 1);
				$this->sendMenu($request, $items, $explicit, $onComplete);
				return;
			}

			if($choice === count($items) + 1){
				$request->put($this->local, $this->id, $items);
				$onComplete();
				return;
			}

			throw new InvalidFormResponseException("Int value is out of bounds");
		});
	}
}
