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

use SOFe\libkinetic\Parser\KineticFileParser;
use SOFe\libkinetic\Parser\XmlFileParser;

require_once __DIR__ . "/../cli-autoload.php";

if(!isset($argv[2])){
	throw new InvalidArgumentException("Usage: php $argv[0] validate <xml file>");
}
$file = $argv[2];
if(!is_file($file)){
	throw new InvalidArgumentException("$file is not a file");
}

KineticFileParser::$parsingInstance = $parser =
	new XmlFileParser(fopen($file, "rb"), basename($file));
$parser->parse();

echo json_encode($parser->getRoot());
