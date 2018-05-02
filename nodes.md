# Index
This file provides a both hierarchical and relational index for libkinetic nodes.

Keywords:
- "Contains": child nodes of the above node
- "Declares": attributes of the above node
- "Subclass": subclasses of the above node
- "Abstract subclass": a subset of the subclasses of the above node
- "Uses": traits used by the above node

Index:

- RootNode (`<kinetic>`/`<root>`)
  - Declares `namespace`: default namespace. Instantiables starting with `\` will be resolved as absolute FQNs. Those starting with `$` will be decided by `KineticAdapter::getInstantiable()`. Thoes starting with `!` will be prepended with the libkinetic namespace (might be shaded)
  - Contains `[0, ∞)` WindowNode/DirectEntryWindowNode (may be merged in the future), each of which can be displayed as a form window independently
    - Contains `[0, 1]` PermissionNode for declaring permissions, either by permission name or by a predicate class
    - Contains `[0, ∞)` AbstractEntryPointNode for declaring entry points
      - Subclass `[0, ∞)` CommandEntryPointNode (`<command>`) for declaring entry commands
        - Contains `[0, ∞)` CommandAliasNode (`<alias>`), declaring individual aliases
      - Subclass `[0, ∞)` ItemEntryPointNode (`<item>`) for declaring entry items
        - Uses ItemFilter/ItemFilterNode for item filtering
          - Contains SimpleItemFilterNode (`<item>`) for multi-item-type filters
        - Uses ItemTouchFilterNode for touch mode filtering
          <!-- - Contains SimpleItemTouchFilterNode for multi-match filters -->
          - Contains `[0, 5]` TouchModeNode (`<touchMode>`) for specifying touch modes
    - Subclass `[0, ∞)` IndexNode (`<index>`): a hardcoded MenuForm
      - Contains `[1, ∞)` DirectEntryWindowNode children
      - Uses WindowParentNode for accepting DirectEntryWindowNode children
    - Abstract subclass `[0, ∞)` ConfigurableWindowNode: dynamic forms whose values can be configured
      - Contains `[0, ∞)` AbstractConfigNode for configuration
        - Declares `required`, whether this configuration must be set
        - Declares `local`, whether (`true`) this configuration is local or (`false`) should be further forwarded to child windows (if any)
        - Abstract subclass `[0, ∞)` AbstractConfigWindowNode: provides configurations that can be displayed as a form window
          - Subclass `[0, ∞)` ConfigNode (`<config>`): hardcoded config elements in a single CustomForm, outputs a fixed set of configuration values (`Map<NodeIDPart, ElementNode.Result>`)
            - Contains `[1, ∞)` ElementNode
              - Subclass `[0, ∞)` LabelNode (`<label>`): represents a `label` CustomForm element
              - Abstract subclass `[1, ∞)` EditableElementNode: represents a CustomForm element that returns a useful value
                - Subclass `[0, ∞)` InputNode (`<input>`): represents an `input` CustomForm element
                - Subclass `[0, ∞)` ToggleNode (`<toggle>`): represents a `toggle` CustomForm element
                - Subclass `[0, ∞)` SliderNode (`<slider>`): represents a `slider` CustomForm element
                - Abstract subclass `[0, ∞)` DropdownLikeNode
                  - Either
                    - Contains `[1, ∞)` DropdownOptionNode (`<option>`), representing options of the DropdownLikeNode
                  - Or
                    - Declares `provider`, an instantiable DropdownOptionProvider responsible for providing options to this provider
                  - Subclass `[0, ∞)` DropdownNode (`<dropdown>`): represents a `dropdown` CustomForm element
                  - Subclass `[0, ∞)` EditableNode (`<stepSlider>`): represents a `step_slider` CustomForm element
          - Subclass `[0, ∞)` ListConfigNode (`<listConfig>`): options listed in a MenuForm, outputs a single configuration value (`ListProvider.ItemID`)
            - Declares `provider`, an instantiable ListProvider responsible for providing options to the list
          - Subclass `[0, ∞)` ComplexConfigNode (`<complexConfig>`): a big CustomForm with recurring config elements, each recurrence contains a hardcoded set of config elements, the number of recurrences and parameters to each recurrence provided by a ComplexConfigProvider, outputs a list of a a fixed set of configuration values (`Map<ComplexConfigProvider.ItemID, Map<NodeIDPart, ElementNode.Result>>`)
            - Declares `provider`, an instantiable ComplexConfigProvider
            - Contains `1` EachComplexNode (`<each>`), defining the config elements of each recurrence
              - Contains `[1, ∞)` ElementNode
        - Subclass `[0, ∞)` CommandConfigNode (`<commandConfig>`): a single-CustomForm-element configuration, may be specified as required arguments in CustomForm
      - Subclass `[0, ∞)` ListNode (`<list>`): a dynamic MenuForm whose values are provided by a ListProvider
        - Declares `provider`, an instantiable ListProvider
        - Contains `[0, 2]` BeforeAfterListNode: header/footer buttons for this list
          - Contains `1` DirectEntryWindowNode
          - Uses WindowParentNode for accepting the DirectEntryWindowNode child
          - Subclass `[0, 1]` BeforeListNode (`<before>`): header buttons
          - Subclass `[0, 1]` AfterListNode (`<after>`): footer buttons
        - Contains `1` EachListNode (`<each>`): the window to display after clicking each button
          - Declares `configName`: the button's list item ID will be forwarded to the next form as a `configName` using this button
      - Subclass `[0, ∞)` InfoNode (`<info>`): a ModalForm with a single message (like other nodes, config values will be sent into the message through KineticAdapter's message processing implementation)
        - Contains ButtonNode (`<button1>`, `<button2>`): the two buttons in the ModalForm
          - Declares `onClick`, an instantiable ClickListener for handling the button click
          - Contains `[0, 1]` DirectEntryWindowNode: the next window to display upon clicking the button
    - Subclass `[0, ∞)` ExitNode (`<exit>`): upon clicking the button, the window chain will complete and no more forms will be immediately shown (this should usually be made an optional element instead)
  - Contains `[0, ∞)` LinkNode (`<link>`), each pointing to another DirectEntryWindowNode
