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

namespace SOFe\Libkinetic\Window\Entry\Interact;

use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\plugin\PluginException;
use SOFe\Libkinetic\InvalidNodeException;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\Node\KineticNode;
use SOFe\Libkinetic\Window\Entry\AbstractEntryPointNode;
use SOFe\Libkinetic\WindowRequest;
use function array_merge;
use function is_array;

class InteractEntryPointNode extends AbstractEntryPointNode{
	/** @var string|null */
	protected $fromConfig = null;

	/** @var ItemFilterNode[] */
	protected $items = [];
	/** @var BlockFilterNode[] */
	protected $blocks = [];
	/** @var TouchModeFilterNode[] */
	protected $touchModes = [];
	/** @var FaceFilterNode[] */
	protected $faces = [];


	public function setAttribute(string $name, string $value) : bool{
		if(parent::setAttribute($name, $value)){
			return true;
		}

		if($name === "FROM" . "CONFIG"){
			$this->fromConfig = $value;
			return true;
		}

		return false;
	}

	public function startChild(string $name) : ?KineticNode{
		if($delegate = parent::startChild($name)){
			return $delegate;
		}

		if($this->fromConfig !== null){
			throw new InvalidNodeException("Child nodes must not be present if fromConfig is declared", $this);
		}

		if($name === "ITEM"){
			return $this->items[] = new ItemFilterNode();
		}

		if($name === "BLOCK"){
			return $this->blocks[] = new BlockFilterNode();
		}

		if($name === "TOUCH" . "MODE"){
			return $this->touchModes[] = new TouchModeFilterNode();
		}

		if($name === "FACE"){
			return $this->faces[] = new FaceFilterNode();
		}

		return null;
	}

	public function endElement() : void{
		parent::endElement();

		if($this->fromConfig === null && empty($this->items) && empty($this->blocks) && empty($this->touchModes) && empty($this->faces)){
			throw new InvalidNodeException("At least one child node should be present if fromConfig attribute is not provided", $this);
		}
	}

	public function resolve(KineticManager $manager) : void{
		parent::resolve($manager);
		if($this->fromConfig !== null){
			$config = $manager->getAdapter()->getKineticConfig($this->fromConfig);
			if($config === null){
				$manager->getPlugin()->getLogger()->critical("Config problem: $this->fromConfig is required");
				throw new PluginException("Missing config $this->fromConfig");
			}
			if(!is_array($config)){
				$manager->getPlugin()->getLogger()->critical("Config problem: $this->fromConfig should be a mapping");
				throw new PluginException("Invalid config $this->fromConfig");
			}

			foreach(array_merge((array) ($config["item"] ?? []), (array) ($config["items"] ?? [])) as $item){
				$this->items[] = $node = new ItemFilterNode();
				$node->mimicConfig($manager, $item);
			}
			foreach(array_merge((array) ($config["block"] ?? []), (array) ($config["blocks"] ?? [])) as $block){
				$this->blocks[] = $node = new BlockFilterNode();
				$node->mimicConfig($manager, $block);
			}
			foreach(array_merge((array) ($config["face"] ?? []), (array) ($config["faces"] ?? [])) as $mode){
				$this->touchModes[] = $node = new FaceFilterNode();
				$node->mimicConfig($manager, $mode, $this->fromConfig . ".faces");
			}
		}
	}

	public function isValid(PlayerInteractEvent $event) : bool{
		$ok = false;
		foreach($this->items as $item){
			if($item->isValid($event->getItem())){
				$ok = true;
				break;
			}
		}
		if(!$ok){
			return false;
		}

		$ok = false;
		foreach($this->blocks as $block){
			if($block->isValid($event->getBlock())){
				$ok = true;
				break;
			}
		}
		if(!$ok){
			return false;
		}

		$ok = false;
		foreach($this->touchModes as $mode){
			if($mode->getMode() === $event->getAction()){
				$ok = true;
				break;
			}
		}
		if(!$ok){
			return false;
		}

		$ok = false;
		foreach($this->faces as $face){
			if($face->getFace() === $event->getFace()){
				$ok = true;
				break;
			}
		}
		if(!$ok){
			return false;
		}

		return true;
	}

	public function onUseItem(PlayerInteractEvent $event) : void{
		$request = new WindowRequest($this->manager, $event->getPlayer());

		// TODO implement
	}

	public function jsonSerialize() : array{
		return parent::jsonSerialize() + [
				"items" => $this->items,
				"blocks" => $this->blocks,
				"touchModes" => $this->touchModes,
				"faces" => $this->faces,
			];
	}
}
