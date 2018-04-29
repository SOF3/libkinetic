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

namespace SOFe\libkinetic\Node\Window;

use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\Node\Entry\DirectEntryWindowNode;

/**
 * TextNode is displayed as a ModalForm that renders the translated message specified in the `content` attribute.. The child nodes `<button1>` and `<button2>` can be specified to change the messages and behaviour. By default, they are "Back" and "Quit".
 *
 * Note that there is no button to close a ModalForm, so the player must either click button1 or button2, unless they quit the game.
 */
class TextNode extends DirectEntryWindowNode{
	protected $content;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "CONTENT"){
			$this->content = $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();

		$this->requireAttributes("content");
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$manager->requireTranslation($this, $this->content);
	}
}
