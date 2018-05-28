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

namespace SOFe\Libkinetic\Clickable;

use Iterator;
use SOFe\Libkinetic\AbsoluteIdComponent;
use SOFe\Libkinetic\API\ClickHandler;
use SOFe\Libkinetic\ClickInterruptedException;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\WindowRequest;

class ClickableComponent extends KineticComponent implements ClickablePeer{
	/** @var string|null */
	protected $indexName = null;

	/** @var string|null */
	protected $onClickClass = null;
	/** @var ClickHandler=null */
	protected $onClick = null;

	public function dependsComponents() : Iterator{
		yield AbsoluteIdComponent::class;
	}

	public function setAttribute(string $name, string $value) : bool{
		if($name === "INDEX" . "NAME"){
			$this->indexName = $value;
			return true;
		}
		if($name === "ON" . "CLICK"){
			$this->onClickClass = $value;
			return true;
		}
		return false;
	}

	public function endElement() : void{
		if(!$this->node->nodeParent->isRoot()){ // $this->node is in an index
			$this->requireAttribute("indexName", $this->indexName);
		}
	}

	public function init() : void{
		$this->onClick = $this->resolveClass($this->onClickClass, ClickHandler::class);
	}

	public function getIndexName() : ?string{
		return $this->indexName;
	}

	public function getOnClick() : ClickHandler{
		return $this->onClick;
	}

	public function onClick(WindowRequest $request) : bool{
		if($this->onClick !== null){
			try{
				$this->onClick->onClick($request);
			}catch(ClickInterruptedException $e){
				return true;
			}
		}
		return false;
	}

	public function getPriority() : int{
		return self::PRIORITY_NORMAL;
	}
}
