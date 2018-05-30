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

namespace SOFe\Libkinetic\Clickable\Argument;

use SOFe\Libkinetic\API\RequestValidator;
use SOFe\Libkinetic\KineticComponent;
use SOFe\Libkinetic\WindowRequest;

class ArgsComponent extends KineticComponent{
	/** @var string|null */
	protected $id = null;
	/** @var bool */
	protected $required = false;
	/** @var string|null */
	protected $validatorClass = null;
	/** @var RequestValidator|null */
	protected $validator = null;

	public function setAttribute(string $name, string $value) : bool{
		if($name === "ID"){
			$this->id = $value;
			return true;
		}
		if($name === "REQUIRED"){
			$this->required = $this->parseBoolean($value);
			return true;
		}
		if($name === "VALIDATOR"){
			$this->validatorClass = $value;
			return true;
		}
		return false;
	}

	public function init() : void{
		$this->validator = $this->resolveClass($this->validatorClass, RequestValidator::class);
	}

	public function getId() : ?string{
		return $this->id;
	}

	public function isRequired() : bool{
		return $this->required;
	}

	public function getValidator() : ?RequestValidator{
		return $this->validator;
	}
}
