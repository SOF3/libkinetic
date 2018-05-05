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

use pocketmine\network\mcpe\protocol\ModalFormRequestPacket;
use pocketmine\Player;
use function json_encode;
use function microtime;

final class Form{
	/** @var int */
	public $formId;
	/** @var array */
	public $formData;
	/** @var callable */
	public $onReceive;
	/** @var Player */
	public $target;
	/** @var float */
	public $sendTime;
	/** @var int */
	public $sendTimes = 0;

	public function sendPacket() : ModalFormRequestPacket{
		$packet = new ModalFormRequestPacket;
		$packet->formId = $this->formId;
		$packet->formData = json_encode($this->formData);
		$this->target->dataPacket($packet);

		$this->sendTime = microtime(true);
		++$this->sendTimes;

		return $packet;
	}
}
