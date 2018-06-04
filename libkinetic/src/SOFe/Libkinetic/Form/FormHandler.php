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

use pocketmine\Player;
use RuntimeException;
use SOFe\Libkinetic\InvalidFormResponseException;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\Util\CallbackTask;
use TypeError;
use function microtime;
use function random_int;

class FormHandler{
	public static $FORM_RESEND_TIME = 10.0;

	/** @var Form[] formId => form */
	protected $forms = [];
	/** @var KineticManager */
	private $manager;

	public function __construct(KineticManager $manager){
		$this->manager = $manager;
		$manager->getPlugin()->getServer()->getPluginManager()->registerEvents(new FormListener($this), $manager->getPlugin());
		$manager->getPlugin()->getScheduler()->scheduleRepeatingTask(new CallbackTask([$this, "cleanExpiredForms"]), 200);
	}

	public function getManager() : KineticManager{
		return $this->manager;
	}

	public function sendForm(Player $target, array $formData, callable $handler) : int{
		$form = new Form();
		$form->formId = random_int(0, 0x7FFFFFFF);
		$form->formData = $formData;
		$form->onReceive = $handler;
		$form->target = $target;

		$this->forms[$form->formId] = $form;
		$form->sendPacket();
		return $form->formId;
	}

	public function handleFormResponse(Player $player, int $formId, $response) : void{
		if(!isset($this->forms[$formId])){
			return;
		}

		$form = $this->forms[$formId];
		if($player !== $form->target){
			$this->manager->getPlugin()->getLogger()->error("{$player->getName()} tried respond to a form that was sent to {$form->target->getName()}. There is 99.99999999999999% chance that the plugin is outdated, shoghi needs to be blamed or the player is hacking poorly.");
			return;
		}
		unset($this->forms[$formId]);

		try{
			$result = ($form->onReceive)($response, $player);
			if($result === true){
				$this->sendForm($player, $form->formData, $form->onReceive);
			}
		}/** @noinspection BadExceptionsProcessingInspection */catch(ResendFormException $ex){
			$this->forms[$formId] = $form;
			$form->sendPacket();
		}catch(TypeError|InvalidFormResponseException $error){
			throw new RuntimeException("{$player->getName()} responded to a form with invalid data. Is {$this->manager->getPlugin()->getName()} using an outdated version of libkinetic?", 0, $error);
		}
	}

	public function cleanExpiredForms() : void{
		foreach($this->forms as $formId => $form){
			if(!$form->target->isOnline()){
				unset($this->forms[$formId]);
				continue;
			}

			if($form->sendTime + self::$FORM_RESEND_TIME < microtime(true)){
				$form->sendPacket();
			}
		}
	}
}
