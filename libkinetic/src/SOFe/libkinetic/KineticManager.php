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
use SOFe\libkinetic\Parser\JsonFileParser;
use SOFe\libkinetic\Parser\KineticFileParser;
use SOFe\libkinetic\Parser\XmlFileParser;
use function extension_loaded;

class KineticManager{
	/** @var Plugin */
	private $plugin;
	/** @var KineticFileParser */
	private $parser;

	public function __construct(Plugin $plugin, string $xmlResource, string $jsonResource){
		KineticFileParser::$hasPm = true;
		$this->plugin = $plugin;
		$plugin->getServer()->getPluginManager()->registerEvents(new FormListener($this), $plugin);

		if(extension_loaded("xml")){
			$plugin->getLogger()->info("Loading XML kinetic file $xmlResource");
			KineticFileParser::$parsingInstance = $this->parser =
				new XmlFileParser($plugin->getResource($xmlResource), $xmlResource);
		}else{
			$plugin->getLogger()->info("Loading JSON kinetic file $xmlResource");
			KineticFileParser::$parsingInstance = $this->parser =
				new JsonFileParser($plugin->getResource($xmlResource), $xmlResource);
		}

		$this->parser->parse();

		$this->parser->getRoot()->resolve();

		KineticFileParser::$parsingInstance = null;
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
