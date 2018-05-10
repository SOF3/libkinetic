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

namespace SOFe\Libkinetic\Args;

use SOFe\Libkinetic\API\ComplexItemFactory;
use SOFe\Libkinetic\API\ComplexProvider;
use SOFe\Libkinetic\Element\ElementNode;
use SOFe\Libkinetic\InvalidFormResponseException;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\Node\KineticNode;
use SOFe\Libkinetic\ResendFormException;
use SOFe\Libkinetic\Util\BinaryArrayWrapper;
use SOFe\Libkinetic\WindowRequest;
use function count;

/**
 * `<cycleArgs>` is powered by an ComplexProvider. Each element is displayed as one or multiple ElementNode as indicated in EachCycleNode..
 */
class CycleArgsNode extends ArgsWindowNode{
	/** @var string */
	protected $provider;
	/** @var ComplexProvider */
	protected $providerObject;
	/** @var CycleEachNode */
	protected $each;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
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

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "EACH"){
			return $this->each = new CycleEachNode();
		}

		return null;
	}

	public function endElement() : void{
		parent::endElement();
		$this->requireElements("each");
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$this->providerObject = $manager->resolveClass($this, $this->provider, ComplexProvider::class);
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"provider" => $this->provider,
				"each" => $this->each,
			];
	}

	public function sendForm(WindowRequest $request, callable $onComplete, bool $explicit) : void{
		if(!$explicit && (!$this->required || $request->hasKey($this->id))){
			$onComplete();
			return;
		}

		$factory = new ComplexItemFactory();
		$this->providerObject->provide($factory, $request, function() use ($factory, $request, $onComplete, $explicit){
			$elements = $this->each->getElements();
			$keys = [];
			$contents = [];
			$adapters = [];
			$eachSize = count($elements);

			foreach($factory->getItems() as [$key, $arguments]){
				$keys[] = $key;
				$subRequest = clone $request;
				foreach($arguments as $k => $v){
					$subRequest->put(true, $k, $v);
				}

				foreach($elements as $element){
					$adapter = ElementNode::class . "::cat";
					$contents[] = $element->asFormComponent($request, $adapter);
					$adapters[] = $adapter;
				}
			}

			$form = [
				"type" => "custom_form",
				"title" => $request->translate($this->title),
				"content" => $contents,
			];

			$this->manager->sendForm($request->getPlayer(), $form, function(?array $data) use ($elements, $eachSize, $onComplete, $explicit, $keys, $adapters, $request){
				if($data === null){
					// TODO onCancel API
					if(!$explicit){
						throw new ResendFormException();
					}

					$onComplete();
					return;
				}

				if(count($data) !== $eachSize * count($keys)){
					throw new InvalidFormResponseException("Response to form is inconsistent with the form sent");
				}

				$output = [];
				foreach($keys as $i => $key){
					$set = [];
					foreach($elements as $j => $jValue){
						$set[$jValue->getId()] = $adapters[$i * $eachSize + $j]($data[$i * $eachSize + $j]);
					}
					$output[] = [$key, $set];
				}

				$request->put($this->local, $this->id, new BinaryArrayWrapper($output));
			});
		});
	}
}
