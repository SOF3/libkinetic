
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:SOFe" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe.html">SOFe</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:SOFe_libkinetic" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/libkinetic.html">libkinetic</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:SOFe_libkinetic_Nodes" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/libkinetic/Nodes.html">Nodes</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_libkinetic_Nodes_AfterListNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/AfterListNode.html">AfterListNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_BeforeAfterListNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/BeforeAfterListNode.html">BeforeAfterListNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_BeforeListNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/BeforeListNode.html">BeforeListNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_CommandAliasNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/CommandAliasNode.html">CommandAliasNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_CommandEntryWindowNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/CommandEntryWindowNode.html">CommandEntryWindowNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_CommandNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/CommandNode.html">CommandNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_ConfigNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/ConfigNode.html">ConfigNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_ConfigurableWindowNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/ConfigurableWindowNode.html">ConfigurableWindowNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_DropdownLikeNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/DropdownLikeNode.html">DropdownLikeNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_DropdownNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/DropdownNode.html">DropdownNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_DropdownOptionNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/DropdownOptionNode.html">DropdownOptionNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_EachListNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/EachListNode.html">EachListNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_ElementNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/ElementNode.html">ElementNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_IndexNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/IndexNode.html">IndexNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_InfoNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/InfoNode.html">InfoNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_InputNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/InputNode.html">InputNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_KineticNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/KineticNode.html">KineticNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_KineticNodeWithId" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/KineticNodeWithId.html">KineticNodeWithId</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_LabelNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/LabelNode.html">LabelNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_LinkNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/LinkNode.html">LinkNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_ListNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/ListNode.html">ListNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_PermissionNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/PermissionNode.html">PermissionNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_ResolvableNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/ResolvableNode.html">ResolvableNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_SliderNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/SliderNode.html">SliderNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_StepSliderNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/StepSliderNode.html">StepSliderNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_SynopsisNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/SynopsisNode.html">SynopsisNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_ToggleNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/ToggleNode.html">ToggleNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_WindowNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/WindowNode.html">WindowNode</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Nodes_WindowParentNode" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Nodes/WindowParentNode.html">WindowParentNode</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_libkinetic_Parser" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/libkinetic/Parser.html">Parser</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_libkinetic_Parser_JsonFileParser" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Parser/JsonFileParser.html">JsonFileParser</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Parser_KineticFileParser" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Parser/KineticFileParser.html">KineticFileParser</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_Parser_XmlFileParser" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/libkinetic/Parser/XmlFileParser.html">XmlFileParser</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:SOFe_libkinetic_FormListener" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/libkinetic/FormListener.html">FormListener</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_KineticManager" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/libkinetic/KineticManager.html">KineticManager</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_ListProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/libkinetic/ListProvider.html">ListProvider</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_NodeEntryCommand" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/libkinetic/NodeEntryCommand.html">NodeEntryCommand</a>                    </div>                </li>                            <li data-name="class:SOFe_libkinetic_ParseException" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/libkinetic/ParseException.html">ParseException</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "SOFe.html", "name": "SOFe", "doc": "Namespace SOFe"},{"type": "Namespace", "link": "SOFe/libkinetic.html", "name": "SOFe\\libkinetic", "doc": "Namespace SOFe\\libkinetic"},{"type": "Namespace", "link": "SOFe/libkinetic/Nodes.html", "name": "SOFe\\libkinetic\\Nodes", "doc": "Namespace SOFe\\libkinetic\\Nodes"},{"type": "Namespace", "link": "SOFe/libkinetic/Parser.html", "name": "SOFe\\libkinetic\\Parser", "doc": "Namespace SOFe\\libkinetic\\Parser"},
            {"type": "Interface", "fromName": "SOFe\\libkinetic", "fromLink": "SOFe/libkinetic.html", "link": "SOFe/libkinetic/ListProvider.html", "name": "SOFe\\libkinetic\\ListProvider", "doc": "&quot;&quot;"},
                    
            {"type": "Interface", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/KineticNodeWithId.html", "name": "SOFe\\libkinetic\\Nodes\\KineticNodeWithId", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\KineticNodeWithId", "fromLink": "SOFe/libkinetic/Nodes/KineticNodeWithId.html", "link": "SOFe/libkinetic/Nodes/KineticNodeWithId.html#method_getId", "name": "SOFe\\libkinetic\\Nodes\\KineticNodeWithId::getId", "doc": "&quot;&quot;"},
            
            {"type": "Interface", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/ResolvableNode.html", "name": "SOFe\\libkinetic\\Nodes\\ResolvableNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ResolvableNode", "fromLink": "SOFe/libkinetic/Nodes/ResolvableNode.html", "link": "SOFe/libkinetic/Nodes/ResolvableNode.html#method_resolve", "name": "SOFe\\libkinetic\\Nodes\\ResolvableNode::resolve", "doc": "&quot;&quot;"},
            
            
            {"type": "Class", "fromName": "SOFe\\libkinetic", "fromLink": "SOFe/libkinetic.html", "link": "SOFe/libkinetic/FormListener.html", "name": "SOFe\\libkinetic\\FormListener", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\FormListener", "fromLink": "SOFe/libkinetic/FormListener.html", "link": "SOFe/libkinetic/FormListener.html#method___construct", "name": "SOFe\\libkinetic\\FormListener::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\FormListener", "fromLink": "SOFe/libkinetic/FormListener.html", "link": "SOFe/libkinetic/FormListener.html#method_e_packetRecv", "name": "SOFe\\libkinetic\\FormListener::e_packetRecv", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic", "fromLink": "SOFe/libkinetic.html", "link": "SOFe/libkinetic/KineticManager.html", "name": "SOFe\\libkinetic\\KineticManager", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\KineticManager", "fromLink": "SOFe/libkinetic/KineticManager.html", "link": "SOFe/libkinetic/KineticManager.html#method___construct", "name": "SOFe\\libkinetic\\KineticManager::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\KineticManager", "fromLink": "SOFe/libkinetic/KineticManager.html", "link": "SOFe/libkinetic/KineticManager.html#method_getPlugin", "name": "SOFe\\libkinetic\\KineticManager::getPlugin", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\KineticManager", "fromLink": "SOFe/libkinetic/KineticManager.html", "link": "SOFe/libkinetic/KineticManager.html#method_getParser", "name": "SOFe\\libkinetic\\KineticManager::getParser", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic", "fromLink": "SOFe/libkinetic.html", "link": "SOFe/libkinetic/ListProvider.html", "name": "SOFe\\libkinetic\\ListProvider", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "SOFe\\libkinetic", "fromLink": "SOFe/libkinetic.html", "link": "SOFe/libkinetic/NodeEntryCommand.html", "name": "SOFe\\libkinetic\\NodeEntryCommand", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\NodeEntryCommand", "fromLink": "SOFe/libkinetic/NodeEntryCommand.html", "link": "SOFe/libkinetic/NodeEntryCommand.html#method___construct", "name": "SOFe\\libkinetic\\NodeEntryCommand::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\NodeEntryCommand", "fromLink": "SOFe/libkinetic/NodeEntryCommand.html", "link": "SOFe/libkinetic/NodeEntryCommand.html#method_execute", "name": "SOFe\\libkinetic\\NodeEntryCommand::execute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\NodeEntryCommand", "fromLink": "SOFe/libkinetic/NodeEntryCommand.html", "link": "SOFe/libkinetic/NodeEntryCommand.html#method_getPlugin", "name": "SOFe\\libkinetic\\NodeEntryCommand::getPlugin", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/AfterListNode.html", "name": "SOFe\\libkinetic\\Nodes\\AfterListNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\AfterListNode", "fromLink": "SOFe/libkinetic/Nodes/AfterListNode.html", "link": "SOFe/libkinetic/Nodes/AfterListNode.html#method_getIdPart", "name": "SOFe\\libkinetic\\Nodes\\AfterListNode::getIdPart", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/BeforeAfterListNode.html", "name": "SOFe\\libkinetic\\Nodes\\BeforeAfterListNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\BeforeAfterListNode", "fromLink": "SOFe/libkinetic/Nodes/BeforeAfterListNode.html", "link": "SOFe/libkinetic/Nodes/BeforeAfterListNode.html#method_setAttribute", "name": "SOFe\\libkinetic\\Nodes\\BeforeAfterListNode::setAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\BeforeAfterListNode", "fromLink": "SOFe/libkinetic/Nodes/BeforeAfterListNode.html", "link": "SOFe/libkinetic/Nodes/BeforeAfterListNode.html#method_endAttributes", "name": "SOFe\\libkinetic\\Nodes\\BeforeAfterListNode::endAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\BeforeAfterListNode", "fromLink": "SOFe/libkinetic/Nodes/BeforeAfterListNode.html", "link": "SOFe/libkinetic/Nodes/BeforeAfterListNode.html#method_getIdPart", "name": "SOFe\\libkinetic\\Nodes\\BeforeAfterListNode::getIdPart", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/BeforeListNode.html", "name": "SOFe\\libkinetic\\Nodes\\BeforeListNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\BeforeListNode", "fromLink": "SOFe/libkinetic/Nodes/BeforeListNode.html", "link": "SOFe/libkinetic/Nodes/BeforeListNode.html#method_getIdPart", "name": "SOFe\\libkinetic\\Nodes\\BeforeListNode::getIdPart", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/CommandAliasNode.html", "name": "SOFe\\libkinetic\\Nodes\\CommandAliasNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\CommandAliasNode", "fromLink": "SOFe/libkinetic/Nodes/CommandAliasNode.html", "link": "SOFe/libkinetic/Nodes/CommandAliasNode.html#method_acceptText", "name": "SOFe\\libkinetic\\Nodes\\CommandAliasNode::acceptText", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\CommandAliasNode", "fromLink": "SOFe/libkinetic/Nodes/CommandAliasNode.html", "link": "SOFe/libkinetic/Nodes/CommandAliasNode.html#method_endElement", "name": "SOFe\\libkinetic\\Nodes\\CommandAliasNode::endElement", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\CommandAliasNode", "fromLink": "SOFe/libkinetic/Nodes/CommandAliasNode.html", "link": "SOFe/libkinetic/Nodes/CommandAliasNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\CommandAliasNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/CommandEntryWindowNode.html", "name": "SOFe\\libkinetic\\Nodes\\CommandEntryWindowNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\CommandEntryWindowNode", "fromLink": "SOFe/libkinetic/Nodes/CommandEntryWindowNode.html", "link": "SOFe/libkinetic/Nodes/CommandEntryWindowNode.html#method_startChild", "name": "SOFe\\libkinetic\\Nodes\\CommandEntryWindowNode::startChild", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\CommandEntryWindowNode", "fromLink": "SOFe/libkinetic/Nodes/CommandEntryWindowNode.html", "link": "SOFe/libkinetic/Nodes/CommandEntryWindowNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\CommandEntryWindowNode::jsonSerialize", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\CommandEntryWindowNode", "fromLink": "SOFe/libkinetic/Nodes/CommandEntryWindowNode.html", "link": "SOFe/libkinetic/Nodes/CommandEntryWindowNode.html#method_resolve", "name": "SOFe\\libkinetic\\Nodes\\CommandEntryWindowNode::resolve", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/CommandNode.html", "name": "SOFe\\libkinetic\\Nodes\\CommandNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\CommandNode", "fromLink": "SOFe/libkinetic/Nodes/CommandNode.html", "link": "SOFe/libkinetic/Nodes/CommandNode.html#method_setAttribute", "name": "SOFe\\libkinetic\\Nodes\\CommandNode::setAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\CommandNode", "fromLink": "SOFe/libkinetic/Nodes/CommandNode.html", "link": "SOFe/libkinetic/Nodes/CommandNode.html#method_endAttributes", "name": "SOFe\\libkinetic\\Nodes\\CommandNode::endAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\CommandNode", "fromLink": "SOFe/libkinetic/Nodes/CommandNode.html", "link": "SOFe/libkinetic/Nodes/CommandNode.html#method_startChild", "name": "SOFe\\libkinetic\\Nodes\\CommandNode::startChild", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\CommandNode", "fromLink": "SOFe/libkinetic/Nodes/CommandNode.html", "link": "SOFe/libkinetic/Nodes/CommandNode.html#method_resolve", "name": "SOFe\\libkinetic\\Nodes\\CommandNode::resolve", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\CommandNode", "fromLink": "SOFe/libkinetic/Nodes/CommandNode.html", "link": "SOFe/libkinetic/Nodes/CommandNode.html#method_getName", "name": "SOFe\\libkinetic\\Nodes\\CommandNode::getName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\CommandNode", "fromLink": "SOFe/libkinetic/Nodes/CommandNode.html", "link": "SOFe/libkinetic/Nodes/CommandNode.html#method_getAliases", "name": "SOFe\\libkinetic\\Nodes\\CommandNode::getAliases", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/ConfigNode.html", "name": "SOFe\\libkinetic\\Nodes\\ConfigNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ConfigNode", "fromLink": "SOFe/libkinetic/Nodes/ConfigNode.html", "link": "SOFe/libkinetic/Nodes/ConfigNode.html#method_setAttribute", "name": "SOFe\\libkinetic\\Nodes\\ConfigNode::setAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ConfigNode", "fromLink": "SOFe/libkinetic/Nodes/ConfigNode.html", "link": "SOFe/libkinetic/Nodes/ConfigNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\ConfigNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/ConfigurableWindowNode.html", "name": "SOFe\\libkinetic\\Nodes\\ConfigurableWindowNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ConfigurableWindowNode", "fromLink": "SOFe/libkinetic/Nodes/ConfigurableWindowNode.html", "link": "SOFe/libkinetic/Nodes/ConfigurableWindowNode.html#method_startChild", "name": "SOFe\\libkinetic\\Nodes\\ConfigurableWindowNode::startChild", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ConfigurableWindowNode", "fromLink": "SOFe/libkinetic/Nodes/ConfigurableWindowNode.html", "link": "SOFe/libkinetic/Nodes/ConfigurableWindowNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\ConfigurableWindowNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/DropdownLikeNode.html", "name": "SOFe\\libkinetic\\Nodes\\DropdownLikeNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\DropdownLikeNode", "fromLink": "SOFe/libkinetic/Nodes/DropdownLikeNode.html", "link": "SOFe/libkinetic/Nodes/DropdownLikeNode.html#method_startChild", "name": "SOFe\\libkinetic\\Nodes\\DropdownLikeNode::startChild", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\DropdownLikeNode", "fromLink": "SOFe/libkinetic/Nodes/DropdownLikeNode.html", "link": "SOFe/libkinetic/Nodes/DropdownLikeNode.html#method_endElement", "name": "SOFe\\libkinetic\\Nodes\\DropdownLikeNode::endElement", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\DropdownLikeNode", "fromLink": "SOFe/libkinetic/Nodes/DropdownLikeNode.html", "link": "SOFe/libkinetic/Nodes/DropdownLikeNode.html#method_getStepName", "name": "SOFe\\libkinetic\\Nodes\\DropdownLikeNode::getStepName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\DropdownLikeNode", "fromLink": "SOFe/libkinetic/Nodes/DropdownLikeNode.html", "link": "SOFe/libkinetic/Nodes/DropdownLikeNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\DropdownLikeNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/DropdownNode.html", "name": "SOFe\\libkinetic\\Nodes\\DropdownNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\DropdownNode", "fromLink": "SOFe/libkinetic/Nodes/DropdownNode.html", "link": "SOFe/libkinetic/Nodes/DropdownNode.html#method_getStepName", "name": "SOFe\\libkinetic\\Nodes\\DropdownNode::getStepName", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/DropdownOptionNode.html", "name": "SOFe\\libkinetic\\Nodes\\DropdownOptionNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\DropdownOptionNode", "fromLink": "SOFe/libkinetic/Nodes/DropdownOptionNode.html", "link": "SOFe/libkinetic/Nodes/DropdownOptionNode.html#method_setAttribute", "name": "SOFe\\libkinetic\\Nodes\\DropdownOptionNode::setAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\DropdownOptionNode", "fromLink": "SOFe/libkinetic/Nodes/DropdownOptionNode.html", "link": "SOFe/libkinetic/Nodes/DropdownOptionNode.html#method_endAttributes", "name": "SOFe\\libkinetic\\Nodes\\DropdownOptionNode::endAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\DropdownOptionNode", "fromLink": "SOFe/libkinetic/Nodes/DropdownOptionNode.html", "link": "SOFe/libkinetic/Nodes/DropdownOptionNode.html#method_acceptText", "name": "SOFe\\libkinetic\\Nodes\\DropdownOptionNode::acceptText", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\DropdownOptionNode", "fromLink": "SOFe/libkinetic/Nodes/DropdownOptionNode.html", "link": "SOFe/libkinetic/Nodes/DropdownOptionNode.html#method_endElement", "name": "SOFe\\libkinetic\\Nodes\\DropdownOptionNode::endElement", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\DropdownOptionNode", "fromLink": "SOFe/libkinetic/Nodes/DropdownOptionNode.html", "link": "SOFe/libkinetic/Nodes/DropdownOptionNode.html#method_isDefault", "name": "SOFe\\libkinetic\\Nodes\\DropdownOptionNode::isDefault", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\DropdownOptionNode", "fromLink": "SOFe/libkinetic/Nodes/DropdownOptionNode.html", "link": "SOFe/libkinetic/Nodes/DropdownOptionNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\DropdownOptionNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/EachListNode.html", "name": "SOFe\\libkinetic\\Nodes\\EachListNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\EachListNode", "fromLink": "SOFe/libkinetic/Nodes/EachListNode.html", "link": "SOFe/libkinetic/Nodes/EachListNode.html#method_startChild", "name": "SOFe\\libkinetic\\Nodes\\EachListNode::startChild", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\EachListNode", "fromLink": "SOFe/libkinetic/Nodes/EachListNode.html", "link": "SOFe/libkinetic/Nodes/EachListNode.html#method_resolve", "name": "SOFe\\libkinetic\\Nodes\\EachListNode::resolve", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\EachListNode", "fromLink": "SOFe/libkinetic/Nodes/EachListNode.html", "link": "SOFe/libkinetic/Nodes/EachListNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\EachListNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/ElementNode.html", "name": "SOFe\\libkinetic\\Nodes\\ElementNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ElementNode", "fromLink": "SOFe/libkinetic/Nodes/ElementNode.html", "link": "SOFe/libkinetic/Nodes/ElementNode.html#method_setAttribute", "name": "SOFe\\libkinetic\\Nodes\\ElementNode::setAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ElementNode", "fromLink": "SOFe/libkinetic/Nodes/ElementNode.html", "link": "SOFe/libkinetic/Nodes/ElementNode.html#method_endAttributes", "name": "SOFe\\libkinetic\\Nodes\\ElementNode::endAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ElementNode", "fromLink": "SOFe/libkinetic/Nodes/ElementNode.html", "link": "SOFe/libkinetic/Nodes/ElementNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\ElementNode::jsonSerialize", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ElementNode", "fromLink": "SOFe/libkinetic/Nodes/ElementNode.html", "link": "SOFe/libkinetic/Nodes/ElementNode.html#method_getId", "name": "SOFe\\libkinetic\\Nodes\\ElementNode::getId", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ElementNode", "fromLink": "SOFe/libkinetic/Nodes/ElementNode.html", "link": "SOFe/libkinetic/Nodes/ElementNode.html#method_getTitle", "name": "SOFe\\libkinetic\\Nodes\\ElementNode::getTitle", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ElementNode", "fromLink": "SOFe/libkinetic/Nodes/ElementNode.html", "link": "SOFe/libkinetic/Nodes/ElementNode.html#method_byName", "name": "SOFe\\libkinetic\\Nodes\\ElementNode::byName", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/IndexNode.html", "name": "SOFe\\libkinetic\\Nodes\\IndexNode", "doc": "&quot;Index is displayed as a MenuForm, where options are hardcoded to be links to a child window or a link to a window identified by its ID.&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\IndexNode", "fromLink": "SOFe/libkinetic/Nodes/IndexNode.html", "link": "SOFe/libkinetic/Nodes/IndexNode.html#method_startChild", "name": "SOFe\\libkinetic\\Nodes\\IndexNode::startChild", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\IndexNode", "fromLink": "SOFe/libkinetic/Nodes/IndexNode.html", "link": "SOFe/libkinetic/Nodes/IndexNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\IndexNode::jsonSerialize", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\IndexNode", "fromLink": "SOFe/libkinetic/Nodes/IndexNode.html", "link": "SOFe/libkinetic/Nodes/IndexNode.html#method_resolve", "name": "SOFe\\libkinetic\\Nodes\\IndexNode::resolve", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/InfoNode.html", "name": "SOFe\\libkinetic\\Nodes\\InfoNode", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/InputNode.html", "name": "SOFe\\libkinetic\\Nodes\\InputNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\InputNode", "fromLink": "SOFe/libkinetic/Nodes/InputNode.html", "link": "SOFe/libkinetic/Nodes/InputNode.html#method_setAttribute", "name": "SOFe\\libkinetic\\Nodes\\InputNode::setAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\InputNode", "fromLink": "SOFe/libkinetic/Nodes/InputNode.html", "link": "SOFe/libkinetic/Nodes/InputNode.html#method_typeCast", "name": "SOFe\\libkinetic\\Nodes\\InputNode::typeCast", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\InputNode", "fromLink": "SOFe/libkinetic/Nodes/InputNode.html", "link": "SOFe/libkinetic/Nodes/InputNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\InputNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/KineticNode.html", "name": "SOFe\\libkinetic\\Nodes\\KineticNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\KineticNode", "fromLink": "SOFe/libkinetic/Nodes/KineticNode.html", "link": "SOFe/libkinetic/Nodes/KineticNode.html#method_setAttribute", "name": "SOFe\\libkinetic\\Nodes\\KineticNode::setAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\KineticNode", "fromLink": "SOFe/libkinetic/Nodes/KineticNode.html", "link": "SOFe/libkinetic/Nodes/KineticNode.html#method_startChild", "name": "SOFe\\libkinetic\\Nodes\\KineticNode::startChild", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\KineticNode", "fromLink": "SOFe/libkinetic/Nodes/KineticNode.html", "link": "SOFe/libkinetic/Nodes/KineticNode.html#method_endAttributes", "name": "SOFe\\libkinetic\\Nodes\\KineticNode::endAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\KineticNode", "fromLink": "SOFe/libkinetic/Nodes/KineticNode.html", "link": "SOFe/libkinetic/Nodes/KineticNode.html#method_endElement", "name": "SOFe\\libkinetic\\Nodes\\KineticNode::endElement", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\KineticNode", "fromLink": "SOFe/libkinetic/Nodes/KineticNode.html", "link": "SOFe/libkinetic/Nodes/KineticNode.html#method_acceptText", "name": "SOFe\\libkinetic\\Nodes\\KineticNode::acceptText", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\KineticNode", "fromLink": "SOFe/libkinetic/Nodes/KineticNode.html", "link": "SOFe/libkinetic/Nodes/KineticNode.html#method_requireAttributes", "name": "SOFe\\libkinetic\\Nodes\\KineticNode::requireAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\KineticNode", "fromLink": "SOFe/libkinetic/Nodes/KineticNode.html", "link": "SOFe/libkinetic/Nodes/KineticNode.html#method_requireElements", "name": "SOFe\\libkinetic\\Nodes\\KineticNode::requireElements", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\KineticNode", "fromLink": "SOFe/libkinetic/Nodes/KineticNode.html", "link": "SOFe/libkinetic/Nodes/KineticNode.html#method_parseBoolean", "name": "SOFe\\libkinetic\\Nodes\\KineticNode::parseBoolean", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\KineticNode", "fromLink": "SOFe/libkinetic/Nodes/KineticNode.html", "link": "SOFe/libkinetic/Nodes/KineticNode.html#method_getRoot", "name": "SOFe\\libkinetic\\Nodes\\KineticNode::getRoot", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\KineticNode", "fromLink": "SOFe/libkinetic/Nodes/KineticNode.html", "link": "SOFe/libkinetic/Nodes/KineticNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\KineticNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/KineticNodeWithId.html", "name": "SOFe\\libkinetic\\Nodes\\KineticNodeWithId", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\KineticNodeWithId", "fromLink": "SOFe/libkinetic/Nodes/KineticNodeWithId.html", "link": "SOFe/libkinetic/Nodes/KineticNodeWithId.html#method_getId", "name": "SOFe\\libkinetic\\Nodes\\KineticNodeWithId::getId", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/LabelNode.html", "name": "SOFe\\libkinetic\\Nodes\\LabelNode", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/LinkNode.html", "name": "SOFe\\libkinetic\\Nodes\\LinkNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\LinkNode", "fromLink": "SOFe/libkinetic/Nodes/LinkNode.html", "link": "SOFe/libkinetic/Nodes/LinkNode.html#method_setAttribute", "name": "SOFe\\libkinetic\\Nodes\\LinkNode::setAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\LinkNode", "fromLink": "SOFe/libkinetic/Nodes/LinkNode.html", "link": "SOFe/libkinetic/Nodes/LinkNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\LinkNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/ListNode.html", "name": "SOFe\\libkinetic\\Nodes\\ListNode", "doc": "&quot;ListNode is displayed as a MenuForm. The buttons consist of three parts: before, list and after.&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ListNode", "fromLink": "SOFe/libkinetic/Nodes/ListNode.html", "link": "SOFe/libkinetic/Nodes/ListNode.html#method_setAttribute", "name": "SOFe\\libkinetic\\Nodes\\ListNode::setAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ListNode", "fromLink": "SOFe/libkinetic/Nodes/ListNode.html", "link": "SOFe/libkinetic/Nodes/ListNode.html#method_endAttributes", "name": "SOFe\\libkinetic\\Nodes\\ListNode::endAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ListNode", "fromLink": "SOFe/libkinetic/Nodes/ListNode.html", "link": "SOFe/libkinetic/Nodes/ListNode.html#method_startChild", "name": "SOFe\\libkinetic\\Nodes\\ListNode::startChild", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ListNode", "fromLink": "SOFe/libkinetic/Nodes/ListNode.html", "link": "SOFe/libkinetic/Nodes/ListNode.html#method_endElement", "name": "SOFe\\libkinetic\\Nodes\\ListNode::endElement", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ListNode", "fromLink": "SOFe/libkinetic/Nodes/ListNode.html", "link": "SOFe/libkinetic/Nodes/ListNode.html#method_resolve", "name": "SOFe\\libkinetic\\Nodes\\ListNode::resolve", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ListNode", "fromLink": "SOFe/libkinetic/Nodes/ListNode.html", "link": "SOFe/libkinetic/Nodes/ListNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\ListNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/PermissionNode.html", "name": "SOFe\\libkinetic\\Nodes\\PermissionNode", "doc": "&quot;Describes the permission required for accessing a certain window.&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\PermissionNode", "fromLink": "SOFe/libkinetic/Nodes/PermissionNode.html", "link": "SOFe/libkinetic/Nodes/PermissionNode.html#method_setAttribute", "name": "SOFe\\libkinetic\\Nodes\\PermissionNode::setAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\PermissionNode", "fromLink": "SOFe/libkinetic/Nodes/PermissionNode.html", "link": "SOFe/libkinetic/Nodes/PermissionNode.html#method_acceptText", "name": "SOFe\\libkinetic\\Nodes\\PermissionNode::acceptText", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\PermissionNode", "fromLink": "SOFe/libkinetic/Nodes/PermissionNode.html", "link": "SOFe/libkinetic/Nodes/PermissionNode.html#method_endElement", "name": "SOFe\\libkinetic\\Nodes\\PermissionNode::endElement", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\PermissionNode", "fromLink": "SOFe/libkinetic/Nodes/PermissionNode.html", "link": "SOFe/libkinetic/Nodes/PermissionNode.html#method_validate", "name": "SOFe\\libkinetic\\Nodes\\PermissionNode::validate", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/ResolvableNode.html", "name": "SOFe\\libkinetic\\Nodes\\ResolvableNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ResolvableNode", "fromLink": "SOFe/libkinetic/Nodes/ResolvableNode.html", "link": "SOFe/libkinetic/Nodes/ResolvableNode.html#method_resolve", "name": "SOFe\\libkinetic\\Nodes\\ResolvableNode::resolve", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/SliderNode.html", "name": "SOFe\\libkinetic\\Nodes\\SliderNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\SliderNode", "fromLink": "SOFe/libkinetic/Nodes/SliderNode.html", "link": "SOFe/libkinetic/Nodes/SliderNode.html#method_setAttribute", "name": "SOFe\\libkinetic\\Nodes\\SliderNode::setAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\SliderNode", "fromLink": "SOFe/libkinetic/Nodes/SliderNode.html", "link": "SOFe/libkinetic/Nodes/SliderNode.html#method_endAttributes", "name": "SOFe\\libkinetic\\Nodes\\SliderNode::endAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\SliderNode", "fromLink": "SOFe/libkinetic/Nodes/SliderNode.html", "link": "SOFe/libkinetic/Nodes/SliderNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\SliderNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/StepSliderNode.html", "name": "SOFe\\libkinetic\\Nodes\\StepSliderNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\StepSliderNode", "fromLink": "SOFe/libkinetic/Nodes/StepSliderNode.html", "link": "SOFe/libkinetic/Nodes/StepSliderNode.html#method_getStepName", "name": "SOFe\\libkinetic\\Nodes\\StepSliderNode::getStepName", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/SynopsisNode.html", "name": "SOFe\\libkinetic\\Nodes\\SynopsisNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\SynopsisNode", "fromLink": "SOFe/libkinetic/Nodes/SynopsisNode.html", "link": "SOFe/libkinetic/Nodes/SynopsisNode.html#method_acceptText", "name": "SOFe\\libkinetic\\Nodes\\SynopsisNode::acceptText", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\SynopsisNode", "fromLink": "SOFe/libkinetic/Nodes/SynopsisNode.html", "link": "SOFe/libkinetic/Nodes/SynopsisNode.html#method_getText", "name": "SOFe\\libkinetic\\Nodes\\SynopsisNode::getText", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\SynopsisNode", "fromLink": "SOFe/libkinetic/Nodes/SynopsisNode.html", "link": "SOFe/libkinetic/Nodes/SynopsisNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\SynopsisNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/ToggleNode.html", "name": "SOFe\\libkinetic\\Nodes\\ToggleNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\ToggleNode", "fromLink": "SOFe/libkinetic/Nodes/ToggleNode.html", "link": "SOFe/libkinetic/Nodes/ToggleNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\ToggleNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/WindowNode.html", "name": "SOFe\\libkinetic\\Nodes\\WindowNode", "doc": "&quot;A window represents a form that can be displayed to the user.&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\WindowNode", "fromLink": "SOFe/libkinetic/Nodes/WindowNode.html", "link": "SOFe/libkinetic/Nodes/WindowNode.html#method_setAttribute", "name": "SOFe\\libkinetic\\Nodes\\WindowNode::setAttribute", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\WindowNode", "fromLink": "SOFe/libkinetic/Nodes/WindowNode.html", "link": "SOFe/libkinetic/Nodes/WindowNode.html#method_endAttributes", "name": "SOFe\\libkinetic\\Nodes\\WindowNode::endAttributes", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\WindowNode", "fromLink": "SOFe/libkinetic/Nodes/WindowNode.html", "link": "SOFe/libkinetic/Nodes/WindowNode.html#method_startChild", "name": "SOFe\\libkinetic\\Nodes\\WindowNode::startChild", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\WindowNode", "fromLink": "SOFe/libkinetic/Nodes/WindowNode.html", "link": "SOFe/libkinetic/Nodes/WindowNode.html#method_getId", "name": "SOFe\\libkinetic\\Nodes\\WindowNode::getId", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\WindowNode", "fromLink": "SOFe/libkinetic/Nodes/WindowNode.html", "link": "SOFe/libkinetic/Nodes/WindowNode.html#method_getName", "name": "SOFe\\libkinetic\\Nodes\\WindowNode::getName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\WindowNode", "fromLink": "SOFe/libkinetic/Nodes/WindowNode.html", "link": "SOFe/libkinetic/Nodes/WindowNode.html#method_getSynopsis", "name": "SOFe\\libkinetic\\Nodes\\WindowNode::getSynopsis", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\WindowNode", "fromLink": "SOFe/libkinetic/Nodes/WindowNode.html", "link": "SOFe/libkinetic/Nodes/WindowNode.html#method_getSynopsisString", "name": "SOFe\\libkinetic\\Nodes\\WindowNode::getSynopsisString", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\WindowNode", "fromLink": "SOFe/libkinetic/Nodes/WindowNode.html", "link": "SOFe/libkinetic/Nodes/WindowNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\WindowNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Trait", "fromName": "SOFe\\libkinetic\\Nodes", "fromLink": "SOFe/libkinetic/Nodes.html", "link": "SOFe/libkinetic/Nodes/WindowParentNode.html", "name": "SOFe\\libkinetic\\Nodes\\WindowParentNode", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\WindowParentNode", "fromLink": "SOFe/libkinetic/Nodes/WindowParentNode.html", "link": "SOFe/libkinetic/Nodes/WindowParentNode.html#method_startChild", "name": "SOFe\\libkinetic\\Nodes\\WindowParentNode::startChild", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\WindowParentNode", "fromLink": "SOFe/libkinetic/Nodes/WindowParentNode.html", "link": "SOFe/libkinetic/Nodes/WindowParentNode.html#method_resolve", "name": "SOFe\\libkinetic\\Nodes\\WindowParentNode::resolve", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Nodes\\WindowParentNode", "fromLink": "SOFe/libkinetic/Nodes/WindowParentNode.html", "link": "SOFe/libkinetic/Nodes/WindowParentNode.html#method_jsonSerialize", "name": "SOFe\\libkinetic\\Nodes\\WindowParentNode::jsonSerialize", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic", "fromLink": "SOFe/libkinetic.html", "link": "SOFe/libkinetic/ParseException.html", "name": "SOFe\\libkinetic\\ParseException", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Parser", "fromLink": "SOFe/libkinetic/Parser.html", "link": "SOFe/libkinetic/Parser/JsonFileParser.html", "name": "SOFe\\libkinetic\\Parser\\JsonFileParser", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Parser\\JsonFileParser", "fromLink": "SOFe/libkinetic/Parser/JsonFileParser.html", "link": "SOFe/libkinetic/Parser/JsonFileParser.html#method___construct", "name": "SOFe\\libkinetic\\Parser\\JsonFileParser::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Parser\\JsonFileParser", "fromLink": "SOFe/libkinetic/Parser/JsonFileParser.html", "link": "SOFe/libkinetic/Parser/JsonFileParser.html#method_parse", "name": "SOFe\\libkinetic\\Parser\\JsonFileParser::parse", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Parser\\JsonFileParser", "fromLink": "SOFe/libkinetic/Parser/JsonFileParser.html", "link": "SOFe/libkinetic/Parser/JsonFileParser.html#method_traverseNode", "name": "SOFe\\libkinetic\\Parser\\JsonFileParser::traverseNode", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Parser", "fromLink": "SOFe/libkinetic/Parser.html", "link": "SOFe/libkinetic/Parser/KineticFileParser.html", "name": "SOFe\\libkinetic\\Parser\\KineticFileParser", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Parser\\KineticFileParser", "fromLink": "SOFe/libkinetic/Parser/KineticFileParser.html", "link": "SOFe/libkinetic/Parser/KineticFileParser.html#method_getParsingInstance", "name": "SOFe\\libkinetic\\Parser\\KineticFileParser::getParsingInstance", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Parser\\KineticFileParser", "fromLink": "SOFe/libkinetic/Parser/KineticFileParser.html", "link": "SOFe/libkinetic/Parser/KineticFileParser.html#method___construct", "name": "SOFe\\libkinetic\\Parser\\KineticFileParser::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Parser\\KineticFileParser", "fromLink": "SOFe/libkinetic/Parser/KineticFileParser.html", "link": "SOFe/libkinetic/Parser/KineticFileParser.html#method_startElement", "name": "SOFe\\libkinetic\\Parser\\KineticFileParser::startElement", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Parser\\KineticFileParser", "fromLink": "SOFe/libkinetic/Parser/KineticFileParser.html", "link": "SOFe/libkinetic/Parser/KineticFileParser.html#method_endElement", "name": "SOFe\\libkinetic\\Parser\\KineticFileParser::endElement", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Parser\\KineticFileParser", "fromLink": "SOFe/libkinetic/Parser/KineticFileParser.html", "link": "SOFe/libkinetic/Parser/KineticFileParser.html#method_parseText", "name": "SOFe\\libkinetic\\Parser\\KineticFileParser::parseText", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Parser\\KineticFileParser", "fromLink": "SOFe/libkinetic/Parser/KineticFileParser.html", "link": "SOFe/libkinetic/Parser/KineticFileParser.html#method_getRoot", "name": "SOFe\\libkinetic\\Parser\\KineticFileParser::getRoot", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Parser\\KineticFileParser", "fromLink": "SOFe/libkinetic/Parser/KineticFileParser.html", "link": "SOFe/libkinetic/Parser/KineticFileParser.html#method_getNamespace", "name": "SOFe\\libkinetic\\Parser\\KineticFileParser::getNamespace", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Parser\\KineticFileParser", "fromLink": "SOFe/libkinetic/Parser/KineticFileParser.html", "link": "SOFe/libkinetic/Parser/KineticFileParser.html#method_parse", "name": "SOFe\\libkinetic\\Parser\\KineticFileParser::parse", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "SOFe\\libkinetic\\Parser", "fromLink": "SOFe/libkinetic/Parser.html", "link": "SOFe/libkinetic/Parser/XmlFileParser.html", "name": "SOFe\\libkinetic\\Parser\\XmlFileParser", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "SOFe\\libkinetic\\Parser\\XmlFileParser", "fromLink": "SOFe/libkinetic/Parser/XmlFileParser.html", "link": "SOFe/libkinetic/Parser/XmlFileParser.html#method___construct", "name": "SOFe\\libkinetic\\Parser\\XmlFileParser::__construct", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "SOFe\\libkinetic\\Parser\\XmlFileParser", "fromLink": "SOFe/libkinetic/Parser/XmlFileParser.html", "link": "SOFe/libkinetic/Parser/XmlFileParser.html#method_parse", "name": "SOFe\\libkinetic\\Parser\\XmlFileParser::parse", "doc": "&quot;&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


