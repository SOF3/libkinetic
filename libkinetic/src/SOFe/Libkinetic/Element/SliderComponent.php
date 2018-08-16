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

namespace SOFe\Libkinetic\Element;

use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\FloatAttribute;
use SOFe\Libkinetic\Parser\Attribute\UserStringAttribute;
use SOFe\Libkinetic\UserString;

class SliderComponent extends KineticComponent implements ElementInterface{
	/** @var UserString */
	protected $text;
	/** @var float */
	protected $min;
	/** @var float */
	protected $max;
	/** @var float */
	protected $step = 0;

	/** @var float */
	protected $default = null;

	public function acceptAttributes(AttributeRouter $router) : void{
		$router->use("text", new UserStringAttribute(), $this->text, true);
		$router->use("min", new FloatAttribute(), $this->min, true);
		$router->use("max", new FloatAttribute(), $this->max, true);
		$router->use("step", new FloatAttribute(), $this->step, false);
		$router->use("default", new FloatAttribute(), $this->default, false);
	}

	public function endElement() : void{
		if($this->step < 0){
			$this->node->throw("step should be non-negative");
		}
		if($this->step > $this->max - $this->min){
			$this->node->throw("A step greater than the slider interval does not make sense");
		}
		if($this->min > $this->max){
			$this->node->throw("min should not be greater than max");
		}
		if($this->default === null){
			$this->default = $this->min;
		}elseif(!($this->min <= $this->default && $this->default <= $this->min)){
			$this->node->throw("default should not be less than min or greater than max");
		}
	}
}
