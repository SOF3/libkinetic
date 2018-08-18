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

use Generator;
use pocketmine\Player;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\libkinetic;
use SOFe\Libkinetic\UserString;
use function array_combine;

class HybridForms{
	public static function list(FlowContext $context, UserString $title, UserString $synopsis, array $options, float $timeout) : Generator{
		$mnemonics = [];
		$displays = [];
		$values = [];
		/**
		 * @var string     $mnemonic
		 * @var UserString $key
		 * @var string     $value
		 */
		foreach($options as [$mnemonic, $key, $value]){
			$mnemonics[] = $mnemonic;
			$displays[] = $context->translateUserString($key);
			$values[] = $value;
		}

		$user = $context->getUser();
		$choice = yield $user instanceof Player ?
			self::listPlayer($context, $user, $title, $synopsis, $displays, $timeout) :
			self::listNonPlayer($context, $title, $synopsis, array_combine($mnemonics, $displays), $timeout);

		return $choice !== null ? $values[$choice] : $choice;
	}

	protected static function listPlayer(FlowContext $context, Player $player, UserString $title, UserString $synopsis, array $strings, float $timeout) : Generator{
		return $context->getManager()->getFormsAdapter()->sendMenuForm($player, $context->translateUserString($title), $context->translateUserString($synopsis), $strings);
	}

	protected static function listNonPlayer(FlowContext $context, UserString $title, UserString $synopsis, array $strings, float $timeout) : Generator{
		$context->send(libkinetic::MESSAGE_LIST_TITLE_CLI, ["title" => $context->translateUserString($title)]);
		$context->send(libkinetic::MESSAGE_LIST_SYNOPSIS_CLI, ["synopsis" => $context->translateUserString($synopsis)]);

		foreach($strings as $mnemonic => $display){
			$context->send(libkinetic::MESSAGE_LIST_OPTION_CLI, [
				"mnemonic" => $mnemonic,
				"display" => $display,
			]);
		}

		$context->getManager()->waitCont($context->getUser(), $timeout);
		// TODO implement cont logic
	}
}
