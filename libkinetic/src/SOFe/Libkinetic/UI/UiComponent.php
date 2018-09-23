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
use SOFe\Libkinetic\Base\IdComponent;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\StringAttribute;
use SOFe\Libkinetic\Parser\Attribute\StringEnumAttribute;
use SOFe\Libkinetic\Parser\Child\ChildNodeRouter;
use SOFe\Libkinetic\UI\Entry\EntryCommandComponent;
use SOFe\Libkinetic\UI\NodeState\OnCompleteComponent;
use SOFe\Libkinetic\UI\NodeState\OnStartComponent;
use SOFe\Libkinetic\Variable\ReturnComponent;

class UiComponent extends KineticComponent{
	public const ON_CANCEL_FALLTHROUGH = 4159231705;
	public const ON_CANCEL_SKIP = UiNodeOutcome::OUTCOME_SKIP;
	public const ON_CANCEL_BREAK = UiNodeOutcome::OUTCOME_BREAK;
	public const ON_CANCEL_EXIT = UiNodeOutcome::OUTCOME_EXIT;

	/** @var OnStartComponent */
	protected $onStart;
	/** @var OnCompleteComponent */
	protected $onComplete;

	/** @var ReturnComponent[] */
	protected $returns = [];
	/** @var int */
	protected $onCancel = self::ON_CANCEL_FALLTHROUGH;
	/** @var string|null */
	protected $onCancelTarget = null;

	/** @var EntryCommandComponent[] */
	protected $entryCommands = [];

	public function getDependencies() : Generator{
		yield IdComponent::class;
	}

	public function getOnStart() : ?OnStartComponent{
		return $this->onStart;
	}

	public function getOnComplete() : ?OnCompleteComponent{
		return $this->onComplete;
	}

	/**
	 * @return ReturnComponent[]
	 */
	public function getReturns() : array{
		return $this->returns;
	}

	public function getOnCancel() : int{
		return $this->onCancel;
	}

	public function getOnCancelTarget() : string{
		return $this->onCancelTarget;
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("onCancel", new StringEnumAttribute([
			"fallthrough" => self::ON_CANCEL_FALLTHROUGH,
			"skip" => self::ON_CANCEL_SKIP,
			"break" => self::ON_CANCEL_BREAK,
			"exit" => self::ON_CANCEL_EXIT,
		], true), $this->onCancel, false);
		$router->use("onCancelTarget", new StringAttribute(), $this->onCancelTarget, false);
	}

	public function acceptChildren(ChildNodeRouter $router) : void{
		$router->acceptSingle("onStart", OnStartComponent::class, $this->onStart, true);
		$router->acceptSingle("onComplete", OnCompleteComponent::class, $this->onComplete, true);
		$router->acceptMulti("return", ReturnComponent::class, $this->returns, 0);
		$router->acceptMulti("command", EntryCommandComponent::class, $this->entryCommands, 0);
	}
}
