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

use Generator;
use jojoe77777\FormAPI\CustomForm;
use pocketmine\form\FormValidationException;
use SOFe\Libkinetic\Base\KineticComponent;
use SOFe\Libkinetic\Flow\FlowContext;
use SOFe\Libkinetic\LibkineticMessages;
use SOFe\Libkinetic\Parser\Attribute\AttributeRouter;
use SOFe\Libkinetic\Parser\Attribute\FloatAttribute;
use SOFe\Libkinetic\Parser\Attribute\UserStringAttribute;
use SOFe\Libkinetic\UserString;
use function ceil;
use function floor;
use function fmod;
use function is_float;
use function is_int;
use function is_numeric;

class SliderElementComponent extends KineticComponent implements ElementInterface{
	use ElementTrait;

	/** @var UserString */
	protected $text;
	/** @var float */
	protected $min;
	/** @var float */
	protected $max;
	/** @var float */
	protected $step = 0.0;

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

	protected function requestCliImpl(FlowContext $context, float $timeout) : Generator{
		$context->send(LibkineticMessages::CUSTOM_CLI_TEXT_GENERIC, ["text" => $context->translateUserString($this->text)]);
		$context->send(LibkineticMessages::CUSTOM_CLI_INSTRUCTION_GENERIC, ["cont" => $context->getManager()->getContName()]);
		$context->send(LibkineticMessages::CUSTOM_CLI_DEFAULT_SLIDER, [
			"min" => $this->min,
			"max" => $this->max,
			"step" => $this->step,
			"default" => $this->default ?? "N/A",
		]);
		return yield $context->getManager()->waitCont($context->getUser(), $timeout);
	}

	public function addToFormAPI(FlowContext $context, CustomForm $form) : Generator{
		false && yield;
		$form->addSlider($context->translateUserString($this->text), $this->min, $this->max, $this->step === 0.0 ? -1 : $this->step, $this->default ?? -1);
	}

	public function parseFormResponse(FlowContext $context, $response, $temp) : float{
		if(!is_float($response) && !is_int($response)){
			throw new FormValidationException("Got non-numeric response for slider");
		}
		if($response < $this->min || $response > $this->max){
			throw new FormValidationException("Got out-of-bounds response for slider");
		}

		return (float) $response;
	}

	protected function parse(FlowContext $context, &$value) : Generator{
		false && yield;
		if($value === ""){
			$value = $this->default;
		}
		if(!is_numeric($value)){
			return false;
		}
		$value = (float) $value;
		if($value < $this->min || $value > $this->max){
			return false;
		}
		if($this->step > 0){
			$diff = $value - $this->min;
			$mod = fmod($diff, $this->step);
			$corrected = false;
			if($mod > 0.0 && $mod < $this->step / 2){
				$corrected = true;
				$value = $this->min + $this->step * floor($diff / $this->step);
			}elseif($mod > $this->step / 2 && $mod < 1.0){
				$corrected = true;
				$value = $this->min + $this->step * ceil($diff / $this->step);
			}
			if($corrected){
				$context->send(LibkineticMessages::CUSTOM_CLI_SLIDER_STEP_CORRECTED, [
					"step" => $this->step,
					"corrected" => $value,
				]);
			}
		}
		return true;
	}
}
