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

use SOFe\Libkinetic\WindowRequest;

/**
 * A Clickable represents an action that can be executed. They are all valid as children in a master menu (`<index>`), except `<editArg>`, which is only applicable in an arguable window clickable (both ArguableClickableComponent and WindowComponent are depended).
 *
 * Execution path:  DirectEntry -> ClickablePeer -> Clickable
 *
 * ## DirectEntry
 * There are two builtin ways of direct entry: commands and item clicks. Developers can also use `KineticManager->clickNode()` to initiate a direct entry. Non-players can still use the command interface to use a Clickable.
 *
 * ## ClickablePeer
 * ClickablePeer executes something before the Clickable itself is run. Their executions are listed as follows, from the earliest to the latest:
 * - *Permission*: Checks if the user has the permissions described in `<permission>` to use this Clickable. Abandons this request if the user has no permission.
 * - *Arguable*: Ensures that the WindowRequest consists of sufficient arguments to use this Clickable. Abandons this request if the user cancelled the forms asking for the arguments.
 * - *All*: Triggers the `onClick` and `onClickAsync` handler of the Clickable node if any. Abandons this request if the handler throws a `ClickInterruptedException`.
 *
 * ## Clickable
 * There are different types of Clickable for different purposes:
 * - `<exit>`: Does nothing at all. Can be used simply as a "Quit" button, or combined with `onClick` and possibly some Args to create an action button.
 * - `<index>`:
 *   - Players receive a MenuForm that lists options as hardcoded in the `<index>` node.
 *   - Non-players receive a list of index components. If this index node can be entered through a command, appending the `id` of a child node of this index (the subcommand can be otherwise overridden with `subcmd` instead of using `id`) will open the child node directly, as if a `<command>` is declared under the child node.
 * - `<info>`:
 *   - Players receive a ModalForm that contains a message (the `synopsis`) and two buttons (`button1`, `button2`). The two buttons behave as if it is an `<index>` with exactly two buttons - if `<button1>`/`<button2>` contains a Clickable child, it is clicked.
 *   - Non-players will be asked to append `true` or `false` to the command line that initiated this `<info>` click. `true`/`false` can be overridden by the `argName` attribute.
 *     - If this `<info>` requires any arguments, it is not accessible to non-players.
 *     - If `subcmd` is set to `"true"`, the button can be used as a subcommand to further access the Clickable two steps behind (if any), as if it is an index with two buttons.
 *     - Otherwise, the button Clickable will still be clicked. But if this Clickable requires any arguments, the request will be terminated; and if the underlying Clickable is not an `<exit>`, its underlying interaction will not be accessible either.
 *     - `subcmd` should only be set to `"true"` when the `<info>` is "pure", i.e. it only acts as a warning/confirmation dialog. If clicking button1/button2 produces any persistent side effects other than advancing to the underlying Clickable, it must not have `subcmd="true"`.
 *     - Just like index subcommands, the `onClick` handler of the `<info>` will not be called again when the Clickable inside button1/button2 is triggered, nor would either of them be triggered when some subcommand under the Clickable in button1/button2 is issued.
 *     - On the other hand, if the `<info>` is just a warning/confirmation dialog, and it is only expected for players (i.e. console doesn't need confirmation), the attribute `skip="button1"`/`skip="button2"` can be set *on the `<info>` node*. It does not make sense to have both `skip` and `subcmd` on the same `<info>`.
 * - `<list>` provides a dynamic list for the user to choose from. The list data are provided from a `MenuProvider`.
 *   - For non-players, it is presented as a list of data in command response with an associative key for each datum. The user can append the key. Nevertheless, the `<before>` and `<after>` parts can still be used as if it is a simple `<index>`.
 *   - For players, it is presented as a MenuForm. `<before>` is displayed before the data list and `<after>` is displayed after the data list, as if they are an `<index>`. For the data list buttons, clicking on any would trigger the Clickable child in `<each>`, with the value represented by the datum passed as an argument. This is more or less same as a `<listArg>`, and similar to a `<simpleArg>` dynamic dropdown. The main difference is that the options provided in the `<list>` itself should already be an informative list, while `<listArg>` should be used for list options that aren't designed to provide information.
 * - `<editArg>` is only allowed in arguable window clickables, which will explicitly open an argument form.
 */
interface Clickable{
	public function onClick(WindowRequest $request) : void;
}
