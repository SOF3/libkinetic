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

namespace SOFe\libkinetic\Config;

use SOFe\libkinetic\KineticManager;
use SOFe\libkinetic\ListProvider;

/**
 * `<listConfig>` (ListConfig) is a variant of `<list>` as a Config. It is a MenuForm whose buttons are provided through a ListProvider implementation. The whole config only outputs one value, which is the chosen button.
 */
class ListConfigNode extends AbstractConfigWindowNode{
	/** @var string */
	protected $provider;
	/** @var ListProvider */
	protected $providerObject;

	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "PROVIDER"){
			$this->provider = $value;
			return true;
		}

		return false;
	}

	public function endAttributes() : void{
		parent::endAttributes();
		$this->requireAttributes("provider");
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$this->providerObject = $manager->resolveClass($this, $this->provider, ListProvider::class);
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"provider" => $this->provider,
			];
	}
}
