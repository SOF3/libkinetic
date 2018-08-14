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

namespace SOFe\Libkinetic\Base;

use RuntimeException;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\libkinetic;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\StringAttribute;
use SOFe\Libkinetic\Parser\JsonFileParser;
use SOFe\Libkinetic\Parser\KineticFileParser;
use SOFe\Libkinetic\Parser\XmlFileParser;
use function basename;
use function fopen;
use function mb_strtolower;
use function parse_url;
use const PHP_URL_SCHEME;

class IncludeComponent extends KineticComponent{
	/** @var string */
	protected $path;
	/** @var RootComponent */
	protected $child;

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("path", new StringAttribute(), $this->path, true);
	}

	public function getPath() : string{
		return $this->path;
	}

	public function load(KineticManager $manager) : array{
		$resource = $this->openPath($manager, $baseName);
		/** @var KineticFileParser $parser */
		$parser = libkinetic::isShaded() ? new JsonFileParser($resource, $baseName) : new XmlFileParser($resource, $baseName);
		$parser->parse();
		$this->child = $parser->getRoot()->asRootComponent();

		$allNodes = $parser->getAllNodes();
		$this->child->loadIncludes($manager, $allNodes);
		return $allNodes;
	}

	/**
	 * @param KineticManager $manager
	 * @param                $baseName
	 * @return resource
	 */
	public function openPath(KineticManager $manager, &$baseName){
		$ext = libkinetic::isShaded() ? ".json" : ".xml";
		$baseName = basename($this->path) . $ext;
		switch($protocol = mb_strtolower(parse_url($this->path, PHP_URL_SCHEME) ?? "")){
			case "":
				return $manager->getPlugin()->getResource($this->path);
			case "http":
			case "https":
			case "ftp":
			case "file":
				return fopen($this->path, "rb");
			default:
				throw new RuntimeException("Cannot resolve unknown URL scheme $protocol");
		}
	}
}
