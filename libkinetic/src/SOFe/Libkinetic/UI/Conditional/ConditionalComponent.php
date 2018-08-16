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

namespace SOFe\Libkinetic\UI\Conditional;

use SOFe\Libkinetic\API\UiNodeStateHandler;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\BooleanAttribute;
use SOFe\Libkinetic\Parser\Attribute\StringAttribute;
use SOFe\Libkinetic\Parser\Attribute\StringEnumAttribute;
use function array_keys;

class ConditionalComponent extends KineticComponent{
	public const ACTION_MAP = UiNodeStateHandler::ALL_STATES;

	/** @var bool */
	protected $root;
	/** @var bool */
	protected $not = false;

	/** @var int */
	protected $onTrue = "nil";
	/** @var string|null */
	protected $onTrueTarget = null;
	/** @var int */
	protected $onFalse = "nil";
	/** @var string|null */
	protected $onFalseTarget = null;

	public function __construct(bool $root = false){
		$this->root = $root;
	}

	public function getOnTrue() : int{
		return $this->onTrue;
	}

	public function getOnTrueTarget() : ?string{
		return $this->onTrueTarget;
	}

	public function getOnFalse() : int{
		return $this->onFalse;
	}

	public function getOnFalseTarget() : ?string{
		return $this->onFalseTarget;
	}

	public function resolve() : void{
		if($this->onTrue === UiNodeStateHandler::STATE_EXIT && $this->onTrueTarget !== null){
			$this->manager->requireTranslation($this->getNode(), $this->onTrueTarget);
		}
		if($this->onFalse === UiNodeStateHandler::STATE_EXIT && $this->onFalseTarget !== null){
			$this->manager->requireTranslation($this->getNode(), $this->onFalseTarget);
		}
	}

	public function thisOrThat(KineticComponent $that) : ?KineticComponent{
		if(!($that instanceof ConditionalComponent)){
			return null;
		}
		if($this->root){
			return $this;
		}elseif($that->root){
			return $that;
		}else{
			return $this;
		}
	}

	public function acceptAttributes(AttributeRouter $router) : void{
		if($this->root){
			$router->use("onTrue", new StringEnumAttribute(array_keys(self::ACTION_MAP), true), $this->onTrue, false);
			$router->use("onTrueTarget", new StringAttribute(), $this->onTrueTarget, false);
			$router->use("onFalse", new StringEnumAttribute(array_keys(self::ACTION_MAP), true), $this->onFalse, false);
			$router->use("onFalseTarget", new StringAttribute(), $this->onFalseTarget, false);
		}

		$router->use("not", new BooleanAttribute(), $this->not, false);
	}

	public function endElement() : void{
		$this->onTrue = self::ACTION_MAP[$this->onTrue];
		$this->onFalse = self::ACTION_MAP[$this->onFalse];
	}

	public function applyNot(bool $bool) : bool{
		return $bool !== $this->not;
	}
}
