# libkinetic [![Poggit-CI](https://poggit.pmmp.io/ci.badge/SOF3/libkinetic/~)](https://poggit.pmmp.io/ci/SOF3/libkinetic/~)
Organize your user interface better!

## What does libkinetic do? How does it work?
Libkinetic reads an XML file that lists the user interface plan in your plugin. For example, see the [example kinetic.xml for SimpleWarp](examples/simplewarp.xml). Here I will briefly explain how it works, but for details, please refer to their respective documentation on [Doxygen](https://sof3.github.io/libkinetic/doxygen/).

Why is so special about libkinetic is that you only have to write the user interface once and libkinetic will implement it for both forms and commands interface. Some advanced components like `<complexArg>` also saves you from the trouble of creating a complicated UI.

### Clickable
Under the root `<kinetic>` node, you can add different user interface components called `Clickable`s. Each `Clickable` can be accessed either through forms UI or commands + chat. There are a few types of `Clickable`s:

### `<info>`
`<info>` is designed to show some text to the user with two subsequent actions, namely `<button1>` and `<button2>`. It can be used for different things:

- Confirmation box (with buttons "OK" and "Cancel")
- Informative dialog plus two custom actions

In form interface, this is presented as a ModalForm. In command interface, the info text is displayed, and the user may append "yes" or "no" (or custom values) to the command to use the buttons.

### `<list>`
`<list>` provides a dynamic list. The data are provided from a MenuProvider implementation. A few example uses include:

- A pure informative list (e.g. player list, world list, warp list)
- A list where you can do something special with each action, e.g.:
  - warp list: click into each warp item to edit/delete it
  - shop list: click into each item to buy it

In form interface, this is presented as a MenuForm. In command interface, the list items are displayed, and the user may type the item ID to click into it.

### `<index>`
