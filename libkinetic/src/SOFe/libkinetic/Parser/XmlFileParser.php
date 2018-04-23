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

use RuntimeException;
use SOFe\libkinetic\InvalidNodeException;
use SOFe\libkinetic\ParseException;
use function extension_loaded;
use function fclose;
use function feof;
use function fread;
use function xml_error_string;
use function xml_get_current_column_number;
use function xml_get_current_line_number;
use function xml_get_error_code;
use function xml_parse;
use function xml_parser_create;
use function xml_parser_free;
use function xml_parser_set_option;
use function xml_set_character_data_handler;
use function xml_set_element_handler;
use function xml_set_object;
use const XML_OPTION_CASE_FOLDING;
use const XML_OPTION_SKIP_WHITE;

class XmlFileParser extends KineticFileParser{
	/** @var resource */
	private $fh;
	/** @var string */
	private $fileName;

	public function __construct($fh, string $fileName){
		parent::__construct();

		if(!extension_loaded("xml")){
			throw new RuntimeException("Extension \"xml\" is missing on this server");
		}
		$this->fh = $fh;
		$this->fileName = $fileName;
	}

	public function parse() : void{
		$parser = xml_parser_create();
		xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 1);
		xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
		xml_set_object($parser, $this);
		xml_set_element_handler($parser, "startElement", "endElement");
		xml_set_character_data_handler($parser, "parseText");
		try{
			while(!feof($this->fh)){
				$buffer = fread($this->fh, 4096);
				if(xml_parse($parser, $buffer, feof($this->fh)) === 0){
					$errorCode = xml_get_error_code($parser);
					throw new ParseException(xml_error_string($errorCode));
				}
			}
		}catch(ParseException $ex){
			$errorLine = xml_get_current_line_number($parser);
			$errorColumn = xml_get_current_column_number($parser);
			throw new ParseException("Failed parsing $this->fileName: {$ex->getMessage()} on line {$errorLine}:{$errorColumn}", 0);
		}finally{
			xml_parser_free($parser);
			fclose($this->fh);
		}
	}
}
