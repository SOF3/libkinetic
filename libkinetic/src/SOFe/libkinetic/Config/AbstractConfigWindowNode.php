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

namespace SOFe\libkinetic\Config;

use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\KineticNodeWithId;
use SOFe\libkinetic\Window\ConfigurableWindowNode;

class AbstractConfigWindowNode extends AbstractConfigNode implements KineticNodeWithId{
	/** @var string */
	protected $id;
	/** @var string */
	protected $title;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}
		if($name === "ID"){
			if(!($this->nodeParent instanceof ConfigurableWindowNode)){
				throw new InvalidNodeException("Only ConfigurableWindowNode can have AbstractConfigWindowNode children", $this);
			}
			$this->id = $this->nodeParent->getId() . "." . $value;
			return true;
		}

		if($name === "TITLE"){
			$this->title = $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->requireAttributes("title");
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$manager->requireTranslation($this, $this->title);
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"id" => $this->id,
				"title" => $this->title,
			];
	}

	public function getId() : string{
		return $this->id;
	}
}
