# Libkinetic developer note

> This document is intended for developers who want to contribute to libkinetic's own development. For libkinetic users, read [the README](README.md) instead.

## Node vs Component
The characteristics (attributes, children, special behaviour, etc.) of each XML element (node) are implemented in `KineticComponent`s. For example, the root node is characterized by the `RootComponent` class. Each node may have multiple components, representing different parts of its characteristics.

### Component dependency
Each component class should extend `KineticComponent` directly, except for very special circumstances.

If a component only works correctly when used with another component, it can override the `KineticComponent::dependsComponents()` method. This method should return an Iterator object (typically a Generator), so subclasses can add lines like `yield XxxComponent::class;` to declare the components they require. These classes will be appended to the list of components in the node.

Each component class is only added to the same component once, even if multiple components depend on it.

`dependComponents()` is called before any attributes or children are passed to the component. Thus, its result should not change according to the attributes.

### Attributes
If the component consumes XML attributes, it should override the `setAttribute(string $name, string $value)` method, which is called when the parser reaches the line of the node. `$name` is the attribute name in uppercase (because attributes are case-insensitive). The implementation should return `true` if it consumed the attribute, `false` otherwise.

In case of incorrect values (but not when an attribute from another component is read), the component implementation can call `$this->throw()` to throw an exception based on the specified node. Libkinetic will append information about the error node to the exception message.

`setAttribute()` is executed in the parser context, i.e. it may be executed in a non-PocketMine runtime, such as a virion CLI tool. Hence, it should not attempt to call any PocketMine API methods (unless polyfilled) or verify/use any normal server runtime information (such as config values and external classes). Do this in `resolve()` instead.

The `$value` is always an as-is string from the XML attribute. To interpret it as other types, the following methods are useful:

```php
public final function KineticComponent::parseBoolean(string) : bool;
public final function KineticComponent::parseInt(string) : int;
public final function KineticComponent::parseFloat(string) : float;
```

Do not call these methods if the value can be customized in a config with the `config:` prefix.

If the attribute uses a different namespace than `https://rawgit.com/SOF3/libkinetic/master/libkinetic.xsd`, it should override `setAttributeNS(string $name, string $value, string $ns)` instead.

### Child nodes
If the component enables the node to have child XML elements, it should override the `startChild(string $name)` method, which is called when the parser reaches the line with the child node. `$name` is the child element name in uppercase. The implementation should return the `KineticNode` created, initialized with the relevant components, or `null` if `$name` is not known by this component.

`startChild()` is executed in the parser context, i.e. it may be executed in a non-PocketMine runtime, such as a virion CLI tool. Hence, it should not attempt to call any PocketMine API methods (unless polyfilled) or verify/use any normal server runtime information (such as config values and external classes). Do this in `resolve()` instead.

The resultant `KineticNode` can be constructed by the method `KienticNode::create(string ...$classes)`, where `$classes` is a variadic array of `KineticComponent` subclass names. Components can also fluently store the relevant components into their class fields using the methods declared in the `ComponentAdapter` trait, which is generated from [`generateAdapter.php`](tools/generateAdapter.php).

If the element uses a different namespace than `https://rawgit.com/SOF3/libkinetic/master/libkinetic.xsd`, it should override `startChildNS(string $name, string $ns)` instead.

### Character data
If the component accepts XML character data, it should override the `acceptText(string $text)` method, which is called when the parser reaches the end of a chunk of character data. `$text` is the data trimmed and unwrapped.

It is not advisable to use character data together with child nodes, as the syntax becomes very strange. It is also not desirable to accept multiline content in character data, confusion with indentation and line wrapping may arise.


### Validation
There are two types of validation: static validation and runtime validation.

Static validation refers to the validation executed in the parser context. Apart from the initial loading of the kinetic file in a normal server runtime, static validation is also executed in the `validate` and `def` CLI tools. Static validation should only check if the kinetic is syntactically well-formed and valid, i.e. it does not contain unsupported elements/attributes or incorrect combinations of them.

Runtime validation refers to the validation only executed in the manager context. The manager context has a dependency on the PocketMine plugin framework, so it is only executed during server runtime. Runtime validation can carry out checks on runtime environment and plugin code, such as whether a declared class name is undefined, check certain config values, etc.

Static validation should be implemented in `KineticComponent::endElement()`, which is called after an XML element ends (closing tag `</element>` or self-closing tag `<element/>`). There are several commonly-used helper methods for static validation:

```php
protected final function requireAttribute(string $name, &$field); // checks if $field is set; throw "Required attribute $name missing" if not set
protected final function requireChild(string $name, &$field); // checks if $field is set; throw "Required child $name missing" if not set
protected final function requireChildren(string $name, array $field, int $min, int $max = PHP_INT_MAX); // checks if $field contains an array of [$min, $max] elements; throw "Required child $name missing" if not set
protected final function requireText(string $name, array $field, int $min, int $max = PHP_INT_MAX); // checks if $field is set; throw exception if not set
```

Runtime validation should be implemented in `KineticComponent::resolve()`, which is called after the parser has completed. It is called in the same sequence as that of the appearance of the start tags in the XML file. There are several commonly-used helper methods for runtime validation:

```php
protected final function requireTranslation(?string $identifier); // check if the translation $identifier is either null or defined in the translation provider (KineticAdapterBase::hasMessage())
protected final function resolveClass(?string $fqn, ?string $super); // check if the class exists according to the libkinetic Instantiable notation and implements the interface $super
protected final function resolveConfigString(?string &$string); // resolve the field $string into a string from config if it starts with `config:`
protected final function resolveConfigNumber(&$number); // resolve the field $number into a number from config if it starts with `config:`, otherwise parse it
protected final function resolveConfigBool(&$bool); // resolve the field $bool into a boolean from config if it starts with `config:`, otherwise parse it
```
