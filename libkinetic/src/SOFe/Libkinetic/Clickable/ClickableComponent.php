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

use Generator;
use Iterator;
use SOFe\Libkinetic\AbsoluteIdComponent;
use SOFe\Libkinetic\API\AsyncClickHandler;
use SOFe\Libkinetic\API\ClickHandler;
use SOFe\Libkinetic\ClickInterruptedException;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\Util\Await;
use SOFe\Libkinetic\WindowRequest;

class ClickableComponent extends KineticComponent implements ClickablePeerInterface{
	/** @var string|null */
	protected $indexName = null;
	/** @var string|null */
	protected $argName = null;

	/** @var string|null */
	protected $onClickClass = null;
	/** @var string|null */
	protected $onClickAsyncClass = null;
	/** @var ClickHandler|null */
	protected $onClick = null;
	/** @var AsyncClickHandler|null */
	protected $onClickAsync = null;

	public function dependsComponents() : Iterator{
		yield AbsoluteIdComponent::class;
	}

	public function setAttribute(string $name, string $value) : bool{
		if($name === "INDEX" . "NAME"){
			$this->indexName = $value;
			return true;
		}
		if($name === "ARG" . "NAME"){
			$this->argName = $value;
			return true;
		}
		if($name === "ON" . "CLICK"){
			$this->onClickClass = $value;
			return true;
		}
		if($name === "ON" . "CLICK" . "ASYNC"){
			$this->onClickAsyncClass = $value;
			return true;
		}
		return false;
	}

	public function endElement() : void{
		if(!$this->node->nodeParent->isRoot()){ // $this->node is in an index
			$this->requireAttribute("indexName", $this->indexName);
			if($this->argName !== null){
				$this->resolveConfigString($this->argName);
			}else{
				$this->argName = $this->asAbsoluteIdComponent()->getId();
			}
		}
	}

	public function resolve() : void{
		$this->onClick = $this->resolveClass($this->onClickClass, ClickHandler::class);
		$this->onClickAsync = $this->resolveClass($this->onClickAsyncClass, AsyncClickHandler::class);
	}

	public function getIndexName() : ?string{
		return $this->indexName;
	}

	public function getArgName() : string{
		return $this->argName;
	}

	public function getOnClick() : ClickHandler{
		return $this->onClick;
	}

	public function getOnClickAsync() : ?AsyncClickHandler{
		return $this->onClickAsync;
	}

	public function onClick(WindowRequest $request) : Generator{
		if($this->onClick !== null){
			try{
				$this->onClick->onClick($request);
			}catch(ClickInterruptedException $e){
				return false;
			}
		}
		if($this->onClickAsync !== null){
			yield Await::ASYNC => $this->onClickAsync->onClick($request, yield);
		}
		return true;
	}

	public function getPriority() : int{
		return self::PRIORITY_NORMAL;
	}
}
