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

use SOFe\Libkinetic\WindowRequest;

/**
 * ## How args work: Definition and discussion
 * - The WindowRequest involves an arg either explicitly or implicitly:
 *   - Implicit path:
 *     - Through certain means (e.g. commands, events, directed from plugin code, or clicking other buttons), the user requests an arguable clickable.
 *     - Certain required variables in the WindowRequest for this arguable clickable is missing, so the user is required to configure this arg.
 *   - Explicit path:
 *     - The arguable clickable's window contains a button that allows changing the argument, e.g. "online players" list contains a button to configure the arg for player filters (e.g. checkbox "players in my clan")
 * - If the user is a player, a form interface will be displayed. Otherwise, a command interface will be displayed.
 *   - Form interface:
 *     - Depending on the arg type, a form is displayed. Configuration completes when the player fills the form.
 *     - If the player cancels the form (through the "X" button):
 *       - If the arg was entered explicitly, we should assume the player doesn't want to change anything.
 *       - Otherwise, we can assume the player wants to cancel the arguable clickable action
 *         - Therefore, we need to do nothing.
 *         - In other words, the WindowRequest session is terminated. Might this have any side impacts? Let's consider one by one:
 *           - If the arguable clickable was opened from an Index button, from a command or from voluntary (explicit) actions, it is totally OK.
 *           - Otherwise, TODO: perhaps we should accept a flag from the calling context
 *   - Command interface:
 *     - If there is an ancestor node with a command entry, and there is a path between only consisting of index nodes, the config can be set via command arguments + subcommands.
 *       - WARNING: The onClick actions for the ancestors (including the one with the `<command>` node) will not be triggered. It behaves as if the node has its own `<command>`.
 *     - Otherwise, the arguable clickable cannot be used by non-players. (TODO: add a command node that allows the console to run to resume the last)
 *     - It is possible to add support for non-index nodes like `<info>` and `<list>`, but:
 *       1. The onClick for the middle nodes will not be called, so some config values might be missing. A possible solution is to require the middle nodes to declare that they can be skipped.
 *       2. It is a
 *     - Therefore I think it is inappropriate to add support for this.
 */
interface ArgsInterface{
	public function configure(WindowRequest $request, bool $explicit, callable $onConfigured) : void;
}
