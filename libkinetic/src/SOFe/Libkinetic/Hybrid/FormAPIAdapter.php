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

namespace SOFe\Libkinetic\Hybrid;

use Generator;
use jojoe77777\FormAPI\CustomForm;
use jojoe77777\FormAPI\Form;
use jojoe77777\FormAPI\ModalForm;
use jojoe77777\FormAPI\SimpleForm;
use pocketmine\Player;
use SOFe\Libkinetic\API\Icon;
use SOFe\Libkinetic\Element\ElementInterface;
use SOFe\Libkinetic\Flow\FlowCancelledException;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\Util\Await;
use SOFe\Libkinetic\Util\CallbackTask;

class FormAPIAdapter implements FormsAdapter{
	/** @var KineticManager */
	protected $manager;

	public function __construct(KineticManager $manager){
		$this->manager = $manager;
	}

	public function getManager() : KineticManager{
		return $this->manager;
	}

	public function sendModalForm(Player $player, string $title, string $text, string $trueText, string $falseText, float $timeout) : Generator{
		$form = new ModalForm(null);
		$form->setTitle($title);
		$form->setContent($text);
		$form->setButton1($trueText);
		$form->setButton2($falseText);
		yield from $this->sendForm($player, $form, $timeout);
	}

	public function sendMenuForm(Player $player, string $title, string $text, array $options, float $timeout) : Generator{
		$form = new SimpleForm(null);
		$form->setTitle($title);
		$form->setContent($text);
		/**
		 * @var string    $string
		 * @var Icon|null $icon
		 */
		foreach($options as [$string, $icon]){
			$type = -1;
			if($icon !== null){
				if($icon->getType() === Icon::TYPE_PATH){
					$type = SimpleForm::IMAGE_TYPE_PATH;
				}elseif($icon->getType() === Icon::TYPE_URL){
					$type = SimpleForm::IMAGE_TYPE_URL;
				}
			}
			$form->addButton($string, $type, $icon !== null ? $icon->getPath() : "");
		}
		yield from $this->sendForm($player, $form, $timeout);
	}

	public function sendCustomForm(FlowContext $context, Player $player, string $title, array $elements, float $timeout) : Generator{
		$form = new CustomForm(null);
		$form->setTitle($title);
		/** @var ElementInterface $element */
		foreach($elements as $element){
			$element->addToFormAPI($context, $form);
		}
		yield from $this->sendForm($player, $form, $timeout);
	}

	protected function sendForm(Player $player, Form $form, float $timeout) : Generator{
		$form->setCallable(yield);
		$player->sendForm($form);
		yield;
		$this->timeout(yield Await::REJECT, new FlowCancelledException(), $timeout);
		yield Await::RACE;
	}

	protected function timeout(callable $yield, $ret, float $seconds) : void{
		$this->manager->getPlugin()->getScheduler()->scheduleDelayedTask(new CallbackTask(function() use ($yield, $ret){
			$yield();
			return $ret;
		}), (int) ($seconds * 20));
	}
}
