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

namespace SOFe\Libkinetic\Parser\Router;

use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Base\KineticNode;
use SOFe\Libkinetic\Parser\KineticFileParser;
use function assert;
use function mb_strtoupper;
use const PHP_INT_MAX;

class ChildNodeRouter{
	/** @var KineticNode */
	protected $parent;
	/** @var ChildNodeAccept[] */
	protected $accepts = [];
	/** @var callable[] */
	protected $validators = [];

	public function __construct(KineticNode $parent){
		$this->parent = $parent;
	}

	/**
	 * API for KineticComponents to declare an accepted child node, which can only appear once.
	 *
	 * @param string                $name
	 * @param string                $componentClass
	 * @param KineticComponent|null &$field
	 * @param bool                  $optional
	 * @param KineticNode|null      &$node
	 * @param string                $ns
	 * @return ChildNodeRouter
	 */
	public function acceptSingle(string $name, string $componentClass, ?KineticComponent &$field, bool $optional, ?KineticNode &$node = null, string $ns = KineticFileParser::XMLNS_DEFAULT) : ChildNodeRouter{
		return $this->acceptSingleFunc($name, function() use ($componentClass, &$field){
			$field = new $componentClass;
			assert($field instanceof KineticComponent);
			return [$field];
		}, $optional, $node, $ns);
	}

	public function acceptSingleFunc(string $name, callable $componentsProvider, bool $optional, ?KineticNode &$node = null, string $ns = KineticFileParser::XMLNS_DEFAULT) : ChildNodeRouter{
		$this->accepts["$ns:" . mb_strtoupper($name)] = new ChildNodeAccept($this->parent, $ns, $name, $node, false, $optional ? 0 : 1, 1, $componentsProvider);
		return $this;
	}

	/**
	 * API for KineticComponents to declare an accepted child node, which can appear multiple times.
	 *
	 * @param string             $name
	 * @param string             $componentClass
	 * @param KineticComponent[] &$components
	 * @param int                $min
	 * @param int                $max
	 * @param KineticNode[]|null &$nodes
	 * @param string             $ns
	 * @return ChildNodeRouter
	 */
	public function acceptMulti(string $name, string $componentClass, array &$components, int $min, int $max = PHP_INT_MAX, ?array &$nodes = null, string $ns = KineticFileParser::XMLNS_DEFAULT) : ChildNodeRouter{
		if($nodes === null){
			$nodes = [];
		}
		return $this->acceptMultiFunc($name, function() use ($componentClass, &$components){
			$comp = new $componentClass;
			$components[] = $comp;
			return [$comp];
		}, $nodes, $min, $max, $ns);
	}

	public function acceptMultiFunc(string $name, callable $componentsProvider, array &$nodes, int $min = 0, int $max = PHP_INT_MAX, string $ns = KineticFileParser::XMLNS_DEFAULT) : ChildNodeRouter{
		$this->accepts["$ns:" . mb_strtoupper($name)] = new ChildNodeAccept($this->parent, $ns, $name, $nodes, true, $min, $max, $componentsProvider);
		return $this;
	}

	/**
	 * Internal method triggered by the parser to handle an actual new child element
	 *
	 * @param string $ns
	 * @param string $name
	 * @return KineticNode
	 */
	public function startChild(string $ns, string $name) : KineticNode{
		$full = $ns . ":" . mb_strtoupper($name);
		if(!isset($this->accepts[$full])){
			$nsFriendly = $ns === KineticFileParser::XMLNS_DEFAULT ? "" : "\"{$ns}\":";
			throw $this->parent->throw("<{$nsFriendly}{$name}> is not a valid child element");
		}

		$accept = $this->accepts[$full];
		return $accept->create();
	}

	/**
	 * Called after the element ends, checks if all child elements have been corrected
	 */
	public function validate() : void{
		foreach($this->accepts as $accept){
			$accept->validate();
		}
		foreach($this->validators as $validator){
			$validator();
		}
	}

	public function addValidator(callable $callback) : void{
		$this->validators[] = $callback;
	}
}
