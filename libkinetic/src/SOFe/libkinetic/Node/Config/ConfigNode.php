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

namespace SOFe\libkinetic\Node\Config;

use SOFe\libkinetic\Node\Element\ElementNode;
use SOFe\libkinetic\Node\KineticNode;

/**
 * `<config>` (ConfigNode) is a CustomForm whose layout is hardcoded in the kinetic file. All ElementNode subclasses are accepted as child nodes.
 */
class ConfigNode extends AbstractConfigWindowNode{
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

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"required" => $this->required,
				"elements" => $this->elements,
			];
	}
}
