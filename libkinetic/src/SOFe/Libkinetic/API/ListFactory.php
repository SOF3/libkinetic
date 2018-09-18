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

namespace SOFe\Libkinetic\API;

use InvalidArgumentException;
use SOFe\Libkinetic\UI\Standard\ListEntry;
use SOFe\Libkinetic\UserString;

class ListFactory{
	/** @var ListEntry[] */
	protected $entries = [];
	/** @var ListEntry|null */
	protected $default = null;

	public function add(string $commandName, UserString $displayName, $value, bool $default = false) : void{
		$this->entries[] = $entry = new ListEntry($commandName, $displayName, $value);

		if($default){
			if($this->default !== null){
				throw new InvalidArgumentException("Duplicate default value");
			}

			$this->default = $entry;
			$entry->setDefault(true);
		}
	}

	public function getDefault() : ?ListEntry{
		if($this->default === null){
			if(empty($this->entries)){
				return null;
			}
			$this->default = $this->entries[0];
			$this->default->setDefault(true);
		}
		return $this->default;
	}

	public function setDefault(string $commandName) : void{
		if($this->default !== null){
			throw new InvalidArgumentException("Default value already set");
		}

		foreach($this->entries as $entry){
			if($entry->getCommandName() === $commandName){
				$this->default = $entry;
				$entry->setDefault(true);
				return;
			}
		}

		throw new InvalidArgumentException("No entries with the mnemonic $commandName");
	}

	/**
	 * @return ListEntry[]
	 */
	public function getEntries() : array{
		$this->getDefault(); // set default if null
		return $this->entries;
	}
}
