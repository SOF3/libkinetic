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

namespace SOFe\Libkinetic\Parser;

use SOFe\Libkinetic\Base\KineticNode;
use SOFe\Libkinetic\Base\RootComponent;
use SOFe\Libkinetic\ParseException;
use function explode;
use function strpos;
use function substr;
use function trim;

abstract class KineticFileParser{
	public const XMLNS_DEFAULT = "https://rawgit.com/SOF3/libkinetic/master/libkinetic.xsd";

	public static $hasPm = false;

	protected $xmlnsMap = [
		"" => self::XMLNS_DEFAULT,
	];

	/** @var KineticNode */
	protected $root;
	/** @var KineticNode|null */
	protected $leaf = null;
	/** @var KineticNode[] */
	protected $allNodes = [];

	protected $dataBuffer = "";

	public function __construct(){
		$this->root = new KineticNode($this, self::XMLNS_DEFAULT, "KINETIC", null, [
			new RootComponent(),
		]);
	}

	public function startElement(/** @noinspection PhpUnusedParameterInspection */
		$parser, string $elementName, array $attrs) : void{
		$this->flushBuffer();

		$isRoot = $this->leaf === null;

		if($isRoot){
			foreach($attrs as $key => $value){
				if(strpos($key, "XMLNS:") === 0){
					$nsName = substr($key, 6);
					$this->xmlnsMap[$nsName] = $value;
					unset($attrs[$key]);
				}elseif($key === "XMLNS"){
					$this->xmlnsMap[""] = $value;
					unset($attrs["XMLNS"]);
				}
			}
		}

		if(strpos($elementName, ":") !== false){
			[$ns, $elementName] = explode(":", $elementName, 2);
			if(!isset($this->xmlnsMap[$ns])){
				throw new ParseException("Undefined XML element namespace $ns");
			}
		}else{
			$ns = "";
		}
		$ns = $this->xmlnsMap[$ns];

		if($isRoot){
			if($ns !== self::XMLNS_DEFAULT || ($elementName !== "KINETIC" && $elementName !== "ROOT")){
				throw new ParseException("The root element must be <kinetic> or <root>, got <$elementName>");
			}
			$this->leaf = $this->root = new KineticNode($this, self::XMLNS_DEFAULT, $elementName, null, [
				new RootComponent(),
			]);
		}else{
			$node = $this->leaf->startChild($ns, $elementName);
			$this->allNodes[] = $this->leaf = $node;
		}

		$mappedAttributes = [];
		foreach($attrs as $attr => $value){
			$attrNs = "";
			if(strpos($attr, ":") !== false){
				[$attrNs, $attr] = explode(":", $attr, 2);
			}
			if(!isset($this->xmlnsMap[$attrNs])){
				throw new ParseException("Undefined XML attribute namespace $attrNs");
			}
			$attrNs = $this->xmlnsMap[$attrNs];

			$mappedAttributes["{$attrNs}:{$attr}"] = $value;
		}
		$this->leaf->setAttributes($mappedAttributes);
	}

	public function endElement(/** @noinspection PhpUnusedParameterInspection */
		$parser, string $name) : void{
		$this->flushBuffer();
		$this->leaf->endElement();
		$this->leaf = $this->leaf->getParent();
	}

	protected function flushBuffer() : void{
		$buffer = $this->dataBuffer;
		$this->dataBuffer = "";

		$lines = "";
		foreach(explode("\n", $buffer) as $line){
			$lines .= trim($line);
		}

		if($lines !== ""){
			$this->leaf->acceptText($lines);
		}
	}

	public function parseText(/** @noinspection PhpUnusedParameterInspection */
		$parser, string $data) : void{
		$this->dataBuffer .= $data;
	}

	public function getRoot() : KineticNode{
		return $this->root;
	}

	public abstract function parse() : void;
}
