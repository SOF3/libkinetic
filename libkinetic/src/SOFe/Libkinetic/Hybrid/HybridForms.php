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
use pocketmine\Player;
use SOFe\Libkinetic\Element\ElementInterface;
use SOFe\Libkinetic\Flow\FlowCancelledException;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\LibkineticMessages;
use SOFe\Libkinetic\UI\Standard\IconListEntry;
use SOFe\Libkinetic\UserString;
use function microtime;

class HybridForms{
	/**
	 * @param FlowContext     $context
	 * @param UserString      $title
	 * @param UserString      $synopsis
	 * @param IconListEntry[] $options
	 * @param float           $timeout
	 *
	 * @return Generator
	 */
	public static function list(FlowContext $context, UserString $title, UserString $synopsis, array $options, float $timeout) : Generator{
		$user = $context->getUser();
		$choice = yield $user instanceof Player ?
			self::listPlayer($context, $user, $title, $synopsis, $options, $timeout) :
			self::listNonPlayer($context, $title, $synopsis, $options, $timeout);
	}

	public static function listPlayer(FlowContext $context, Player $player, UserString $title, UserString $synopsis, array $options, float $timeout) : Generator{
		return yield $context->getManager()->getFormsAdapter()->sendMenuForm($context, $player, $context->translateUserString($title), $context->translateUserString($synopsis), $options, $timeout);
	}

	/**
	 * @param FlowContext     $context
	 * @param null|UserString $title
	 * @param UserString      $synopsis
	 * @param IconListEntry[] $strings
	 * @param float           $timeout
	 *
	 * @return Generator
	 */
	public static function listNonPlayer(FlowContext $context, ?UserString $title, UserString $synopsis, array $strings, float $timeout) : Generator{
		if($title !== null){
			$context->send(LibkineticMessages::LIST_CLI_TITLE, ["title" => $context->translateUserString($title)]);
		}
		$context->send(LibkineticMessages::LIST_CLI_SYNOPSIS, ["synopsis" => $context->translateUserString($synopsis)]);


		while(true){
			$context->send(LibkineticMessages::LIST_CLI_INSTRUCTION, ["cont" => $context->getManager()->getContName()]);
			$choices = [];
			foreach($strings as $entry){
				$choices[$entry->getMnemonic()] = $entry->getValue();
				$context->send(LibkineticMessages::LIST_CLI_OPTION, [
					"mnemonic" => $entry->getMnemonic(),
					"display" => $entry->getDisplay(),
				]);
			}
			$choice = yield $context->getManager()->waitCont($context->getUser(), $timeout);
			if(isset($choices[$choice])){
				return $choices[$choice];
			}
			$context->send(LibkineticMessages::CLI_WRONG_INPUT);
		}
	}


	/**
	 * @param FlowContext        $context
	 * @param UserString         $title
	 * @param ElementInterface[] $elements
	 * @param float              $timeout
	 *
	 * @return Generator
	 */
	public static function custom(FlowContext $context, UserString $title, array $elements, float $timeout) : Generator{
		$user = $context->getUser();
		if($user instanceof Player){
			$data = yield self::customPlayer($context, $user, $title, $elements, $timeout);
		}else{
			$data = yield self::customNonPlayer($context, $title, $elements, $timeout);
		}
		return $data;
	}

	public static function customPlayer(FlowContext $context, Player $player, UserString $title, array $elements, float $timeout) : Generator{
		return yield $context->getManager()->getFormsAdapter()->sendCustomForm($context, $player, $context->translateUserString($title), $elements, $timeout);
	}

	/**
	 * @param FlowContext        $context
	 * @param UserString         $title
	 * @param ElementInterface[] $elements
	 * @param float              $timeout
	 *
	 * @return Generator
	 */
	public static function customNonPlayer(FlowContext $context, UserString $title, array $elements, float $timeout) : Generator{
		$context->send(LibkineticMessages::CUSTOM_CLI_TITLE, ["title" => $context->translateUserString($title)]);
		$expiry = microtime(true) + $timeout;

		$data = [];
		foreach($elements as $element){
			$remaining = $expiry - microtime(true);
			if($remaining <= 0.0){
				throw new FlowCancelledException();
			}
			$data[$element->getNode()->asElementComponent()->getId()] = yield $element->requestCli($context, $expiry);
		}

		return $data;
	}


	public static function modal(FlowContext $context, UserString $title, UserString $synopsis, ?string $yesCommand, ?UserString $yesDisplay, ?string $noCommand, ?UserString $noDisplay, float $timeout) : Generator{
		$yesCommand = $yesCommand ?? "y";
		$yesDisplay = $yesDisplay ?? new UserString(LibkineticMessages::MODAL_YES);
		$noCommand = $noCommand ?? "n";
		$noDisplay = $noDisplay ?? new UserString(LibkineticMessages::MODAL_NO);

		$user = $context->getUser();
		if($user instanceof Player){
			$data = yield self::modalPlayer($context, $user, $title, $synopsis, $yesDisplay, $noDisplay, $timeout);
		}else{
			$data = yield self::modalNonPlayer($context, $title, $synopsis, $yesCommand, $yesDisplay, $noCommand, $noDisplay, $timeout);
		}
		return $data;
	}

	public static function modalPlayer(FlowContext $context, Player $player, UserString $title, UserString $synopsis, UserString $yesDisplay, UserString $noDisplay, float $timeout) : Generator{
		return yield $context->getManager()->getFormsAdapter()->sendModalForm($player, $context->translateUserString($title), $context->translateUserString($synopsis), $context->translateUserString($yesDisplay), $context->translateUserString($noDisplay), $timeout);
	}

	public static function modalNonPlayer(FlowContext $context, UserString $title, UserString $synopsis, string $yesCommand, UserString $yesDisplay, string $noCommand, UserString $noDisplay, float $timeout) : Generator{
		$context->send(LibkineticMessages::MODAL_CLI_TITLE, ["title" => $context->translateUserString($title)]);
		$context->send(LibkineticMessages::MODAL_CLI_SYNOPSIS, ["synopsis" => $context->translateUserString($synopsis)]);
		while(true){
			$context->send(LibkineticMessages::MODAL_CLI_INSTRUCTION, [
				"cont" => $context->getManager()->getContName(),
				"yesCommand" => $yesCommand,
				"yesDisplay" => $context->translateUserString($yesDisplay),
				"noCommand" => $noCommand,
				"noDisplay" => $context->translateUserString($noDisplay),
			]);
			$value = yield $context->getManager()->waitCont($context->getUser(), $timeout);
			if($value === $yesCommand){
				return true;
			}
			if($value === $noCommand){
				return false;
			}

			$context->send(LibkineticMessages::CLI_WRONG_INPUT);
		}
	}
}
