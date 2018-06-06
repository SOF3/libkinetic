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

namespace SOFe\Libkinetic\Clickable;

use SOFe\Libkinetic\KineticNode;

interface ClickableContainerInterface extends ClickableInterface{
	/**
	 * Given a child node, return the command path from this node's that resolves into the child node.
	 *
	 * This method should be the inverse operation of getNodeFor().
	 *
	 * @param KineticNode $node
	 * @return string[]
	 */
	public function getCommandPathFor(KineticNode $node) : ?array;

	/**
	 * @return string[][]|KineticNode[] a binary array where, for each element, the first sub-element is a string[] and the second sub-element is a KineticNode.
	 */
	public function getCommandPaths() : array;

	/**
	 * @param string $commandPath
	 * @return KineticNode|null
	 */
	public function getNodeFor(string $commandPath) : ?KineticNode;
}
