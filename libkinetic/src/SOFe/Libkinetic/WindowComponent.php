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

namespace SOFe\Libkinetic;

use SOFe\Libkinetic\Clickable\ClickableComponent;

class WindowComponent extends KineticComponent{
	protected $title;
	protected $synopsis = null;

	public function setAttribute(string $name, string $value) : bool{
		if($name === "TITLE"){
			$this->title = $value;
			return true;
		}
		if($name === "SYNOPSIS"){
			$this->synopsis = $value;
			return true;
		}
		return false;
	}

	public function endElement() : void{
		if($this->title === null){
			if($this->node->hasComponent(ClickableComponent::class) && $this->node->asClickable()->getIndexName() !== null){
				$this->title = $this->node->asClickable()->getIndexName();
			}else{
				$this->requireAttribute("title", $this->title);
			}
		}
	}

	public function init() : void{
		$this->requireTranslation($this->title);
		$this->requireTranslation($this->synopsis);
	}
}
