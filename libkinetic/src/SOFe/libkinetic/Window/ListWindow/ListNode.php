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

namespace SOFe\libkinetic\Window\ListWindow;

use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\MenuProvider;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Window\ArguedWindowNode;

/**
 * ListNode is displayed as a MenuForm. The buttons consist of three parts: `<before>`, `<list>` and `<after>`.
 *
 * <code>before</code> and <code>after</code> are specified in the `<before>` and `<after>` optional nodes respectively, each behaving as an `<index>` node.
 *
 * <code>list</code> is a dynamic list of data, provided by the MenuProvider implementation class as specified in `<provider>`. It must be a class instantiable with one argument, the Plugin instance. Each button carries a value whose type is to the MenuProvider's favour.
 *
 * When a button in a `<list>` is clicked, the `<each>` is opened. `<each>` should be a node that contains exactly one configurable window node, i.e. another `<list>` or a `<info>`, or a `<link>` that points to a configurable window node.
 */
class ListNode extends ArguedWindowNode{
	/** @var string */
	protected $provider;
	/** @var MenuProvider */
	protected $providerObject;
	/** @var BeforeAfterListNode|null */
	protected $before = null;
	/** @var BeforeAfterListNode|null */
	protected $after = null;
	/** @var ListEachNode */
	protected $each;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "PROVIDER"){
			$this->provider = $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();

		$this->requireAttributes("provider");
	}

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($name === "BEFORE"){
			return $this->before = new BeforeListNode();
		}

		if($name === "AFTER"){
			return $this->after = new AfterListNode();
		}

		if($name === "EACH"){
			return $this->each = new ListEachNode();
		}

		return null;
	}

	public function endElement() : void{
		parent::endElement();

		$this->requireElements("each");
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);

		$this->providerObject = $manager->resolveClass($this, $this->provider, MenuProvider::class);

		if($this->before !== null){
			$this->before->cpn_resolve($manager);
		}
		if($this->after !== null){
			$this->after->cpn_resolve($manager);
		}

		$this->each->resolve($manager);
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"provider" => $this->provider,
				"before" => $this->before,
				"after" => $this->after,
				"each" => $this->each
			];
	}
}
