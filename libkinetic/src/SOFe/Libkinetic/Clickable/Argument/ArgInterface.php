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

use SOFe\Libkinetic\KineticNode;
use SOFe\Libkinetic\WindowRequest;

/**
 * ArgInterface is implemented by various types of args.
 *
 * ## Entry
 * - **Implicit entry**: If some args are required but not set in the WindowRequest, they would be displayed to the user before the parent Clickable is actually clicked (even before onClick).
 * - **Explicit entry**: An arguable window clickable can have an `<editArg>` button that allows the user to edit an arg.
 *
 * ## Interface
 * Both players and non-players can define args via command interface. Form interface is an alternative interface for players.
 *
 * Before the args are passed to the underlying Clickable, they can be validated through a RequestValidator interface.
 *
 * ## Cancellation/Abandonment
 * While the server presents the args interface to the user, the user may ignore it, either through not running the commands required or pressing the "X" button in a form.
 *
 * If the entry to the arg was implicit, this means the user wanted to access the parent Clickable rather than this particular arg. In other words, the user considers this arg as the beginning of the expected Clickable, and ignoring/cancelling this arg means the user no longer wants to access the parent Clickable.
 *
 * If the entry to the arg was explicit, this means the user considers the arg interface as a step in itself. For form interface, the parent Clickable form should be displayed again, as if the user submitted the same value as before. For command interface, explicit entry is not sensible because the user simply needs to run the command again with the optional arguments filled.
 *
 * ## Validation
 * Before and after editing an arg, the optional RequestValidator for the arg is invoked. If the request contains invalid args, the user will receive the error message plus the arg request message again.
 *
 * ## Arg types:
 * Libkinetic provides 4 types of arg:
 *
 * - `<simpleArg>`: a static set of arguments. Each child is set as an argument in the WindowRequest.
 *   - Form interface: the elements were designed specifically for the CustomForm interface. The elements are sent to the user in the same order as in the declaration.
 *   - Command interface: the elements are listed as optional or required command arguments in the same order as in the declaration. Multi-word arguments may need to be "quoted".
 * - `<listArg>`: similar to `<list>`, but `<list>` should provide information in itself while `<listArg>` is just a configuration.
 * - `<cycleArg>`: this is like a hybrid of `<simpleArg>` and `<listArg>`, having a dynamic list, each with static set of arguments.
 *   - Form interface: The form can be `merged="true"` (default) or `merged="false"`.
 *     - If merged, the user sees a CustomForm with the child elements recurring, and each occurrence corresponds to an item in the dynamic list.
 *     - If not merged, the user sees a MenuForm corresponding to the dynamic list, where each item corresponds to an item in the dynamic list. Clicking into each item displays a CustomForm for the child elements. There is a "Submit" option appended to the MenuForm.
 *   - Command interface: needs an adapter from the plugin to implement command syntax parsing.
 * - `<complexArg>`: this is similar to `<cycleArg>`, except there is no dynamic list. Consider the block list in WorldEdit's //set.
 *   - Form interface: The user starts with a blank list (unless previously set), with an "Add" button to add objects to the list. Each object can be edited by the underlying child elements like `<cycleArg>`. Clicking on each element deletes it. Clicking on the trailing "Submit" button submits this list.
 *   - Command interface: needs an adapter from the plugin to implement command syntax parsing.
 */
interface ArgInterface{
	public function configure(WindowRequest $request, bool $explicit, callable $onConfigured) : void;

	public function getNode() : KineticNode;
}
