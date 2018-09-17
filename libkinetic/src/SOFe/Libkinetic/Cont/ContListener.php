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

namespace SOFe\Libkinetic\Cont;

use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\server\CommandEvent;
use SOFe\Libkinetic\Flow\FlowCancelledException;
use SOFe\Libkinetic\KineticManager;
use SOFe\Libkinetic\LibkineticMessages;
use SplObjectStorage;
use function array_slice;
use function explode;
use function implode;
use function in_array;
use function mb_strtolower;
use function microtime;

class ContListener implements Listener{
	/** @var KineticManager */
	protected $manager;
	/** @var SplObjectStorage|callable[][]|float[][] */
	protected $handlers;
	/** @var string[] */
	private $cont;

	public function __construct(KineticManager $manager, array $cont){
		$this->handlers = new SplObjectStorage();
		$this->manager = $manager;
		$this->cont = $cont;
	}

	public function waitFor(CommandSender $sender, callable $c, callable $e, float $timeout) : void{
		$this->handlers[$sender] = [$c, $e, $timeout];
	}

	public function e_onCommand(CommandEvent $event) : void{
		$parts = explode(" ", $event->getCommand());
		if(in_array(mb_strtolower($parts[0]), $this->cont, true)){
			return;
		}

		$event->setCancelled();

		$sender = $event->getSender();
		if(!isset($this->handlers[$sender])){
			$sender->sendMessage($this->manager->translate($sender, LibkineticMessages::MESSAGE_CONT_NIL));
			return;
		}

		[$c,] = $this->handlers[$sender];
		$this->handlers->detach($sender);
		$c(implode(" ", array_slice($parts, 1)));
	}

	public function cleanup() : void{
		$deletions = [];
		$cancels = [];
		foreach($this->handlers as $sender){
			if($this->handlers[$sender][2] < microtime(true)){
				$deletions[] = $sender;
				$cancels[] = $this->handlers[$sender][1];
			}
		}
		foreach($deletions as $sender){
			unset($this->handlers[$sender]);
		}
		foreach($cancels as $e){
			$e(new FlowCancelledException());
		}
	}
}
