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
use SOFe\Libkinetic\Parser\Attribute\UserStringAttribute;
use SOFe\Libkinetic\UI\Standard\IconListEntry;
use SOFe\Libkinetic\UserString;

class GenericFormComponent extends KineticComponent{

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

	/**
	 * @param FlowContext     $context
	 * @param IconListEntry[] $options
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
