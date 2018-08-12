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

namespace SOFe\Libkinetic\Parser;

use SOFe\Libkinetic\InvalidNodeException;
use SOFe\Libkinetic\ParseException;
use function array_change_key_case;
use function fclose;
use function json_decode;
use function stream_get_contents;
use function strtoupper;
use const CASE_UPPER;

class JsonFileParser extends KineticFileParser{
	protected $json;
	/** @var string */
	private $fileName;

	public function __construct($fh, string $fileName){
		parent::__construct();
		$this->json = json_decode(stream_get_contents($fh), true);
		fclose($fh);
		$this->fileName = $fileName;
	}

	public function parse() : void{
		try{
			$this->traverseNode($this->json);
		}catch(ParseException | InvalidNodeException $exception){
			$exception->setMessage("Error parsing $this->fileName: $exception");
		}
	}

	public function traverseNode(array $node) : void{
		/** @var string $nodeName */
		$nodeName = $node["<"];
		/** @var array[] $children */
		$children = $node["/"] ?? [];
		/** @var string|null $nodeText */
		$nodeText = $node[">"] ?? null;
		$attrs = $node;
		unset($attrs["<"]);
		if(isset($attrs["/"])){
			unset($attrs["/"]);
		}
		$this->startElement(null, strtoupper($nodeName), array_change_key_case($attrs ?? [], CASE_UPPER));
		foreach($children as $child){
			$this->traverseNode($child);
		}
		if($nodeText !== null){
			$this->parseText(null, $nodeText);
		}
		$this->endElement(null, $nodeName);
	}
}
