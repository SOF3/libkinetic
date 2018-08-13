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

namespace SOFe\Libkinetic\Parser\Attribute;

use SOFe\Libkinetic\Base\KineticNode;
use SOFe\Libkinetic\Parser\KineticFileParser;
use function array_slice;
use function count;
use function explode;
use function implode;
use function mb_strtoupper;

class AttributeRouter{
	/** @var KineticNode */
	protected $node;
	/** @var string[] */
	protected $attributes;
	/** @var AttributeFieldPair[] */
	protected $resolves = [];

	public function __construct(KineticNode $node, array $attributes){
		$this->node = $node;
		$this->attributes = $attributes;
	}

	public function use(string $name, NodeAttribute $attribute, &$field, bool $required, string $ns = KineticFileParser::XMLNS_DEFAULT) : AttributeRouter{
		$fullName = $ns . ":" . mb_strtoupper($name);
		if(!isset($this->attributes[$fullName])){
			if($required){
				$nsPrefix = $ns === KineticFileParser::XMLNS_DEFAULT ? "" : "\"$ns\":";
				throw $this->node->throw("Required attribute {$nsPrefix}{$name} missing");
			}
			return $this;
		}
		$attr = $this->attributes[$fullName];
		unset($this->attributes[$fullName]);

		$field = $attribute->accept($this->node, $attr);
		if($attribute instanceof ResolvableNodeAttribute){
			$this->resolves[] = new AttributeFieldPair($attribute, $field);
		}
		return $this;
	}

	public function checkEmpty() : void{
		if(!empty($this->attributes)){
			$attributes = [];
			foreach($this->attributes as $key => $value){
				$pieces = explode(":", $key);
				$ns = implode(":", array_slice($pieces, 0, -1));
				$name = $pieces[count($pieces) - 1];
				$attributes[] = ($ns === KineticFileParser::XMLNS_DEFAULT ? "" : "\"{$ns}\":") . $name;
			}
			$this->node->throw("Unknown attribute(s) " . implode(", ", $attributes));
		}
	}

	public function resolveAll() : void{
		foreach($this->resolves as &$resolve){
			$resolve->resolve($this->node);
		}
	}
}
