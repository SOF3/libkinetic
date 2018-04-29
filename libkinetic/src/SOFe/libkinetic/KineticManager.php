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
use SOFe\libkinetic\Listener\InteractListener;
use SOFe\libkinetic\Node\Entry\Item\ItemFilter;
use SOFe\libkinetic\Node\KineticNode;
use SOFe\libkinetic\Parser\JsonFileParser;
use SOFe\libkinetic\Parser\KineticFileParser;
use SOFe\libkinetic\Parser\XmlFileParser;
use function extension_loaded;

class KineticManager{
	/** @var Plugin */
	protected $plugin;
	/** @var LanguageProvider */
	protected $provider;
	/** @var KineticFileParser */
	protected $parser;

	/** @var InteractListener|null */
	protected $interactListener = null;

	public function __construct(Plugin $plugin, LanguageProvider $provider, string $xmlResource, string $jsonResource){
		KineticFileParser::$hasPm = true;
		$this->plugin = $plugin;
		$this->provider = $provider;
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

		$this->parser->getRoot()->resolve($this);

		KineticFileParser::$parsingInstance = null;
	}

	public function getPlugin() : Plugin{
		return $this->plugin;
	}

	public function getLanguageProvider() : LanguageProvider{
		return $this->provider;
	}

	public function requireTranslation(KineticNode $node, string $key) : void{
		if(!$this->provider->hasMessage($key)){
			throw new InvalidNodeException("The translation $key is undefined", $node);
		}
	}

	public function getParser() : KineticFileParser{
		return $this->parser;
	}

	public function registerItemHandler(ItemFilter $filter) : void{
		if($this->interactListener === null){
			$this->interactListener = new InteractListener($this);
			$this->plugin->getServer()->getPluginManager()->registerEvents($this->interactListener, $this->plugin);
		}

		$this->interactListener->filters[] = $filter;
	}
}
