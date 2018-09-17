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

namespace SOFe\Libkinetic\UI;

use Generator;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Element\ElementInterface;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\Hybrid\HybridForms;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\Configurable;
use SOFe\Libkinetic\Parser\Attribute\DurationAttribute;
use SOFe\Libkinetic\Parser\Attribute\StringAttribute;
use SOFe\Libkinetic\Parser\Attribute\StringEnumAttribute;
use SOFe\Libkinetic\Parser\Attribute\UserStringAttribute;
use SOFe\Libkinetic\UserString;

class GenericFormComponent extends KineticComponent{
	public const ON_CANCEL_FALLTHROUGH = 4159231705;
	public const ON_CANCEL_SKIP = UiNodeOutcome::OUTCOME_SKIP;
	public const ON_CANCEL_BREAK = UiNodeOutcome::OUTCOME_BREAK;
	public const ON_CANCEL_EXIT = UiNodeOutcome::OUTCOME_EXIT;

	/** @var bool */
	protected $cancellable;
	/** @var bool */
	protected $hasSynopsis;

	/** @var UserString */
	protected $title;
	/** @var UserString */
	protected $synopsis;
	/** @var float */
	protected $timeout = 60.0 * 10;
	/** @var int */
	protected $onCancel = self::ON_CANCEL_FALLTHROUGH;
	/** @var string|null */
	protected $onCancelTarget = null;

	public static function modalForm() : GenericFormComponent{
		return new self(false, true);
	}

	public static function listForm() : GenericFormComponent{
		return new self(true, true);
	}

	public static function customForm() : GenericFormComponent{
		return new self(true, false);
	}

	public function __construct(bool $cancellable, bool $hasSynopsis){
		$this->cancellable = $cancellable;
		$this->hasSynopsis = $hasSynopsis;
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("title", new UserStringAttribute(), $this->title, true);
		if($this->hasSynopsis){
			$router->use("synopsis", new UserStringAttribute(), $this->synopsis, true);
		}
		$router->use("timeout", new Configurable(new DurationAttribute(1.0)), $this->timeout, false);
//		if($this->cancellable){
		$router->use("onCancel", new StringEnumAttribute([
			"fallthrough" => self::ON_CANCEL_FALLTHROUGH,
			"skip" => self::ON_CANCEL_SKIP,
			"break" => self::ON_CANCEL_BREAK,
			"exit" => self::ON_CANCEL_EXIT,
		], true), $this->onCancel, false);
		$router->use("onCancelTarget", new StringAttribute(), $this->onCancelTarget, false);
//		}
	}

	public function getTitle() : UserString{
		return $this->title;
	}

	public function getSynopsis() : UserString{
		return $this->synopsis;
	}

	public function getTimeout() : float{
		return $this->timeout;
	}

	public function getOnCancel() : int{
		return $this->onCancel;
	}

	public function getOnCancelTarget() : string{
		return $this->onCancelTarget;
	}

	/**
	 * @param FlowContext               $context
	 * @param string[][]|UserString[][] $options
	 *
	 * @return Generator
	 */
	public function sendListForm(FlowContext $context, array $options) : Generator{
		return yield HybridForms::list($context, $this->title, $this->synopsis, $options, $this->getTimeout());
	}

	/**
	 * @param FlowContext        $context
	 * @param ElementInterface[] $elements
	 *
	 * @return Generator
	 */
	public function sendCustomForm(FlowContext $context, array $elements) : Generator{
		return yield HybridForms::custom($context, $this->title, $elements, $this->getTimeout());
	}

	public function sendModalForm(FlowContext $context, ?string $yesCommand, ?UserString $yesDisplay, ?string $noCommand, ?UserString $noDisplay) : Generator{
		return yield HybridForms::modal($context, $this->title, $this->synopsis, $yesCommand, $yesDisplay, $noCommand, $noDisplay, $this->getTimeout());
	}
}
