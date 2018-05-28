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

use Iterator;
use SOFe\Libkinetic\InvalidFormResponseException;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\WindowRequest;

class LabelComponent extends KineticComponent implements ElementInterface{
	public function dependsComponents() : Iterator{
		yield ElementComponent::class;
	}

	public function asFormComponent(WindowRequest $request, callable $onComplete) : void{
		$onComplete([
			"type" => "label",
			"text" => $request->translate($this->node->asElement()->getTitle()),
		], [$this, "adapter"]);
	}

	public function adapter($null){
		if($null !== null){
			throw new InvalidFormResponseException("Response for label component should be null");
		}
		return null;
	}
}
