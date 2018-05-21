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

use SOFe\Libkinetic\Element\ElementNode;
use SOFe\Libkinetic\InvalidFormResponseException;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\Node\KineticNode;
use SOFe\Libkinetic\ResendFormException;
use SOFe\Libkinetic\WindowRequest;
use function count;

/**
 * `<simpleArgs>` (SimpleArgsNode) is a CustomForm whose layout is hardcoded in the kinetic file. All ElementNode subclasses are accepted as child nodes.
 */
class SimpleArgsNode extends ArgsWindowNode{
	/** @var ElementNode[] */
	protected $elements = [];

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($delegate = ElementNode::byName($name)){
			return $this->elements[] = $delegate;
		}

		return null;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		foreach($this->elements as $node){
			$node->resolve($manager);
		}
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"elements" => $this->elements,
			];
	}

	public function sendForm(\pocketmine\Player $player, WindowRequest $request, callable $onComplete, bool $explicit) : void{
		if(!$explicit){
			if(!$this->required){
				$onComplete();
				return;
			}
			foreach($this->elements as $element){
				if(!$request->hasKey($this->composeId($element->getId()))){
					return;
				}
			}
		}

		/** @var array[] $contents */
		$contents = [];
		/** @var callable[] $adapters */
		$adapters = [];
		foreach($this->elements as $element){
			$adapter = ElementNode::class . "::cat";
			$contents[] = $element->asFormComponent($request, $adapter);
			$adapters[] = $adapter;
		}

		$this->manager->sendForm($player, [
			"type" => "custom_form",
			"title" => $request->translate($this->title),
			"content" => $contents,
		], function(?array $data) use ($request, $explicit, $adapters, $onComplete){
			if($data === null){
				// TODO onCancel API
				if($explicit){
					$onComplete();
					return;
				}

				throw new ResendFormException();
			}

			if(count($data) !== count($adapters)){
				throw new InvalidFormResponseException("Response from client is not consistent with the form sent");
			}

			for($i = 0, $iMax = count($data); $i < $iMax; ++$i){
				$datum = $adapters[$i]($data[$i]);
				$request->put($this->local, $this->composeId($this->elements[$i]->getId()), $datum);
			}

			$onComplete();
		});
	}
}
