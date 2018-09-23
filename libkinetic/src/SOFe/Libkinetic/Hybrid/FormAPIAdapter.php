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
use pocketmine\form\FormValidationException;
use pocketmine\Player;
use SOFe\Libkinetic\API\Icon;
use SOFe\Libkinetic\Element\ElementInterface;
use SOFe\Libkinetic\Flow\FlowCancelledException;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\UI\Standard\IconListEntry;
use SOFe\Libkinetic\Util\Await;
use SOFe\Libkinetic\Util\CallbackTask;
use function array_values;
use function count;
use function is_array;
use function is_int;

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

	/**
	 * @param FlowContext     $context
	 * @param Player          $player
	 * @param string          $title
	 * @param string          $text
	 * @param IconListEntry[] $options
	 * @param float           $timeout
	 *
	 * @return Generator
	 */
	public function sendMenuForm(FlowContext $context, Player $player, string $title, string $text, array $options, float $timeout) : Generator{
		$form = new SimpleForm(null);
		$form->setTitle($title);
		$form->setContent($text);
		$values = [];
		foreach($options as $entry){
			$type = -1;
			$icon = $entry->getIcon();
			if($icon !== null){
				if($icon->getType() === Icon::TYPE_PATH){
					$type = SimpleForm::IMAGE_TYPE_PATH;
				}elseif($icon->getType() === Icon::TYPE_URL){
					$type = SimpleForm::IMAGE_TYPE_URL;
				}
			}
			$form->addButton($context->translateUserString($entry->getDisplay()), $type, $icon !== null ? $icon->getPath() : "");
			$values[] = $entry->getValue();
		}
		$response = yield $this->sendForm($player, $form, $timeout);
		if(!is_int($response)){
			throw new FormValidationException("Got non-int response for list form");
		}
		if($response < 0 || $response >= count($values)){
			throw new FormValidationException("Got out-of-bounds response for list form");
		}
		return $values[$response];
	}

	public function sendCustomForm(FlowContext $context, Player $player, string $title, array $elements, float $timeout) : Generator{
		$elements = array_values($elements);

		$form = new CustomForm(null);
		$form->setTitle($title);
		$temp = [];
		/** @var ElementInterface $element */
		foreach($elements as $i => $element){
			$temp[$i] = $element->addToFormAPI($context, $form);
		}
		$response = yield $this->sendForm($player, $form, $timeout);
		if(!is_array($response)){
			throw new FormValidationException("Got non-array response for custom form");
		}
		if(count($response) !== count($temp)){
			throw new FormValidationException("Got out-of-bounds response size for custom form");
		}

		foreach($elements as $i => $element){
			$element->parseFormResponse($context, $response[$i], $temp[$i]);
		}
	}

	protected function sendForm(Player $player, Form $form, float $timeout) : Generator{
		$form->setCallable(yield);
		$player->sendForm($form);
		yield;
		$this->timeout(yield Await::REJECT, new FlowCancelledException(), $timeout);
		return yield Await::RACE;
	}

	protected function timeout(callable $yield, $ret, float $seconds) : void{
		$this->manager->getPlugin()->getScheduler()->scheduleDelayedTask(new CallbackTask(function() use ($yield, $ret){
			$yield();
			return $ret;
		}), (int) ($seconds * 20));
	}
}
