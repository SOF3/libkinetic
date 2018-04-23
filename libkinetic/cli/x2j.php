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

require_once __DIR__ . "/../cli-autoload.php";

if(!isset($argv[3])){
	throw new InvalidArgumentException("Usage: php $argv[0] x2j <xml file> <json file>");
}
$xml = $argv[2];
if(!is_file($xml)){
	throw new InvalidArgumentException("$xml is not a file");
}
$json = $argv[3];

$parser = xml_parser_create();
xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 1);
xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);

$stack = [];
$last = null;

xml_set_element_handler($parser, function($parser, $name, $attrs) use (&$stack){
	$node = [
		"name" => $name,
	];
	if(!empty($attrs)){
		$node["attrs"] = $attrs;
	}
	if(!empty($stack)){
		$stack[count($stack) - 1]["children"][] =& $node;
	}
	$stack[] =& $node;
}, function() use (&$stack, &$last){
	$tail =& $stack[count($stack) - 1];
	if(isset($tail["text"]) && $tail["text"] !== ""){
		$tail["text"] = trim(implode(" ", array_map("trim", explode("\n", $tail["text"]))));
		if($tail["text"] === ""){
			unset($tail["text"]);
		}
	}
	$last = array_pop($stack);
});
xml_set_character_data_handler($parser, function($parser, $text) use (&$stack){
	if($text !== ""){
		$tail =& $stack[count($stack) - 1];
		if(!isset($tail["text"])){
			$tail["text"] = "";
		}
		$tail["text"] .= $text;
	}
});

xml_parse($parser, file_get_contents($xml), true);
xml_parser_free($parser);

file_put_contents($json, json_encode($last, $argv[4] === "min" ? 0 : JSON_PRETTY_PRINT) . "\n");
