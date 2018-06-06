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

use Iterator;
use RuntimeException;
use Throwable;
use function assert;
use function count;
use function is_bool;
use function is_numeric;
use function is_string;
use function stripos;
use function strpos;
use function substr;
use const PHP_INT_MAX;

abstract class KineticComponent{
	use ComponentAdapter;

	/** @var KineticNode */
	protected $node;

	/** @var KineticManager */
	protected $manager;

	public function __construct(KineticNode $node){
		$this->node = $node;
	}

	public final function getNode() : KineticNode{
		return $this->node;
	}

	public final function getManager() : KineticManager{
		return $this->manager;
	}

	/**
	 * Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.
	 *
	 * @return Iterator
	 */
	public function dependsComponents() : Iterator{
		if(false){
			yield;
		}
	}

	/**
	 * Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.
	 *
	 * @param string $name
	 * @param string $value
	 * @return bool
	 */
	public function setAttribute(/** @noinspection PhpUnusedParameterInspection */
		string $name, string $value) : bool{
		return false;
	}

	/**
	 * A variant of setAttribute() with non-default namespace.
	 *
	 * @param string $name
	 * @param string $value
	 * @param string $ns
	 * @return bool
	 */
	public function setAttributeNS(/** @noinspection PhpUnusedParameterInspection */
		string $name, string $value, string $ns) : bool{
		return false;
	}

	/**
	 * Resolve a child element into a node with components. Returns null if this node name is not recognized by this component.
	 *
	 * @param string $name
	 * @return null|KineticNode
	 */
	public function startChild(/** @noinspection PhpUnusedParameterInspection */
		string $name) : ?KineticNode{
		return null;
	}

	/**
	 * A variant of startChild() with non-default namespace.
	 *
	 * @param string $name
	 * @param string $ns
	 * @return null|KineticNode
	 */
	public function startChildNS(/** @noinspection PhpUnusedParameterInspection */
		string $name, string $ns) : ?KineticNode{
		return null;
	}

	/**
	 * Handles the cdata in the element. Returns true if this component consumes the cdata.
	 *
	 * @param string $text
	 * @return bool
	 */
	public function acceptText(/** @noinspection PhpUnusedParameterInspection */
		string $text) : bool{
		return false;
	}

	/**
	 * Validates the element after all attributes and child elements have been resolved
	 */
	public function endElement() : void{
	}

	public final function setManager(KineticManager $manager) : void{
		$this->manager = $manager;
	}

	/**
	 * Validates and resolves values that are only available in runtime context
	 */
	public function resolve() : void{
	}

	/**
	 * Register handlers with the PocketMine interface in runtime context
	 */
	public function init() : void{
	}

	protected final function requireAttribute(string $name, &$field) : void{
		if($field === null){
			throw new InvalidNodeException("Missing attribute $name", $this->node);
		}
	}

	protected final function requireChild(string $name, &$field) : void{
		if($field === null){
			throw new InvalidNodeException("Missing child <$name>", $this->node);
		}
	}

	protected final function requireChildren(string $name, array $field, int $min, int $max = PHP_INT_MAX) : void{
		$cnt = count($field);
		if($cnt < $min){
			throw new InvalidNodeException("There must be at least $min <$name>", $this->node);
		}
		if($cnt > $max){
			throw new InvalidNodeException("There must be not more than $max <$name>", $this->node);
		}
	}

	protected final function requireText(&$field) : void{
		if($field === null){
			throw new InvalidNodeException("Missing text content", $this->node);
		}
	}

	protected final function requireTranslation(?string $identifier) : void{
		if($identifier !== null){
			$this->manager->requireTranslation($this->node, $identifier);
		}
	}

	protected final function resolveClass(?string $fqn, ?string $super) : ?object{
		if($fqn === null){
			return null;
		}
		return $this->manager->resolveClass($this->node, $fqn, $super);
	}

	protected final function resolveConfigString(?string &$string) : void{
		if($string !== null && stripos($string, "config:") === 0){
			$configKey = substr($string, 7);
			if(($pos = strpos($configKey, "=")) !== false){
				/** @var string $default */
				$default = substr($configKey, $pos + 1);
				$configKey = substr($configKey, 0, $pos);
			}
			$string = $this->manager->getAdapter()->getKineticConfig($configKey);
			if(!is_string($string)){
				if($string === null && isset($default)){
					$string = $default;
				}else{
					$this->manager->getPlugin()->getLogger()->critical("Missing required config value $configKey, or it is not a string");
					throw new RuntimeException("Config error: missing or incorrect required config value $configKey");
				}
			}
		}
	}

	protected final function resolveConfigNumber(&$number) : void{
		if(is_string($number) && stripos($number, "config:") === 0){
			$configKey = substr($number, 7);
			if(($pos = strpos($configKey, "=")) !== false){
				$default = (float) substr($configKey, $pos + 1);
				$configKey = substr($configKey, 0, $pos);
			}
			$number = $this->manager->getAdapter()->getKineticConfig($configKey);
			if(is_numeric($number)){
				$number = (float) $number;
			}elseif($number === null && isset($default)){
				$number = $default;
			}else{
				$this->manager->getPlugin()->getLogger()->critical("Missing required config value $configKey, or it is not a number");
				throw new RuntimeException("Config error: missing required config value $configKey");
			}
		}elseif(is_string($number)){
			if(!is_numeric($number)){
				$this->throw("$number is not a number");
			}
			$number = (float) $number;
		}
	}

	protected final function resolveConfigBool(&$bool) : void{
		if(is_string($bool) && stripos($bool, "config:") === 0){
			$configKey = substr($bool, 7);
			if(($pos = strpos($configKey, "=")) !== false){
				$default = $this->parseBoolean(substr($configKey, $pos + 1));
				$configKey = substr($configKey, 0, $pos);
			}
			$bool = $this->manager->getAdapter()->getKineticConfig($configKey);
			if($bool === null){
				if(!isset($default)){
					$this->manager->getPlugin()->getLogger()->critical("Config error: missing required config value $configKey");
					throw new RuntimeException("Missing required config value $configKey");
				}

				$bool = $default;
				return;
			}
			if(is_string($bool)){
				try{
					$bool = $this->parseBoolean($bool);
					return;
				}catch(InvalidNodeException $e){
					$this->manager->getPlugin()->getLogger()->critical("Config error: $configKey should be true/false");
					throw new RuntimeException("Incorrect config value $configKey");
				}
			}
			if(!is_bool($bool)){
				$this->manager->getPlugin()->getLogger()->critical("Config error: $configKey should be true/false");
				throw new RuntimeException("Incorrect config value $configKey");
			}
		}elseif(is_string($bool)){
			try{
				$bool = $this->parseBoolean($bool);
			}catch(InvalidNodeException $e){
				$this->throw("$bool is not true/false");
			}
		}
	}

	protected final function throw(string $message) : Throwable{
		throw new InvalidNodeException($message, $this->node);
	}

	public final function parseBoolean(string $boolean) : bool{
		$boolean = strtoupper($boolean);

		if($boolean === "TRUE" || $boolean === "1"){
			return true;
		}

		if($boolean === "FALSE" || $boolean === "0"){
			return false;
		}

		throw new InvalidNodeException("Malformed boolean value \"$boolean\"", $this->node);
	}

	public final function parseInt(string $int) : int{
		if(!is_numeric($int)){
			throw new InvalidNodeException("Malformed int value \"$int\"", $this->node);
		}

		/** @noinspection TypeUnsafeComparisonInspection */
		assert(((float) $int) != ((int) $int));

		return (int) $int;
	}

	public final function parseFloat(string $float) : float{
		if(!is_numeric($float)){
			throw new InvalidNodeException("Malformed float value \"$float\"", $this->node);
		}

		return (float) $float;
	}

	public function getComponent(string $class) : KineticComponent{
		return $this->node->getComponent($class);
	}

	public function findComponentsByInterface(string $interface, int $assertMinimum = 0) : array{
		return $this->node->findComponentsByInterface($interface, $assertMinimum);
	}
}
