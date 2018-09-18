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

namespace SOFe\Libkinetic;

use pocketmine\utils\TextFormat;

class LibkineticMessages{
	public const CONT_DESC = "libkinetic.cont.desc";
	public const CONT_USAGE = "libkinetic.cont.usage";
	public const CONT_NIL = "libkinetic.cont.nil";

	public const CLI_WRONG_INPUT = "libkinetic.cli.wrong-input";

	public const MODAL_YES = "libkinetic.modal.yes";
	public const MODAL_NO = "libkinetic.modal.no";
	public const MODAL_CLI_TITLE = "libkinetic.modal.cli.title";
	public const MODAL_CLI_SYNOPSIS = "libkinetic.modal.cli.synopsis";
	public const MODAL_CLI_INSTRUCTION = "libkinetic.modal.cli.instruction";

	public const LIST_FORM_DUMMY_OPTION = "libkinetic.list.form.dummy-option";
	public const LIST_CLI_TITLE = "libkinetic.list.cli.title";
	public const LIST_CLI_SYNOPSIS = "libkinetic.list.cli.synopsis";
	public const LIST_CLI_OPTION = "libkinetic.list.cli.option";
	public const LIST_CLI_INSTRUCTION = "libkinetic.list.cli.instruction";

	public const CUSTOM_CLI_TITLE = "libkinetic.custom.cli.title";

	public const CUSTOM_CLI_TEXT_GENERIC = "libkinetic.custom.cli.text.generic";
	public const CUSTOM_CLI_TEXT_LABEL = "libkinetic.custom.cli.text.label";

	public const CUSTOM_CLI_INSTRUCTION_GENERIC = "libkinetic.custom.cli.instruction.generic";
	public const CUSTOM_CLI_INSTRUCTION_INPUT = "libkinetic.custom.cli.instruction.input";
	public const CUSTOM_CLI_INSTRUCTION_TOGGLE = "libkinetic.custom.cli.instruction.toggle";
	public const CUSTOM_CLI_INSTRUCTION_SELECT = "libkinetic.custom.cli.instruction.select";

	public const CUSTOM_CLI_DEFAULT_GENERIC = "libkinetic.custom.cli.default.generic";
	public const CUSTOM_CLI_DEFAULT_SLIDER = "libkinetic.custom.cli.default.slider";

	public const CUSTOM_CLI_SELECT_OPTION = "libkinetic.custom.cli.select.option";
	public const CUSTOM_CLI_SLIDER_STEP_CORRECTED = "libkinetic.custom.cli.slider.step-corrected";

	public const MESSAGES = [
		self::CONT_DESC => [
			"en_US" => 'A special command. You will be told to use this command when you need to.',
		],
		self::CONT_USAGE => [
			"en_US" => '/${alias} <value>',
		],
		self::CONT_NIL => [
			"en_US" => TextFormat::RED . 'You can\'t run this command right now.',
		],

		self::CLI_WRONG_INPUT => [
			"en_US" => TextFormat::RED . 'Invalid input!',
		],

		self::MODAL_YES => [
			"en_US" => "Yes",
		],
		self::MODAL_NO => [
			"en_US" => "No",
		],
		self::MODAL_CLI_TITLE => [
			"en_US" => TextFormat::BOLD . '${title}',
		],
		self::MODAL_CLI_SYNOPSIS => [
			"en_US" => '${synopsis}',
		],
		self::MODAL_CLI_INSTRUCTION => [
			"en_US" => 'Answer with ' . TextFormat::GOLD . '/${cont} ${yesCommand}' . TextFormat::LIGHT_PURPLE . ' (${yesDisplay}) ' . TextFormat::WHITE . ' or ' . TextFormat::GOLD . '/${cont} ${noCommand}' . TextFormat::LIGHT_PURPLE . ' (${noDisplay}) ',
		],

		self::LIST_FORM_DUMMY_OPTION => [
			"en_US" => '#${i}',
		],
		self::LIST_CLI_TITLE => [
			"en_US" => TextFormat::BOLD . '${title}',
		],
		self::LIST_CLI_SYNOPSIS => [
			"en_US" => '${synopsis}',
		],
		self::LIST_CLI_INSTRUCTION => [
			"en_US" => 'Choose one option below and type ' . TextFormat::GOLD . '/${cont} ' . TextFormat::LIGHT_PURPLE . '<option>',
		],
		self::LIST_CLI_OPTION => [
			"en_US" => TextFormat::LIGHT_PURPLE . '${mnemonic}' . TextFormat::GRAY . ' => ' . TextFormat::WHITE . '${display}',
		],

		self::CUSTOM_CLI_TITLE => [
			"en_US" => TextFormat::BOLD . '${title}',
		],

		self::CUSTOM_CLI_TEXT_GENERIC => [
			"en_US" => '[?] ' . TextFormat::AQUA . '${text}',
		],
		self::CUSTOM_CLI_TEXT_LABEL => [
			"en_US" => '${text}',
		],

		self::CUSTOM_CLI_INSTRUCTION_GENERIC => [
			"en_US" => 'Answer with the command ' . TextFormat::GOLD . '/${cont} ' . TextFormat::LIGHT_PURPLE . '<answer>',
		],
		self::CUSTOM_CLI_INSTRUCTION_INPUT => [
			"en_US" => 'Answer with the command ' . TextFormat::GOLD . '/${cont} ' . TextFormat::LIGHT_PURPLE . '<${placeholder}>',
		],
		self::CUSTOM_CLI_INSTRUCTION_TOGGLE => [
			"en_US" => 'Answer with the command ' . TextFormat::GOLD . '/${cont} ' . TextFormat::LIGHT_PURPLE . 'true|false',
		],
		self::CUSTOM_CLI_INSTRUCTION_SELECT => [
			"en_US" => 'Answer with the command ' . TextFormat::GOLD . '/${cont} ' . TextFormat::LIGHT_PURPLE . '<option>',
		],

		self::CUSTOM_CLI_DEFAULT_GENERIC => [
			"en_US" => 'Default: ' . TextFormat::LIGHT_PURPLE . '${default}',
		],
		self::CUSTOM_CLI_DEFAULT_SLIDER => [
			"en_US" => 'Range: ${min}-${max} ' . TextFormat::LIGHT_PURPLE . '(default: ${default})',
		],

		self::CUSTOM_CLI_SELECT_OPTION => [
			"en_US" => TextFormat::LIGHT_PURPLE . '${mnemonic}' . TextFormat::GRAY . ' => ' . TextFormat::WHITE . '${display}',
		],
		self::CUSTOM_CLI_SLIDER_STEP_CORRECTED => [
			"en_US" => TextFormat::YELLOW . 'Your input has been corrected to ${corrected} because the step is ${step}',
		],
	];
}
