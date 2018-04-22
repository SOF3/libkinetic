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

namespace SOFe\libkinetic\Nodes\Window;

use SOFe\libkinetic\Nodes\KineticNode;
use SOFe\libkinetic\ParseException;

/**
 * A window represents a form that can be displayed to the user.
 */
class WindowNode extends KineticNode{
	/** @var string */
	protected $id;
	/** @var string */
	protected $title;
	/** @var SynopsisNode */
	protected $synopsis;

	public function setAttribute(string $name, string $value) : bool{
		if($name === "ID"){
			$this->id = ($this->parent instanceof WindowNode ? ($this->parent->id . ".") : "") . $value;
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
		$this->requireAttribute("id", "title");
	}

	public function startChild(string $name) : ?KineticNode{
		if($name === "SYNOPSIS"){
			if($this->synopsis !== null){
				throw new ParseException("Multiple <SYNOPSIS> tags for window $this->id");
			}
			return new SynopsisNode();
		}
		return null;
	}

	public function getId() : string{
		return $this->id;
	}

	public function getName() : string{
		return $this->name;
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"id" => $this->id,
				"title" => $this->title,
				"synopsis" => $this->synopsis,
			];
	}
}
