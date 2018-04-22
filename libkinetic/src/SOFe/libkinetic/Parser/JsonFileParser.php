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

namespace SOFe\libkinetic\Parser;

use function array_change_key_case;
use function fclose;
use function json_decode;
use function stream_get_contents;
use function strtoupper;
use const CASE_UPPER;

class JsonFileParser extends KineticFileParser{
	private $json;

	public function __construct($fh, string $fileName){
		parent::__construct();
		$this->json = json_decode(stream_get_contents($fh), true);
		fclose($fh);
	}

	public function parse() : void{
		$this->traverseNode($this->json);
	}

	public function traverseNode(array $node) : void{
		$this->startElement(null, strtoupper($node["name"]), array_change_key_case($node["attrs"] ?? [], CASE_UPPER));
		foreach($node["children"] as $child){
			$this->traverseNode($child);
		}
		if(isset($node["text"])){
			$this->parseText(null, $node["text"]);
		}
		$this->endElement(null, $node["name"]);
	}
}
