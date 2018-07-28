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

class ChildNodeAccept{
	/** @var KineticNode */
	protected $parent;
	/** @var string */
	protected $ns, $name, $humanName;
	/** @var KineticComponent|KineticComponent[] &$field */
	protected $field;
	/** @var bool */
	protected $array;
	/** @var int */
	protected $min, $max;
	/** @var callable */
	protected $componentsProvider;

	/** @var int */
	protected $counter = 0;

	public function __construct(string $ns, string $name, &$field, bool $array, int $min, int $max, callable $componentsProvider){
		$this->ns = $ns;
		$this->name = $name;
		$this->humanName = ($ns === KineticFileParser::XMLNS_DEFAULT ? "" : "\"{$ns}\":") . $name;
		$this->field = $field;
		$this->array = $array;
		$this->min = $min;
		$this->max = $max;
		$this->componentsProvider = $componentsProvider;
	}

	public function create() : KineticNode{
		++$this->counter;
		if($this->counter > $this->max){
			throw $this->parent->throw("At most {$this->max} <$this->name> element(s) are allowed");
		}
		$node = new KineticNode($this->parent->getParser(), $this->ns, $this->name, $this->parent, ($this->componentsProvider)());
		if($this->array){
			$this->field = $node;
		}else{
			$this->field[] = $node;
		}
		return $node;
	}

	public function validate() : void{
		if($this->array){
			if($this->min > $this->counter){
				throw $this->parent->throw("At least {$this->min} <$this->name> element(s) are required");
			}
		}elseif($this->min > $this->counter){
			assert($this->min === 1 && $this->counter === 0);
			throw $this->parent->throw("Required element <$this->name> is missing");
		}
	}
}
