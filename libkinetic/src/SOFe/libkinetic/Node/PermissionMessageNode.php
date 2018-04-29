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

namespace SOFe\libkinetic\Node;

use SOFe\libkinetic\KineticManager;

class PermissionMessageNode extends KineticNode{
	/** @var string */
	protected $message;

	public function acceptText(string $text) : void{
		$this->message = $text;
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		$manager->requireTranslation($this, $this->message);
	}

	public function getMessage() : string{
		return $this->message;
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"message" => $this->message,
			];
	}
}
