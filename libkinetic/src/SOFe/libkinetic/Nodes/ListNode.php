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

namespace SOFe\libkinetic\Nodes;

use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\ListProvider;
use SOFe\libkinetic\ParseException;
use SOFe\libkinetic\Parser\KineticFileParser;
use function class_exists;
use function is_subclass_of;

/**
 * ListNode is displayed as a MenuForm. The buttons consist of three parts: before, list and after.
 *
 * <code>before</code> and <code>after</code> are specified in the <code>&lt;before&gt;</code> and <code>&lt;after&gt;</code> optional nodes respectively, each behaving as an <code>&lt;index&gt;</code> node.
 *
 * <code>list</code> is a dynamic list of data, provided by the ListProvider implementation class as specified in <code>&lt;provider&gt;</code>. It must be a class instantiable with one argument, the Plugin instance. Each button carries a value whose type is to the ListProvider's favour.
 *
 * When a button in <code>list</code> is clicked, the <code>&lt;each&gt;</code> is opened. <code>&lt;each&gt;</code> should be a node that contains exactly one configurable window node, i.e. another <code>&lt;list&gt;</code> or a <code>&lt;info&gt;</code>, or a <code>&lt;link&gt;</code> that points to a configurable window node.
 */
class ListNode extends ConfigurableWindowNode{
	/** @var string */
	protected $provider;
	/** @var BeforeAfterListNode|null */
	protected $before, $after;
	/** @var EachListNode */
	protected $each;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "PROVIDER"){
			$class = KineticFileParser::getParsingInstance()->getNamespace() . $value;
			if(KineticFileParser::$hasPm){
				if(!class_exists($class)){
					throw new ParseException("The class $class does not exist");
				}
				if(!is_subclass_of($class, ListProvider::class)){
					throw new ParseException("<LIST> provider class must implement " . ListProvider::class . "; not implemented by $class");
				}
			}
			$this->provider = $class;
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
			return $this->each = new EachListNode();
		}

		return null;
	}

	public function endElement() : void{
		parent::endElement();

		$this->requireElements("each");
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
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
