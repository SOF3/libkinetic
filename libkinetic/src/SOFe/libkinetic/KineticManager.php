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

namespace SOFe\libkinetic;

use pocketmine\plugin\Plugin;
use function feof;
use function fread;
use function xml_error_string;
use function xml_get_error_code;
use function xml_parse;
use function xml_parser_create;
use function xml_parser_set_option;
use const XML_OPTION_CASE_FOLDING;
use const XML_OPTION_SKIP_WHITE;

class KineticManager{
	/** @var Plugin */
	private $plugin;
	/** @var KineticFileParser */
	private $parser;

	public function __construct(Plugin $plugin, string $resourceName){
		$this->plugin = $plugin;
		$plugin->getServer()->getPluginManager()->registerEvents(new FormListener($this), $plugin);

		$xmlParser = xml_parser_create();
		xml_parser_set_option($xmlParser, XML_OPTION_CASE_FOLDING, 1);
		xml_parser_set_option($xmlParser, XML_OPTION_SKIP_WHITE, 1);
		$this->parser = new KineticFileParser($xmlParser);

		$fh = $plugin->getResource($resourceName);
		try{
			while(!feof($fh)){
				$buffer = fread($fh, 4096);
				if(xml_parse($xmlParser, $buffer, feof($fh)) === 0){
					$errorCode = xml_get_error_code($xmlParser);
					throw new ParseException(xml_error_string($errorCode));
				}
			}
		}catch(ParseException $ex){
			$errorLine = xml_get_current_line_number($xmlParser);
			$errorColumn = xml_get_current_column_number($xmlParser);
			throw new ParseException("Failed parsing $resourceName: {$ex->getMessage()} on line {$errorLine}:{$errorColumn}");
		}finally{
			fclose($fh);
		}
	}

	public
	function getPlugin() : Plugin{
		return $this->plugin;
	}

	public
	function getParser() : KineticFileParser{
		return $this->parser;
	}
}
