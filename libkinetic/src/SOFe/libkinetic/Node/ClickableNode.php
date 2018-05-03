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

namespace SOFe\libkinetic\Node;

use SOFe\libkinetic\ClickHandler;
use SOFe\libkinetic\KineticManager;

abstract class ClickableNode extends KineticNode{
	/** @var string */
	protected $title;

	/** @var string|null */
	protected $onClick = null;
	/** @var ClickHandler|null */
	protected $onClickHandler = null;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "TITLE"){
			$this->title = $value;
			return true;
		}

		if($name === "ON" . "CLICK"){
			$this->onClick = $value;
			return true;
		}

		return false;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$this->onClickHandler = $manager->resolveClass($this, $this->onClick, ClickHandler::class);
	}

	public function getOnClickHandler() : ?ClickHandler{
		return $this->onClickHandler;
	}
}
