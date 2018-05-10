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

namespace SOFe\Libkinetic\Form;

use pocketmine\event\Listener;
use pocketmine\event\server\DataPacketReceiveEvent;
use pocketmine\network\mcpe\protocol\ModalFormResponsePacket;
use SOFe\Libkinetic\KineticManager;
use function json_decode;

class FormListener implements Listener{
	/** @var KineticManager */
	protected $manager;

	public function __construct(KineticManager $actionManager){
		$this->manager = $actionManager;
	}

	/**
	 * @param DataPacketReceiveEvent $event
	 * @ignoreCancelled true
	 */
	public function e_packetRecv(DataPacketReceiveEvent $event) : void{
		if($event->getPacket()::NETWORK_ID === ModalFormResponsePacket::NETWORK_ID){
			/** @var ModalFormResponsePacket $packet */
			$packet = $event->getPacket();
			$this->manager->handleFormResponse($event->getPlayer(), $packet->formId, json_decode($packet->formData));
		}
	}
}
