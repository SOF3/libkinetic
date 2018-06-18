window.projectVersion = 'master';

(function(root){

	var bhIndex = null;
	var rootPath = '';
	var treeHtml = '        <ul>                <li data-name="namespace:SOFe" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe.html">SOFe</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:SOFe_Libkinetic" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic.html">Libkinetic</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:SOFe_Libkinetic_API" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/API.html">API</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_API_AsyncClickHandler" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/API/AsyncClickHandler.html">AsyncClickHandler</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_API_ClickHandler" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/API/ClickHandler.html">ClickHandler</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_API_ComplexItemFactory" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/API/ComplexItemFactory.html">ComplexItemFactory</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_API_ComplexProvider" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/API/ComplexProvider.html">ComplexProvider</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_API_DropdownOptionFactory" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/API/DropdownOptionFactory.html">DropdownOptionFactory</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_API_DropdownProvider" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/API/DropdownProvider.html">DropdownProvider</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_API_MenuItemFactory" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/API/MenuItemFactory.html">MenuItemFactory</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_API_MenuProvider" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/API/MenuProvider.html">MenuProvider</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_API_NamedPermissionUserPredicate" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/API/NamedPermissionUserPredicate.html">NamedPermissionUserPredicate</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_API_RequestValidator" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/API/RequestValidator.html">RequestValidator</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_API_UserPredicate" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/API/UserPredicate.html">UserPredicate</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_Libkinetic_Clickable" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Clickable.html">Clickable</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:SOFe_Libkinetic_Clickable_Argument" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Clickable/Argument.html">Argument</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_Clickable_Argument_ArgComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Argument/ArgComponent.html">ArgComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Argument_ArgInterface" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Argument/ArgInterface.html">ArgInterface</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Argument_ArgTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Argument/ArgTrait.html">ArgTrait</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Argument_ArguableComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Argument/ArguableComponent.html">ArguableComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Argument_CycleArgComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html">CycleArgComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Argument_SimpleArgComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Argument/SimpleArgComponent.html">SimpleArgComponent</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_Libkinetic_Clickable_Cont" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Clickable/Cont.html">Cont</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_Clickable_Cont_ContCommand" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Cont/ContCommand.html">ContCommand</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Cont_ContCommandComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html">ContCommandComponent</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_Libkinetic_Clickable_Container" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Clickable/Container.html">Container</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_Clickable_Container_ClickableContainerTrait" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html">ClickableContainerTrait</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Container_ClickableParentComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Container/ClickableParentComponent.html">ClickableParentComponent</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_Libkinetic_Clickable_Entry" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Clickable/Entry.html">Entry</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:SOFe_Libkinetic_Clickable_Entry_Command" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Clickable/Entry/Command.html">Command</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_Clickable_Entry_Command_CommandAliasComponent" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Entry/Command/CommandAliasComponent.html">CommandAliasComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Entry_Command_CommandEntryComponent" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html">CommandEntryComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Entry_Command_KineticCommand" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Entry/Command/KineticCommand.html">KineticCommand</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_Libkinetic_Clickable_Entry_Interact" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Clickable/Entry/Interact.html">Interact</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_Clickable_Entry_Interact_BlockFilterComponent" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Entry/Interact/BlockFilterComponent.html">BlockFilterComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Entry_Interact_FaceFilterInterfaceComponent" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Entry/Interact/FaceFilterInterfaceComponent.html">FaceFilterInterfaceComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Entry_Interact_InteractEntryComponent" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Entry/Interact/InteractEntryComponent.html">InteractEntryComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Entry_Interact_InteractFilterInterface" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Entry/Interact/InteractFilterInterface.html">InteractFilterInterface</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Entry_Interact_ItemFilterComponent" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Entry/Interact/ItemFilterComponent.html">ItemFilterComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Entry_Interact_TouchModeFilterInterfaceComponent" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Entry/Interact/TouchModeFilterInterfaceComponent.html">TouchModeFilterInterfaceComponent</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Entry_DirectEntryClickableComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Entry/DirectEntryClickableComponent.html">DirectEntryClickableComponent</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_Libkinetic_Clickable_Permission" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Clickable/Permission.html">Permission</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_Clickable_Permission_PermissionClickableComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html">PermissionClickableComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Permission_PermissionComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Permission/PermissionComponent.html">PermissionComponent</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_Libkinetic_Clickable_Types" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Clickable/Types.html">Types</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_Clickable_Types_ExitComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Types/ExitComponent.html">ExitComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Types_IndexComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Types/IndexComponent.html">IndexComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Types_InfoComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Types/InfoComponent.html">InfoComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Types_IntermediateLinkInterface" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Types/IntermediateLinkInterface.html">IntermediateLinkInterface</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Types_LinkComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Types/LinkComponent.html">LinkComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_Types_ListComponent" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/Types/ListComponent.html">ListComponent</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_ClickableComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/ClickableComponent.html">ClickableComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_ClickableInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/ClickableInterface.html">ClickableInterface</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_ClickablePeerInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/ClickablePeerInterface.html">ClickablePeerInterface</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Clickable_ClickableTrait" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Clickable/ClickableTrait.html">ClickableTrait</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_Libkinetic_Defaults" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Defaults.html">Defaults</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_Defaults_AllPlayersDropdownProvider" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Defaults/AllPlayersDropdownProvider.html">AllPlayersDropdownProvider</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Defaults_AllPlayersMenuProvider" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Defaults/AllPlayersMenuProvider.html">AllPlayersMenuProvider</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Defaults_IsPlayerPredicate" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Defaults/IsPlayerPredicate.html">IsPlayerPredicate</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_Libkinetic_Element" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Element.html">Element</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_Element_DropdownComponentDynamicLike" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html">DropdownComponentDynamicLike</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_DropdownComponentStaticLike" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/DropdownComponentStaticLike.html">DropdownComponentStaticLike</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_DropdownOptionComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/DropdownOptionComponent.html">DropdownOptionComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_DynamicDropdownComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/DynamicDropdownComponent.html">DynamicDropdownComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_DynamicStepSliderComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/DynamicStepSliderComponent.html">DynamicStepSliderComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_EditableElementInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/EditableElementInterface.html">EditableElementInterface</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_ElementComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/ElementComponent.html">ElementComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_ElementInterface" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/ElementInterface.html">ElementInterface</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_ElementParentComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/ElementParentComponent.html">ElementParentComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_ElementParentWithRequiredFallbackComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/ElementParentWithRequiredFallbackComponent.html">ElementParentWithRequiredFallbackComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_InputComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/InputComponent.html">InputComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_LabelComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/LabelComponent.html">LabelComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_RequiredComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/RequiredComponent.html">RequiredComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_RequiredWithFallbackComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/RequiredWithFallbackComponent.html">RequiredWithFallbackComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_SliderComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/SliderComponent.html">SliderComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_StaticDropdownComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/StaticDropdownComponent.html">StaticDropdownComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_StaticStepSliderComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/StaticStepSliderComponent.html">StaticStepSliderComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Element_ToggleComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Element/ToggleComponent.html">ToggleComponent</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_Libkinetic_Form" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Form.html">Form</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_Form_Form" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Form/Form.html">Form</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Form_FormHandler" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Form/FormHandler.html">FormHandler</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Form_FormListener" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Form/FormListener.html">FormListener</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Form_Icon" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Form/Icon.html">Icon</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Form_ResendFormException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Form/ResendFormException.html">ResendFormException</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Form_SimpleIcon" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Form/SimpleIcon.html">SimpleIcon</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_Libkinetic_Parser" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Parser.html">Parser</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_Parser_JsonFileParser" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Parser/JsonFileParser.html">JsonFileParser</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Parser_KineticFileParser" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Parser/KineticFileParser.html">KineticFileParser</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Parser_XmlFileParser" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Parser/XmlFileParser.html">XmlFileParser</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_Libkinetic_Root" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Root.html">Root</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_Root_RootComponent" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Root/RootComponent.html">RootComponent</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:SOFe_Libkinetic_Util" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="SOFe/Libkinetic/Util.html">Util</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:SOFe_Libkinetic_Util_Await" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Util/Await.html">Await</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Util_BinaryArrayWrapper" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Util/BinaryArrayWrapper.html">BinaryArrayWrapper</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Util_CallSequence" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Util/CallSequence.html">CallSequence</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_Util_CallbackTask" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="SOFe/Libkinetic/Util/CallbackTask.html">CallbackTask</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:SOFe_Libkinetic_AbsoluteIdComponent" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/Libkinetic/AbsoluteIdComponent.html">AbsoluteIdComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_ClickInterruptedException" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/Libkinetic/ClickInterruptedException.html">ClickInterruptedException</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_ComponentAdapter" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/Libkinetic/ComponentAdapter.html">ComponentAdapter</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_InvalidFormResponseException" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/Libkinetic/InvalidFormResponseException.html">InvalidFormResponseException</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_InvalidNodeException" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/Libkinetic/InvalidNodeException.html">InvalidNodeException</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_KineticAdapter" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/Libkinetic/KineticAdapter.html">KineticAdapter</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_KineticAdapterBase" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/Libkinetic/KineticAdapterBase.html">KineticAdapterBase</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_KineticComponent" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/Libkinetic/KineticComponent.html">KineticComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_KineticManager" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/Libkinetic/KineticManager.html">KineticManager</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_KineticNode" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/Libkinetic/KineticNode.html">KineticNode</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_ParseException" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/Libkinetic/ParseException.html">ParseException</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_WindowComponent" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/Libkinetic/WindowComponent.html">WindowComponent</a>                    </div>                </li>                            <li data-name="class:SOFe_Libkinetic_libkinetic" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="SOFe/Libkinetic/libkinetic.html">libkinetic</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

	var searchTypeClasses = {
		'Namespace': 'label-default',
		'Class': 'label-info',
		'Interface': 'label-primary',
		'Trait': 'label-success',
		'Method': 'label-danger',
		'_': 'label-warning'
	};

	var searchIndex = [

		{"type": "Namespace", "link": "SOFe.html", "name": "SOFe", "doc": "Namespace SOFe"}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic.html",
			"name": "SOFe\\Libkinetic",
			"doc": "Namespace SOFe\\Libkinetic"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/API.html",
			"name": "SOFe\\Libkinetic\\API",
			"doc": "Namespace SOFe\\Libkinetic\\API"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Clickable.html",
			"name": "SOFe\\Libkinetic\\Clickable",
			"doc": "Namespace SOFe\\Libkinetic\\Clickable"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Clickable/Argument.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument",
			"doc": "Namespace SOFe\\Libkinetic\\Clickable\\Argument"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Clickable/Cont.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont",
			"doc": "Namespace SOFe\\Libkinetic\\Clickable\\Cont"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Clickable/Container.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Container",
			"doc": "Namespace SOFe\\Libkinetic\\Clickable\\Container"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Clickable/Entry.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry",
			"doc": "Namespace SOFe\\Libkinetic\\Clickable\\Entry"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command",
			"doc": "Namespace SOFe\\Libkinetic\\Clickable\\Entry\\Command"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact",
			"doc": "Namespace SOFe\\Libkinetic\\Clickable\\Entry\\Interact"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Clickable/Permission.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission",
			"doc": "Namespace SOFe\\Libkinetic\\Clickable\\Permission"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Clickable/Types.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Types",
			"doc": "Namespace SOFe\\Libkinetic\\Clickable\\Types"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Defaults.html",
			"name": "SOFe\\Libkinetic\\Defaults",
			"doc": "Namespace SOFe\\Libkinetic\\Defaults"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Element.html",
			"name": "SOFe\\Libkinetic\\Element",
			"doc": "Namespace SOFe\\Libkinetic\\Element"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Form.html",
			"name": "SOFe\\Libkinetic\\Form",
			"doc": "Namespace SOFe\\Libkinetic\\Form"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Parser.html",
			"name": "SOFe\\Libkinetic\\Parser",
			"doc": "Namespace SOFe\\Libkinetic\\Parser"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Root.html",
			"name": "SOFe\\Libkinetic\\Root",
			"doc": "Namespace SOFe\\Libkinetic\\Root"
		}, {
			"type": "Namespace",
			"link": "SOFe/Libkinetic/Util.html",
			"name": "SOFe\\Libkinetic\\Util",
			"doc": "Namespace SOFe\\Libkinetic\\Util"
		},
		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/AsyncClickHandler.html",
			"name": "SOFe\\Libkinetic\\API\\AsyncClickHandler",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\AsyncClickHandler",
			"fromLink": "SOFe/Libkinetic/API/AsyncClickHandler.html",
			"link": "SOFe/Libkinetic/API/AsyncClickHandler.html#method_onClick",
			"name": "SOFe\\Libkinetic\\API\\AsyncClickHandler::onClick",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/ClickHandler.html",
			"name": "SOFe\\Libkinetic\\API\\ClickHandler",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\ClickHandler",
			"fromLink": "SOFe/Libkinetic/API/ClickHandler.html",
			"link": "SOFe/Libkinetic/API/ClickHandler.html#method_onClick",
			"name": "SOFe\\Libkinetic\\API\\ClickHandler::onClick",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/ComplexProvider.html",
			"name": "SOFe\\Libkinetic\\API\\ComplexProvider",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\ComplexProvider",
			"fromLink": "SOFe/Libkinetic/API/ComplexProvider.html",
			"link": "SOFe/Libkinetic/API/ComplexProvider.html#method_provide",
			"name": "SOFe\\Libkinetic\\API\\ComplexProvider::provide",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/DropdownProvider.html",
			"name": "SOFe\\Libkinetic\\API\\DropdownProvider",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\DropdownProvider",
			"fromLink": "SOFe/Libkinetic/API/DropdownProvider.html",
			"link": "SOFe/Libkinetic/API/DropdownProvider.html#method_provide",
			"name": "SOFe\\Libkinetic\\API\\DropdownProvider::provide",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/MenuProvider.html",
			"name": "SOFe\\Libkinetic\\API\\MenuProvider",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\MenuProvider",
			"fromLink": "SOFe/Libkinetic/API/MenuProvider.html",
			"link": "SOFe/Libkinetic/API/MenuProvider.html#method_provide",
			"name": "SOFe\\Libkinetic\\API\\MenuProvider::provide",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/RequestValidator.html",
			"name": "SOFe\\Libkinetic\\API\\RequestValidator",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\RequestValidator",
			"fromLink": "SOFe/Libkinetic/API/RequestValidator.html",
			"link": "SOFe/Libkinetic/API/RequestValidator.html#method_validate",
			"name": "SOFe\\Libkinetic\\API\\RequestValidator::validate",
			"doc": "&quot;The generator function should return a boolean (valid or not) or an array &lt;code&gt;[valid bool, error string]&lt;\/code&gt;.&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/UserPredicate.html",
			"name": "SOFe\\Libkinetic\\API\\UserPredicate",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\UserPredicate",
			"fromLink": "SOFe/Libkinetic/API/UserPredicate.html",
			"link": "SOFe/Libkinetic/API/UserPredicate.html#method_test",
			"name": "SOFe\\Libkinetic\\API\\UserPredicate::test",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgInterface.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgInterface",
			"doc": "&quot;ArgInterface is implemented by various types of args.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgInterface.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgInterface.html#method_configure",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgInterface::configure",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgInterface.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgInterface.html#method_getNode",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgInterface::getNode",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\Clickable",
			"fromLink": "SOFe/Libkinetic/Clickable.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableInterface.html",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableInterface",
			"doc": "&quot;A Clickable represents an action that can be executed. They are all valid as children in a master menu (&lt;code&gt;&amp;lt;index&amp;gt;&lt;\/code&gt;), except &lt;code&gt;&amp;lt;editArg&amp;gt;&lt;\/code&gt;, which is only applicable in an arguable window clickable (both ArguableClickableComponent and WindowComponent are depended).&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableInterface.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableInterface.html#method_onClick",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableInterface::onClick",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\Clickable",
			"fromLink": "SOFe/Libkinetic/Clickable.html",
			"link": "SOFe/Libkinetic/Clickable/ClickablePeerInterface.html",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickablePeerInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickablePeerInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickablePeerInterface.html",
			"link": "SOFe/Libkinetic/Clickable/ClickablePeerInterface.html#method_onClick",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickablePeerInterface::onClick",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickablePeerInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickablePeerInterface.html",
			"link": "SOFe/Libkinetic/Clickable/ClickablePeerInterface.html#method_getPriority",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickablePeerInterface::getPriority",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/InteractFilterInterface.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\InteractFilterInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\InteractFilterInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/InteractFilterInterface.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/InteractFilterInterface.html#method_test",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\InteractFilterInterface::test",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types",
			"fromLink": "SOFe/Libkinetic/Clickable/Types.html",
			"link": "SOFe/Libkinetic/Clickable/Types/IntermediateLinkInterface.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\IntermediateLinkInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\IntermediateLinkInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/IntermediateLinkInterface.html",
			"link": "SOFe/Libkinetic/Clickable/Types/IntermediateLinkInterface.html#method_getLinkName",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\IntermediateLinkInterface::getLinkName",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/EditableElementInterface.html",
			"name": "SOFe\\Libkinetic\\Element\\EditableElementInterface",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/ElementInterface.html",
			"name": "SOFe\\Libkinetic\\Element\\ElementInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementInterface",
			"fromLink": "SOFe/Libkinetic/Element/ElementInterface.html",
			"link": "SOFe/Libkinetic/Element/ElementInterface.html#method_getNode",
			"name": "SOFe\\Libkinetic\\Element\\ElementInterface::getNode",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementInterface",
			"fromLink": "SOFe/Libkinetic/Element/ElementInterface.html",
			"link": "SOFe/Libkinetic/Element/ElementInterface.html#method_asFormComponent",
			"name": "SOFe\\Libkinetic\\Element\\ElementInterface::asFormComponent",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic\\Form",
			"fromLink": "SOFe/Libkinetic/Form.html",
			"link": "SOFe/Libkinetic/Form/Icon.html",
			"name": "SOFe\\Libkinetic\\Form\\Icon",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\Icon",
			"fromLink": "SOFe/Libkinetic/Form/Icon.html",
			"link": "SOFe/Libkinetic/Form/Icon.html#method_getType",
			"name": "SOFe\\Libkinetic\\Form\\Icon::getType",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\Icon",
			"fromLink": "SOFe/Libkinetic/Form/Icon.html",
			"link": "SOFe/Libkinetic/Form/Icon.html#method_getValue",
			"name": "SOFe\\Libkinetic\\Form\\Icon::getValue",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Interface",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/KineticAdapter.html",
			"name": "SOFe\\Libkinetic\\KineticAdapter",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticAdapter",
			"fromLink": "SOFe/Libkinetic/KineticAdapter.html",
			"link": "SOFe/Libkinetic/KineticAdapter.html#method_hasMessage",
			"name": "SOFe\\Libkinetic\\KineticAdapter::hasMessage",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticAdapter",
			"fromLink": "SOFe/Libkinetic/KineticAdapter.html",
			"link": "SOFe/Libkinetic/KineticAdapter.html#method_getMessage",
			"name": "SOFe\\Libkinetic\\KineticAdapter::getMessage",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticAdapter",
			"fromLink": "SOFe/Libkinetic/KineticAdapter.html",
			"link": "SOFe/Libkinetic/KineticAdapter.html#method_getInstantiable",
			"name": "SOFe\\Libkinetic\\KineticAdapter::getInstantiable",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticAdapter",
			"fromLink": "SOFe/Libkinetic/KineticAdapter.html",
			"link": "SOFe/Libkinetic/KineticAdapter.html#method_getKineticConfig",
			"name": "SOFe\\Libkinetic\\KineticAdapter::getKineticConfig",
			"doc": "&quot;&quot;"
		},


		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/AsyncClickHandler.html",
			"name": "SOFe\\Libkinetic\\API\\AsyncClickHandler",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\AsyncClickHandler",
			"fromLink": "SOFe/Libkinetic/API/AsyncClickHandler.html",
			"link": "SOFe/Libkinetic/API/AsyncClickHandler.html#method_onClick",
			"name": "SOFe\\Libkinetic\\API\\AsyncClickHandler::onClick",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/ClickHandler.html",
			"name": "SOFe\\Libkinetic\\API\\ClickHandler",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\ClickHandler",
			"fromLink": "SOFe/Libkinetic/API/ClickHandler.html",
			"link": "SOFe/Libkinetic/API/ClickHandler.html#method_onClick",
			"name": "SOFe\\Libkinetic\\API\\ClickHandler::onClick",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/ComplexItemFactory.html",
			"name": "SOFe\\Libkinetic\\API\\ComplexItemFactory",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\ComplexItemFactory",
			"fromLink": "SOFe/Libkinetic/API/ComplexItemFactory.html",
			"link": "SOFe/Libkinetic/API/ComplexItemFactory.html#method_addItem",
			"name": "SOFe\\Libkinetic\\API\\ComplexItemFactory::addItem",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\ComplexItemFactory",
			"fromLink": "SOFe/Libkinetic/API/ComplexItemFactory.html",
			"link": "SOFe/Libkinetic/API/ComplexItemFactory.html#method_getItems",
			"name": "SOFe\\Libkinetic\\API\\ComplexItemFactory::getItems",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/ComplexProvider.html",
			"name": "SOFe\\Libkinetic\\API\\ComplexProvider",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\ComplexProvider",
			"fromLink": "SOFe/Libkinetic/API/ComplexProvider.html",
			"link": "SOFe/Libkinetic/API/ComplexProvider.html#method_provide",
			"name": "SOFe\\Libkinetic\\API\\ComplexProvider::provide",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/DropdownOptionFactory.html",
			"name": "SOFe\\Libkinetic\\API\\DropdownOptionFactory",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\DropdownOptionFactory",
			"fromLink": "SOFe/Libkinetic/API/DropdownOptionFactory.html",
			"link": "SOFe/Libkinetic/API/DropdownOptionFactory.html#method_addItem",
			"name": "SOFe\\Libkinetic\\API\\DropdownOptionFactory::addItem",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\DropdownOptionFactory",
			"fromLink": "SOFe/Libkinetic/API/DropdownOptionFactory.html",
			"link": "SOFe/Libkinetic/API/DropdownOptionFactory.html#method_setDefault",
			"name": "SOFe\\Libkinetic\\API\\DropdownOptionFactory::setDefault",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\DropdownOptionFactory",
			"fromLink": "SOFe/Libkinetic/API/DropdownOptionFactory.html",
			"link": "SOFe/Libkinetic/API/DropdownOptionFactory.html#method_getValue",
			"name": "SOFe\\Libkinetic\\API\\DropdownOptionFactory::getValue",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\DropdownOptionFactory",
			"fromLink": "SOFe/Libkinetic/API/DropdownOptionFactory.html",
			"link": "SOFe/Libkinetic/API/DropdownOptionFactory.html#method_getDefault",
			"name": "SOFe\\Libkinetic\\API\\DropdownOptionFactory::getDefault",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\DropdownOptionFactory",
			"fromLink": "SOFe/Libkinetic/API/DropdownOptionFactory.html",
			"link": "SOFe/Libkinetic/API/DropdownOptionFactory.html#method_getDefaultId",
			"name": "SOFe\\Libkinetic\\API\\DropdownOptionFactory::getDefaultId",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\DropdownOptionFactory",
			"fromLink": "SOFe/Libkinetic/API/DropdownOptionFactory.html",
			"link": "SOFe/Libkinetic/API/DropdownOptionFactory.html#method_getValues",
			"name": "SOFe\\Libkinetic\\API\\DropdownOptionFactory::getValues",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/DropdownProvider.html",
			"name": "SOFe\\Libkinetic\\API\\DropdownProvider",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\DropdownProvider",
			"fromLink": "SOFe/Libkinetic/API/DropdownProvider.html",
			"link": "SOFe/Libkinetic/API/DropdownProvider.html#method_provide",
			"name": "SOFe\\Libkinetic\\API\\DropdownProvider::provide",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/MenuItemFactory.html",
			"name": "SOFe\\Libkinetic\\API\\MenuItemFactory",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\MenuItemFactory",
			"fromLink": "SOFe/Libkinetic/API/MenuItemFactory.html",
			"link": "SOFe/Libkinetic/API/MenuItemFactory.html#method_addItem",
			"name": "SOFe\\Libkinetic\\API\\MenuItemFactory::addItem",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\MenuItemFactory",
			"fromLink": "SOFe/Libkinetic/API/MenuItemFactory.html",
			"link": "SOFe/Libkinetic/API/MenuItemFactory.html#method_getValues",
			"name": "SOFe\\Libkinetic\\API\\MenuItemFactory::getValues",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/MenuProvider.html",
			"name": "SOFe\\Libkinetic\\API\\MenuProvider",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\MenuProvider",
			"fromLink": "SOFe/Libkinetic/API/MenuProvider.html",
			"link": "SOFe/Libkinetic/API/MenuProvider.html#method_provide",
			"name": "SOFe\\Libkinetic\\API\\MenuProvider::provide",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/NamedPermissionUserPredicate.html",
			"name": "SOFe\\Libkinetic\\API\\NamedPermissionUserPredicate",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\NamedPermissionUserPredicate",
			"fromLink": "SOFe/Libkinetic/API/NamedPermissionUserPredicate.html",
			"link": "SOFe/Libkinetic/API/NamedPermissionUserPredicate.html#method___construct",
			"name": "SOFe\\Libkinetic\\API\\NamedPermissionUserPredicate::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\NamedPermissionUserPredicate",
			"fromLink": "SOFe/Libkinetic/API/NamedPermissionUserPredicate.html",
			"link": "SOFe/Libkinetic/API/NamedPermissionUserPredicate.html#method_test",
			"name": "SOFe\\Libkinetic\\API\\NamedPermissionUserPredicate::test",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/RequestValidator.html",
			"name": "SOFe\\Libkinetic\\API\\RequestValidator",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\RequestValidator",
			"fromLink": "SOFe/Libkinetic/API/RequestValidator.html",
			"link": "SOFe/Libkinetic/API/RequestValidator.html#method_validate",
			"name": "SOFe\\Libkinetic\\API\\RequestValidator::validate",
			"doc": "&quot;The generator function should return a boolean (valid or not) or an array &lt;code&gt;[valid bool, error string]&lt;\/code&gt;.&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\API",
			"fromLink": "SOFe/Libkinetic/API.html",
			"link": "SOFe/Libkinetic/API/UserPredicate.html",
			"name": "SOFe\\Libkinetic\\API\\UserPredicate",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\API\\UserPredicate",
			"fromLink": "SOFe/Libkinetic/API/UserPredicate.html",
			"link": "SOFe/Libkinetic/API/UserPredicate.html#method_test",
			"name": "SOFe\\Libkinetic\\API\\UserPredicate::test",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/AbsoluteIdComponent.html",
			"name": "SOFe\\Libkinetic\\AbsoluteIdComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\AbsoluteIdComponent",
			"fromLink": "SOFe/Libkinetic/AbsoluteIdComponent.html",
			"link": "SOFe/Libkinetic/AbsoluteIdComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\AbsoluteIdComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\AbsoluteIdComponent",
			"fromLink": "SOFe/Libkinetic/AbsoluteIdComponent.html",
			"link": "SOFe/Libkinetic/AbsoluteIdComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\AbsoluteIdComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\AbsoluteIdComponent",
			"fromLink": "SOFe/Libkinetic/AbsoluteIdComponent.html",
			"link": "SOFe/Libkinetic/AbsoluteIdComponent.html#method_getId",
			"name": "SOFe\\Libkinetic\\AbsoluteIdComponent::getId",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\AbsoluteIdComponent",
			"fromLink": "SOFe/Libkinetic/AbsoluteIdComponent.html",
			"link": "SOFe/Libkinetic/AbsoluteIdComponent.html#method_getIdPart",
			"name": "SOFe\\Libkinetic\\AbsoluteIdComponent::getIdPart",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/ClickInterruptedException.html",
			"name": "SOFe\\Libkinetic\\ClickInterruptedException",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ClickInterruptedException",
			"fromLink": "SOFe/Libkinetic/ClickInterruptedException.html",
			"link": "SOFe/Libkinetic/ClickInterruptedException.html#method___construct",
			"name": "SOFe\\Libkinetic\\ClickInterruptedException::__construct",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgComponent.html#method_getId",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgComponent::getId",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgComponent.html#method_isRequired",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgComponent::isRequired",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgComponent.html#method_getValidator",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgComponent::getValidator",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgComponent.html#method_getNext",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgComponent::getNext",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgInterface.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgInterface",
			"doc": "&quot;ArgInterface is implemented by various types of args.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgInterface.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgInterface.html#method_configure",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgInterface::configure",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgInterface.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgInterface.html#method_getNode",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgInterface::getNode",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Trait",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html#method_configure",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait::configure",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html#method_sendInterface",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait::sendInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html#method_sendFormInterface",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait::sendFormInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html#method_sendCommandInterface",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait::sendCommandInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html#method_afterResponse",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait::afterResponse",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html#method_isRequestSufficient",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait::isRequestSufficient",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html#method_getNode",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait::getNode",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html#method_getManager",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait::getManager",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArgTrait.html#method_asArgComponent",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArgTrait::asArgComponent",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArguableComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArguableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArguableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArguableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArguableComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArguableComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArguableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArguableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArguableComponent.html#method_startChild",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArguableComponent::startChild",
			"doc": "&quot;Resolve a child element into a node with components. Returns null if this node name is not recognized by this component.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArguableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArguableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArguableComponent.html#method_onClick",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArguableComponent::onClick",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArguableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArguableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArguableComponent.html#method_getArguments",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArguableComponent::getArguments",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\ArguableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/ArguableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/ArguableComponent.html#method_getPriority",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\ArguableComponent::getPriority",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html#method_isRequestSufficient",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent::isRequestSufficient",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html#method_sendFormInterface",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent::sendFormInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/CycleArgComponent.html#method_sendCommandInterface",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\CycleArgComponent::sendCommandInterface",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/SimpleArgComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\SimpleArgComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\SimpleArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/SimpleArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/SimpleArgComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\SimpleArgComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\SimpleArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/SimpleArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/SimpleArgComponent.html#method_sendFormInterface",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\SimpleArgComponent::sendFormInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\SimpleArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/SimpleArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/SimpleArgComponent.html#method_sendCommandInterface",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\SimpleArgComponent::sendCommandInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Argument\\SimpleArgComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Argument/SimpleArgComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Argument/SimpleArgComponent.html#method_isRequestSufficient",
			"name": "SOFe\\Libkinetic\\Clickable\\Argument\\SimpleArgComponent::isRequestSufficient",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable",
			"fromLink": "SOFe/Libkinetic/Clickable.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableComponent.html#method_getIndexName",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableComponent::getIndexName",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableComponent.html#method_getArgName",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableComponent::getArgName",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableComponent.html#method_getOnClick",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableComponent::getOnClick",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableComponent.html#method_getOnClickAsync",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableComponent::getOnClickAsync",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableComponent.html#method_onClick",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableComponent::onClick",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableComponent.html#method_getPriority",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableComponent::getPriority",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable",
			"fromLink": "SOFe/Libkinetic/Clickable.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableInterface.html",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableInterface",
			"doc": "&quot;A Clickable represents an action that can be executed. They are all valid as children in a master menu (&lt;code&gt;&amp;lt;index&amp;gt;&lt;\/code&gt;), except &lt;code&gt;&amp;lt;editArg&amp;gt;&lt;\/code&gt;, which is only applicable in an arguable window clickable (both ArguableClickableComponent and WindowComponent are depended).&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableInterface.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableInterface.html#method_onClick",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableInterface::onClick",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable",
			"fromLink": "SOFe/Libkinetic/Clickable.html",
			"link": "SOFe/Libkinetic/Clickable/ClickablePeerInterface.html",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickablePeerInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickablePeerInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickablePeerInterface.html",
			"link": "SOFe/Libkinetic/Clickable/ClickablePeerInterface.html#method_onClick",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickablePeerInterface::onClick",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickablePeerInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickablePeerInterface.html",
			"link": "SOFe/Libkinetic/Clickable/ClickablePeerInterface.html#method_getPriority",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickablePeerInterface::getPriority",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Trait",
			"fromName": "SOFe\\Libkinetic\\Clickable",
			"fromLink": "SOFe/Libkinetic/Clickable.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableTrait.html",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableTrait",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableTrait.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableTrait.html#method_onClick",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableTrait::onClick",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableTrait.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableTrait.html#method_getNode",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableTrait::getNode",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\ClickableTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/ClickableTrait.html",
			"link": "SOFe/Libkinetic/Clickable/ClickableTrait.html#method_onClickImpl",
			"name": "SOFe\\Libkinetic\\Clickable\\ClickableTrait::onClickImpl",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Cont",
			"fromLink": "SOFe/Libkinetic/Clickable/Cont.html",
			"link": "SOFe/Libkinetic/Clickable/Cont/ContCommand.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommand",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommand",
			"fromLink": "SOFe/Libkinetic/Clickable/Cont/ContCommand.html",
			"link": "SOFe/Libkinetic/Clickable/Cont/ContCommand.html#method___construct",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommand::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommand",
			"fromLink": "SOFe/Libkinetic/Clickable/Cont/ContCommand.html",
			"link": "SOFe/Libkinetic/Clickable/Cont/ContCommand.html#method_execute",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommand::execute",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommand",
			"fromLink": "SOFe/Libkinetic/Clickable/Cont/ContCommand.html",
			"link": "SOFe/Libkinetic/Clickable/Cont/ContCommand.html#method_getPlugin",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommand::getPlugin",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Cont",
			"fromLink": "SOFe/Libkinetic/Clickable/Cont.html",
			"link": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html#method_startChild",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent::startChild",
			"doc": "&quot;Resolve a child element into a node with components. Returns null if this node name is not recognized by this component.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html#method_init",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent::init",
			"doc": "&quot;Register handlers with the PocketMine interface in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html#method_getName",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent::getName",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html#method_getDescription",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent::getDescription",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Cont/ContCommandComponent.html#method_getAliases",
			"name": "SOFe\\Libkinetic\\Clickable\\Cont\\ContCommandComponent::getAliases",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Trait",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container",
			"fromLink": "SOFe/Libkinetic/Clickable/Container.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html#method_onClickImpl",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait::onClickImpl",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html#method_onClickForm",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait::onClickForm",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html#method_onClickCommandHeader",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait::onClickCommandHeader",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html#method_onClickCommandFooter",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait::onClickCommandFooter",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html#method_handleBeforeSubCommand",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait::handleBeforeSubCommand",
			"doc": "&quot;Consume args that shall be consumed before the subcommand arg, e.g. take arguments for config.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html#method_getArgsBeforeSubCommand",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait::getArgsBeforeSubCommand",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html#method_getSubCommands",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait::getSubCommands",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html#method_handleSubCommand",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait::handleSubCommand",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html#method_getNode",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait::getNode",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait",
			"fromLink": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableContainerTrait.html#method_getManager",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableContainerTrait::getManager",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container",
			"fromLink": "SOFe/Libkinetic/Clickable/Container.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableParentComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableParentComponent",
			"doc": "&quot;Accepts &lt;code&gt;&amp;lt;index&amp;gt;&lt;\/code&gt;, &lt;code&gt;&amp;lt;list&amp;gt;&lt;\/code&gt;, &lt;code&gt;&amp;lt;info&amp;gt;&lt;\/code&gt;, &lt;code&gt;&amp;lt;exit&amp;gt;&lt;\/code&gt;, &lt;code&gt;&amp;lt;link&amp;gt;&lt;\/code&gt;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableParentComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Container/ClickableParentComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableParentComponent.html#method_startChild",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableParentComponent::startChild",
			"doc": "&quot;Resolve a child element into a node with components. Returns null if this node name is not recognized by this component.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableParentComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Container/ClickableParentComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableParentComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableParentComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableParentComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Container/ClickableParentComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Container/ClickableParentComponent.html#method_getClickableList",
			"name": "SOFe\\Libkinetic\\Clickable\\Container\\ClickableParentComponent::getClickableList",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/CommandAliasComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandAliasComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandAliasComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/CommandAliasComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/CommandAliasComponent.html#method_acceptText",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandAliasComponent::acceptText",
			"doc": "&quot;Handles the cdata in the element. Returns true if this component consumes the cdata.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandAliasComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/CommandAliasComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/CommandAliasComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandAliasComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandAliasComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/CommandAliasComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/CommandAliasComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandAliasComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandAliasComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/CommandAliasComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/CommandAliasComponent.html#method_getValue",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandAliasComponent::getValue",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html#method_startChild",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent::startChild",
			"doc": "&quot;Resolve a child element into a node with components. Returns null if this node name is not recognized by this component.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html#method_getName",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent::getName",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html#method_getDescription",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent::getDescription",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/CommandEntryComponent.html#method_getAliases",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\CommandEntryComponent::getAliases",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/KineticCommand.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\KineticCommand",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\KineticCommand",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/KineticCommand.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/KineticCommand.html#method___construct",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\KineticCommand::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\KineticCommand",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/KineticCommand.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/KineticCommand.html#method_execute",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\KineticCommand::execute",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\KineticCommand",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Command/KineticCommand.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Command/KineticCommand.html#method_getPlugin",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Command\\KineticCommand::getPlugin",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/DirectEntryClickableComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\DirectEntryClickableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\DirectEntryClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/DirectEntryClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/DirectEntryClickableComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\DirectEntryClickableComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\DirectEntryClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/DirectEntryClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/DirectEntryClickableComponent.html#method_startChild",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\DirectEntryClickableComponent::startChild",
			"doc": "&quot;Resolve a child element into a node with components. Returns null if this node name is not recognized by this component.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\DirectEntryClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/DirectEntryClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/DirectEntryClickableComponent.html#method_getCommands",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\DirectEntryClickableComponent::getCommands",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\DirectEntryClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/DirectEntryClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/DirectEntryClickableComponent.html#method_getInteracts",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\DirectEntryClickableComponent::getInteracts",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/BlockFilterComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\BlockFilterComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\BlockFilterComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/BlockFilterComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/BlockFilterComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\BlockFilterComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\BlockFilterComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/BlockFilterComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/BlockFilterComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\BlockFilterComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\BlockFilterComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/BlockFilterComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/BlockFilterComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\BlockFilterComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\BlockFilterComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/BlockFilterComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/BlockFilterComponent.html#method_setIsFromConfig",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\BlockFilterComponent::setIsFromConfig",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/FaceFilterInterfaceComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\FaceFilterInterfaceComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\FaceFilterInterfaceComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/FaceFilterInterfaceComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/FaceFilterInterfaceComponent.html#method_acceptText",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\FaceFilterInterfaceComponent::acceptText",
			"doc": "&quot;Handles the cdata in the element. Returns true if this component consumes the cdata.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\FaceFilterInterfaceComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/FaceFilterInterfaceComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/FaceFilterInterfaceComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\FaceFilterInterfaceComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\FaceFilterInterfaceComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/FaceFilterInterfaceComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/FaceFilterInterfaceComponent.html#method_getFace",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\FaceFilterInterfaceComponent::getFace",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\FaceFilterInterfaceComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/FaceFilterInterfaceComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/FaceFilterInterfaceComponent.html#method_test",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\FaceFilterInterfaceComponent::test",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/InteractEntryComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\InteractEntryComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\InteractEntryComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/InteractEntryComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/InteractEntryComponent.html#method_startChild",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\InteractEntryComponent::startChild",
			"doc": "&quot;Resolve a child element into a node with components. Returns null if this node name is not recognized by this component.&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/InteractFilterInterface.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\InteractFilterInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\InteractFilterInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/InteractFilterInterface.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/InteractFilterInterface.html#method_test",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\InteractFilterInterface::test",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/ItemFilterComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\ItemFilterComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\ItemFilterComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/ItemFilterComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/ItemFilterComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\ItemFilterComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\ItemFilterComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/ItemFilterComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/ItemFilterComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\ItemFilterComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\ItemFilterComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/ItemFilterComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/ItemFilterComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\ItemFilterComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\ItemFilterComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/ItemFilterComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/ItemFilterComponent.html#method_setIsFromConfig",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\ItemFilterComponent::setIsFromConfig",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/TouchModeFilterInterfaceComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\TouchModeFilterInterfaceComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\TouchModeFilterInterfaceComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/TouchModeFilterInterfaceComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/TouchModeFilterInterfaceComponent.html#method_acceptText",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\TouchModeFilterInterfaceComponent::acceptText",
			"doc": "&quot;Handles the cdata in the element. Returns true if this component consumes the cdata.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\TouchModeFilterInterfaceComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/TouchModeFilterInterfaceComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/TouchModeFilterInterfaceComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\TouchModeFilterInterfaceComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\TouchModeFilterInterfaceComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/TouchModeFilterInterfaceComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/TouchModeFilterInterfaceComponent.html#method_getMode",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\TouchModeFilterInterfaceComponent::getMode",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\TouchModeFilterInterfaceComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Entry/Interact/TouchModeFilterInterfaceComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Entry/Interact/TouchModeFilterInterfaceComponent.html#method_test",
			"name": "SOFe\\Libkinetic\\Clickable\\Entry\\Interact\\TouchModeFilterInterfaceComponent::test",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Permission",
			"fromLink": "SOFe/Libkinetic/Clickable/Permission.html",
			"link": "SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionClickableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionClickableComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html#method_startChild",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionClickableComponent::startChild",
			"doc": "&quot;Resolve a child element into a node with components. Returns null if this node name is not recognized by this component.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html#method_getPermission",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionClickableComponent::getPermission",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html#method_testPermission",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionClickableComponent::testPermission",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html#method_onClick",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionClickableComponent::onClick",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionClickableComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Permission/PermissionClickableComponent.html#method_getPriority",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionClickableComponent::getPriority",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Permission",
			"fromLink": "SOFe/Libkinetic/Clickable/Permission.html",
			"link": "SOFe/Libkinetic/Clickable/Permission/PermissionComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Permission/PermissionComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Permission/PermissionComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Permission/PermissionComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Permission/PermissionComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Permission/PermissionComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Permission/PermissionComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Permission/PermissionComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Permission/PermissionComponent.html#method_testPermission",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionComponent::testPermission",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Permission/PermissionComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Permission/PermissionComponent.html#method_testPermissionNoisy",
			"name": "SOFe\\Libkinetic\\Clickable\\Permission\\PermissionComponent::testPermissionNoisy",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types",
			"fromLink": "SOFe/Libkinetic/Clickable/Types.html",
			"link": "SOFe/Libkinetic/Clickable/Types/ExitComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\ExitComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\ExitComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/ExitComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/ExitComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\ExitComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\ExitComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/ExitComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/ExitComponent.html#method_onClickImpl",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\ExitComponent::onClickImpl",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types",
			"fromLink": "SOFe/Libkinetic/Clickable/Types.html",
			"link": "SOFe/Libkinetic/Clickable/Types/IndexComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\IndexComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\IndexComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/IndexComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/IndexComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\IndexComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\IndexComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/IndexComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/IndexComponent.html#method_onClickForm",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\IndexComponent::onClickForm",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\IndexComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/IndexComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/IndexComponent.html#method_onClickCommandHeader",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\IndexComponent::onClickCommandHeader",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\IndexComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/IndexComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/IndexComponent.html#method_getClickableListFor",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\IndexComponent::getClickableListFor",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\IndexComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/IndexComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/IndexComponent.html#method_getSubCommands",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\IndexComponent::getSubCommands",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\IndexComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/IndexComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/IndexComponent.html#method_handleSubCommand",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\IndexComponent::handleSubCommand",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types",
			"fromLink": "SOFe/Libkinetic/Clickable/Types.html",
			"link": "SOFe/Libkinetic/Clickable/Types/InfoComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\InfoComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\InfoComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/InfoComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/InfoComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\InfoComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types",
			"fromLink": "SOFe/Libkinetic/Clickable/Types.html",
			"link": "SOFe/Libkinetic/Clickable/Types/IntermediateLinkInterface.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\IntermediateLinkInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\IntermediateLinkInterface",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/IntermediateLinkInterface.html",
			"link": "SOFe/Libkinetic/Clickable/Types/IntermediateLinkInterface.html#method_getLinkName",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\IntermediateLinkInterface::getLinkName",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types",
			"fromLink": "SOFe/Libkinetic/Clickable/Types.html",
			"link": "SOFe/Libkinetic/Clickable/Types/LinkComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\LinkComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\LinkComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/LinkComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/LinkComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\LinkComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\LinkComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/LinkComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/LinkComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\LinkComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\LinkComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/LinkComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/LinkComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\LinkComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\LinkComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/LinkComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/LinkComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\LinkComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\LinkComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/LinkComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/LinkComponent.html#method_onClick",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\LinkComponent::onClick",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types",
			"fromLink": "SOFe/Libkinetic/Clickable/Types.html",
			"link": "SOFe/Libkinetic/Clickable/Types/ListComponent.html",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\ListComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Clickable\\Types\\ListComponent",
			"fromLink": "SOFe/Libkinetic/Clickable/Types/ListComponent.html",
			"link": "SOFe/Libkinetic/Clickable/Types/ListComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Clickable\\Types\\ListComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},

		{
			"type": "Trait",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html",
			"name": "SOFe\\Libkinetic\\ComponentAdapter",
			"doc": "&quot;This file generates template functions to access KineticNode-&gt;getComponent().&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_findComponentsByInterface",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::findComponentsByInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asAbsoluteIdComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asAbsoluteIdComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getAbsoluteIdComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getAbsoluteIdComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addAbsoluteIdComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addAbsoluteIdComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asArgComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asArgComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getArgComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getArgComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addArgComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addArgComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asArguableComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asArguableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getArguableComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getArguableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addArguableComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addArguableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asBlockFilterComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asBlockFilterComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getBlockFilterComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getBlockFilterComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addBlockFilterComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addBlockFilterComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asClickableComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asClickableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getClickableComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getClickableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addClickableComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addClickableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asClickableParentComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asClickableParentComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getClickableParentComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getClickableParentComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addClickableParentComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addClickableParentComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asCommandAliasComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asCommandAliasComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getCommandAliasComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getCommandAliasComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addCommandAliasComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addCommandAliasComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asCommandEntryComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asCommandEntryComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getCommandEntryComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getCommandEntryComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addCommandEntryComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addCommandEntryComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asContCommandComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asContCommandComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getContCommandComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getContCommandComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addContCommandComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addContCommandComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asCycleArgComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asCycleArgComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getCycleArgComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getCycleArgComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addCycleArgComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addCycleArgComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asDirectEntryClickableComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asDirectEntryClickableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getDirectEntryClickableComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getDirectEntryClickableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addDirectEntryClickableComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addDirectEntryClickableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asDropdownOptionComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asDropdownOptionComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getDropdownOptionComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getDropdownOptionComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addDropdownOptionComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addDropdownOptionComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asDynamicDropdownComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asDynamicDropdownComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getDynamicDropdownComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getDynamicDropdownComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addDynamicDropdownComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addDynamicDropdownComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asDynamicStepSliderComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asDynamicStepSliderComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getDynamicStepSliderComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getDynamicStepSliderComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addDynamicStepSliderComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addDynamicStepSliderComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asElementComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asElementComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getElementComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getElementComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addElementComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addElementComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asElementParentComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asElementParentComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getElementParentComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getElementParentComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addElementParentComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addElementParentComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asElementParentWithRequiredFallbackComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asElementParentWithRequiredFallbackComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getElementParentWithRequiredFallbackComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getElementParentWithRequiredFallbackComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addElementParentWithRequiredFallbackComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addElementParentWithRequiredFallbackComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asExitComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asExitComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getExitComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getExitComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addExitComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addExitComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asFaceFilterInterfaceComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asFaceFilterInterfaceComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getFaceFilterInterfaceComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getFaceFilterInterfaceComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addFaceFilterInterfaceComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addFaceFilterInterfaceComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asIndexComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asIndexComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getIndexComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getIndexComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addIndexComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addIndexComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asInfoComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asInfoComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getInfoComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getInfoComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addInfoComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addInfoComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asInputComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asInputComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getInputComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getInputComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addInputComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addInputComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asInteractEntryComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asInteractEntryComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getInteractEntryComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getInteractEntryComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addInteractEntryComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addInteractEntryComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asItemFilterComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asItemFilterComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getItemFilterComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getItemFilterComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addItemFilterComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addItemFilterComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asLabelComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asLabelComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getLabelComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getLabelComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addLabelComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addLabelComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asLinkComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asLinkComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getLinkComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getLinkComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addLinkComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addLinkComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asListComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asListComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getListComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getListComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addListComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addListComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asPermissionClickableComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asPermissionClickableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getPermissionClickableComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getPermissionClickableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addPermissionClickableComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addPermissionClickableComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asPermissionComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asPermissionComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getPermissionComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getPermissionComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addPermissionComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addPermissionComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asRequiredComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asRequiredComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getRequiredComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getRequiredComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addRequiredComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addRequiredComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asRequiredWithFallbackComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asRequiredWithFallbackComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getRequiredWithFallbackComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getRequiredWithFallbackComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addRequiredWithFallbackComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addRequiredWithFallbackComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asRootComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asRootComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getRootComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getRootComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addRootComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addRootComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asSimpleArgComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asSimpleArgComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getSimpleArgComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getSimpleArgComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addSimpleArgComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addSimpleArgComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asSliderComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asSliderComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getSliderComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getSliderComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addSliderComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addSliderComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asStaticDropdownComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asStaticDropdownComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getStaticDropdownComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getStaticDropdownComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addStaticDropdownComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addStaticDropdownComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asStaticStepSliderComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asStaticStepSliderComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getStaticStepSliderComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getStaticStepSliderComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addStaticStepSliderComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addStaticStepSliderComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asToggleComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asToggleComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getToggleComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getToggleComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addToggleComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addToggleComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asTouchModeFilterInterfaceComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asTouchModeFilterInterfaceComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getTouchModeFilterInterfaceComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getTouchModeFilterInterfaceComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addTouchModeFilterInterfaceComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addTouchModeFilterInterfaceComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asWindowComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asWindowComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getWindowComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getWindowComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_addWindowComponent",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::addWindowComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asArgInterface",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asArgInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getArgInterfaces",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getArgInterfaces",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asClickableInterface",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asClickableInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getClickableInterfaces",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getClickableInterfaces",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asClickablePeerInterface",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asClickablePeerInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getClickablePeerInterfaces",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getClickablePeerInterfaces",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asEditableElementInterface",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asEditableElementInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getEditableElementInterfaces",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getEditableElementInterfaces",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asElementInterface",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asElementInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getElementInterfaces",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getElementInterfaces",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asInteractFilterInterface",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asInteractFilterInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getInteractFilterInterfaces",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getInteractFilterInterfaces",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_asIntermediateLinkInterface",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::asIntermediateLinkInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ComponentAdapter",
			"fromLink": "SOFe/Libkinetic/ComponentAdapter.html",
			"link": "SOFe/Libkinetic/ComponentAdapter.html#method_getIntermediateLinkInterfaces",
			"name": "SOFe\\Libkinetic\\ComponentAdapter::getIntermediateLinkInterfaces",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Defaults",
			"fromLink": "SOFe/Libkinetic/Defaults.html",
			"link": "SOFe/Libkinetic/Defaults/AllPlayersDropdownProvider.html",
			"name": "SOFe\\Libkinetic\\Defaults\\AllPlayersDropdownProvider",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Defaults\\AllPlayersDropdownProvider",
			"fromLink": "SOFe/Libkinetic/Defaults/AllPlayersDropdownProvider.html",
			"link": "SOFe/Libkinetic/Defaults/AllPlayersDropdownProvider.html#method_provide",
			"name": "SOFe\\Libkinetic\\Defaults\\AllPlayersDropdownProvider::provide",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Defaults",
			"fromLink": "SOFe/Libkinetic/Defaults.html",
			"link": "SOFe/Libkinetic/Defaults/AllPlayersMenuProvider.html",
			"name": "SOFe\\Libkinetic\\Defaults\\AllPlayersMenuProvider",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Defaults\\AllPlayersMenuProvider",
			"fromLink": "SOFe/Libkinetic/Defaults/AllPlayersMenuProvider.html",
			"link": "SOFe/Libkinetic/Defaults/AllPlayersMenuProvider.html#method_provide",
			"name": "SOFe\\Libkinetic\\Defaults\\AllPlayersMenuProvider::provide",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Defaults",
			"fromLink": "SOFe/Libkinetic/Defaults.html",
			"link": "SOFe/Libkinetic/Defaults/IsPlayerPredicate.html",
			"name": "SOFe\\Libkinetic\\Defaults\\IsPlayerPredicate",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Defaults\\IsPlayerPredicate",
			"fromLink": "SOFe/Libkinetic/Defaults/IsPlayerPredicate.html",
			"link": "SOFe/Libkinetic/Defaults/IsPlayerPredicate.html#method___construct",
			"name": "SOFe\\Libkinetic\\Defaults\\IsPlayerPredicate::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Defaults\\IsPlayerPredicate",
			"fromLink": "SOFe/Libkinetic/Defaults/IsPlayerPredicate.html",
			"link": "SOFe/Libkinetic/Defaults/IsPlayerPredicate.html#method_test",
			"name": "SOFe\\Libkinetic\\Defaults\\IsPlayerPredicate::test",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Trait",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike::setAttribute",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike::endElement",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html#method_init",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike::init",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html#method_asFormComponent",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike::asFormComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html#method_getFormType",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike::getFormType",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html#method_getFormStepKey",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike::getFormStepKey",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html#method_getNode",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike::getNode",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentDynamicLike.html#method_asElementComponent",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentDynamicLike::asElementComponent",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Trait",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html#method_startChild",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike::startChild",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike::endElement",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html#method_getDefault",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike::getDefault",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html#method_getDefaultAsString",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike::getDefaultAsString",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html#method_asFormComponent",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike::asFormComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html#method_adapter",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike::adapter",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html#method_getStepName",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike::getStepName",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html#method_getFormType",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike::getFormType",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html#method_getFormStepKey",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike::getFormStepKey",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html#method_getNode",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike::getNode",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike",
			"fromLink": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html",
			"link": "SOFe/Libkinetic/Element/DropdownComponentStaticLike.html#method_asElementComponent",
			"name": "SOFe\\Libkinetic\\Element\\DropdownComponentStaticLike::asElementComponent",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/DropdownOptionComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\DropdownOptionComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownOptionComponent",
			"fromLink": "SOFe/Libkinetic/Element/DropdownOptionComponent.html",
			"link": "SOFe/Libkinetic/Element/DropdownOptionComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Element\\DropdownOptionComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownOptionComponent",
			"fromLink": "SOFe/Libkinetic/Element/DropdownOptionComponent.html",
			"link": "SOFe/Libkinetic/Element/DropdownOptionComponent.html#method_acceptText",
			"name": "SOFe\\Libkinetic\\Element\\DropdownOptionComponent::acceptText",
			"doc": "&quot;Handles the cdata in the element. Returns true if this component consumes the cdata.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownOptionComponent",
			"fromLink": "SOFe/Libkinetic/Element/DropdownOptionComponent.html",
			"link": "SOFe/Libkinetic/Element/DropdownOptionComponent.html#method_isMarkedDefault",
			"name": "SOFe\\Libkinetic\\Element\\DropdownOptionComponent::isMarkedDefault",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownOptionComponent",
			"fromLink": "SOFe/Libkinetic/Element/DropdownOptionComponent.html",
			"link": "SOFe/Libkinetic/Element/DropdownOptionComponent.html#method_getValue",
			"name": "SOFe\\Libkinetic\\Element\\DropdownOptionComponent::getValue",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DropdownOptionComponent",
			"fromLink": "SOFe/Libkinetic/Element/DropdownOptionComponent.html",
			"link": "SOFe/Libkinetic/Element/DropdownOptionComponent.html#method_getText",
			"name": "SOFe\\Libkinetic\\Element\\DropdownOptionComponent::getText",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/DynamicDropdownComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\DynamicDropdownComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DynamicDropdownComponent",
			"fromLink": "SOFe/Libkinetic/Element/DynamicDropdownComponent.html",
			"link": "SOFe/Libkinetic/Element/DynamicDropdownComponent.html#method_getFormType",
			"name": "SOFe\\Libkinetic\\Element\\DynamicDropdownComponent::getFormType",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DynamicDropdownComponent",
			"fromLink": "SOFe/Libkinetic/Element/DynamicDropdownComponent.html",
			"link": "SOFe/Libkinetic/Element/DynamicDropdownComponent.html#method_getFormStepKey",
			"name": "SOFe\\Libkinetic\\Element\\DynamicDropdownComponent::getFormStepKey",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/DynamicStepSliderComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\DynamicStepSliderComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DynamicStepSliderComponent",
			"fromLink": "SOFe/Libkinetic/Element/DynamicStepSliderComponent.html",
			"link": "SOFe/Libkinetic/Element/DynamicStepSliderComponent.html#method_getFormType",
			"name": "SOFe\\Libkinetic\\Element\\DynamicStepSliderComponent::getFormType",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\DynamicStepSliderComponent",
			"fromLink": "SOFe/Libkinetic/Element/DynamicStepSliderComponent.html",
			"link": "SOFe/Libkinetic/Element/DynamicStepSliderComponent.html#method_getFormStepKey",
			"name": "SOFe\\Libkinetic\\Element\\DynamicStepSliderComponent::getFormStepKey",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/EditableElementInterface.html",
			"name": "SOFe\\Libkinetic\\Element\\EditableElementInterface",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/ElementComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\ElementComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementComponent",
			"fromLink": "SOFe/Libkinetic/Element/ElementComponent.html",
			"link": "SOFe/Libkinetic/Element/ElementComponent.html#method_cat",
			"name": "SOFe\\Libkinetic\\Element\\ElementComponent::cat",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementComponent",
			"fromLink": "SOFe/Libkinetic/Element/ElementComponent.html",
			"link": "SOFe/Libkinetic/Element/ElementComponent.html#method_typeCast",
			"name": "SOFe\\Libkinetic\\Element\\ElementComponent::typeCast",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementComponent",
			"fromLink": "SOFe/Libkinetic/Element/ElementComponent.html",
			"link": "SOFe/Libkinetic/Element/ElementComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Element\\ElementComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementComponent",
			"fromLink": "SOFe/Libkinetic/Element/ElementComponent.html",
			"link": "SOFe/Libkinetic/Element/ElementComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Element\\ElementComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementComponent",
			"fromLink": "SOFe/Libkinetic/Element/ElementComponent.html",
			"link": "SOFe/Libkinetic/Element/ElementComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Element\\ElementComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementComponent",
			"fromLink": "SOFe/Libkinetic/Element/ElementComponent.html",
			"link": "SOFe/Libkinetic/Element/ElementComponent.html#method_getId",
			"name": "SOFe\\Libkinetic\\Element\\ElementComponent::getId",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementComponent",
			"fromLink": "SOFe/Libkinetic/Element/ElementComponent.html",
			"link": "SOFe/Libkinetic/Element/ElementComponent.html#method_getTitle",
			"name": "SOFe\\Libkinetic\\Element\\ElementComponent::getTitle",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementComponent",
			"fromLink": "SOFe/Libkinetic/Element/ElementComponent.html",
			"link": "SOFe/Libkinetic/Element/ElementComponent.html#method_asFormComponent",
			"name": "SOFe\\Libkinetic\\Element\\ElementComponent::asFormComponent",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/ElementInterface.html",
			"name": "SOFe\\Libkinetic\\Element\\ElementInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementInterface",
			"fromLink": "SOFe/Libkinetic/Element/ElementInterface.html",
			"link": "SOFe/Libkinetic/Element/ElementInterface.html#method_getNode",
			"name": "SOFe\\Libkinetic\\Element\\ElementInterface::getNode",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementInterface",
			"fromLink": "SOFe/Libkinetic/Element/ElementInterface.html",
			"link": "SOFe/Libkinetic/Element/ElementInterface.html#method_asFormComponent",
			"name": "SOFe\\Libkinetic\\Element\\ElementInterface::asFormComponent",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/ElementParentComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\ElementParentComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementParentComponent",
			"fromLink": "SOFe/Libkinetic/Element/ElementParentComponent.html",
			"link": "SOFe/Libkinetic/Element/ElementParentComponent.html#method_startChild",
			"name": "SOFe\\Libkinetic\\Element\\ElementParentComponent::startChild",
			"doc": "&quot;Resolve a child element into a node with components. Returns null if this node name is not recognized by this component.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementParentComponent",
			"fromLink": "SOFe/Libkinetic/Element/ElementParentComponent.html",
			"link": "SOFe/Libkinetic/Element/ElementParentComponent.html#method_extraComponents",
			"name": "SOFe\\Libkinetic\\Element\\ElementParentComponent::extraComponents",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementParentComponent",
			"fromLink": "SOFe/Libkinetic/Element/ElementParentComponent.html",
			"link": "SOFe/Libkinetic/Element/ElementParentComponent.html#method_getElements",
			"name": "SOFe\\Libkinetic\\Element\\ElementParentComponent::getElements",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/ElementParentWithRequiredFallbackComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\ElementParentWithRequiredFallbackComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ElementParentWithRequiredFallbackComponent",
			"fromLink": "SOFe/Libkinetic/Element/ElementParentWithRequiredFallbackComponent.html",
			"link": "SOFe/Libkinetic/Element/ElementParentWithRequiredFallbackComponent.html#method_extraComponents",
			"name": "SOFe\\Libkinetic\\Element\\ElementParentWithRequiredFallbackComponent::extraComponents",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/InputComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\InputComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\InputComponent",
			"fromLink": "SOFe/Libkinetic/Element/InputComponent.html",
			"link": "SOFe/Libkinetic/Element/InputComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Element\\InputComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\InputComponent",
			"fromLink": "SOFe/Libkinetic/Element/InputComponent.html",
			"link": "SOFe/Libkinetic/Element/InputComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Element\\InputComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\InputComponent",
			"fromLink": "SOFe/Libkinetic/Element/InputComponent.html",
			"link": "SOFe/Libkinetic/Element/InputComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Element\\InputComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\InputComponent",
			"fromLink": "SOFe/Libkinetic/Element/InputComponent.html",
			"link": "SOFe/Libkinetic/Element/InputComponent.html#method_getPlaceholder",
			"name": "SOFe\\Libkinetic\\Element\\InputComponent::getPlaceholder",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\InputComponent",
			"fromLink": "SOFe/Libkinetic/Element/InputComponent.html",
			"link": "SOFe/Libkinetic/Element/InputComponent.html#method_getDefault",
			"name": "SOFe\\Libkinetic\\Element\\InputComponent::getDefault",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\InputComponent",
			"fromLink": "SOFe/Libkinetic/Element/InputComponent.html",
			"link": "SOFe/Libkinetic/Element/InputComponent.html#method_getDefaultAsString",
			"name": "SOFe\\Libkinetic\\Element\\InputComponent::getDefaultAsString",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\InputComponent",
			"fromLink": "SOFe/Libkinetic/Element/InputComponent.html",
			"link": "SOFe/Libkinetic/Element/InputComponent.html#method_getTypeCast",
			"name": "SOFe\\Libkinetic\\Element\\InputComponent::getTypeCast",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\InputComponent",
			"fromLink": "SOFe/Libkinetic/Element/InputComponent.html",
			"link": "SOFe/Libkinetic/Element/InputComponent.html#method_asFormComponent",
			"name": "SOFe\\Libkinetic\\Element\\InputComponent::asFormComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\InputComponent",
			"fromLink": "SOFe/Libkinetic/Element/InputComponent.html",
			"link": "SOFe/Libkinetic/Element/InputComponent.html#method_adapter",
			"name": "SOFe\\Libkinetic\\Element\\InputComponent::adapter",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/LabelComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\LabelComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\LabelComponent",
			"fromLink": "SOFe/Libkinetic/Element/LabelComponent.html",
			"link": "SOFe/Libkinetic/Element/LabelComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Element\\LabelComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\LabelComponent",
			"fromLink": "SOFe/Libkinetic/Element/LabelComponent.html",
			"link": "SOFe/Libkinetic/Element/LabelComponent.html#method_asFormComponent",
			"name": "SOFe\\Libkinetic\\Element\\LabelComponent::asFormComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\LabelComponent",
			"fromLink": "SOFe/Libkinetic/Element/LabelComponent.html",
			"link": "SOFe/Libkinetic/Element/LabelComponent.html#method_adapter",
			"name": "SOFe\\Libkinetic\\Element\\LabelComponent::adapter",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/RequiredComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\RequiredComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\RequiredComponent",
			"fromLink": "SOFe/Libkinetic/Element/RequiredComponent.html",
			"link": "SOFe/Libkinetic/Element/RequiredComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Element\\RequiredComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\RequiredComponent",
			"fromLink": "SOFe/Libkinetic/Element/RequiredComponent.html",
			"link": "SOFe/Libkinetic/Element/RequiredComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Element\\RequiredComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\RequiredComponent",
			"fromLink": "SOFe/Libkinetic/Element/RequiredComponent.html",
			"link": "SOFe/Libkinetic/Element/RequiredComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\Element\\RequiredComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\RequiredComponent",
			"fromLink": "SOFe/Libkinetic/Element/RequiredComponent.html",
			"link": "SOFe/Libkinetic/Element/RequiredComponent.html#method_test",
			"name": "SOFe\\Libkinetic\\Element\\RequiredComponent::test",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/RequiredWithFallbackComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\RequiredWithFallbackComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\RequiredWithFallbackComponent",
			"fromLink": "SOFe/Libkinetic/Element/RequiredWithFallbackComponent.html",
			"link": "SOFe/Libkinetic/Element/RequiredWithFallbackComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Element\\RequiredWithFallbackComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/SliderComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\SliderComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\SliderComponent",
			"fromLink": "SOFe/Libkinetic/Element/SliderComponent.html",
			"link": "SOFe/Libkinetic/Element/SliderComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Element\\SliderComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\SliderComponent",
			"fromLink": "SOFe/Libkinetic/Element/SliderComponent.html",
			"link": "SOFe/Libkinetic/Element/SliderComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Element\\SliderComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\SliderComponent",
			"fromLink": "SOFe/Libkinetic/Element/SliderComponent.html",
			"link": "SOFe/Libkinetic/Element/SliderComponent.html#method_endAttributes",
			"name": "SOFe\\Libkinetic\\Element\\SliderComponent::endAttributes",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\SliderComponent",
			"fromLink": "SOFe/Libkinetic/Element/SliderComponent.html",
			"link": "SOFe/Libkinetic/Element/SliderComponent.html#method_getDefault",
			"name": "SOFe\\Libkinetic\\Element\\SliderComponent::getDefault",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\SliderComponent",
			"fromLink": "SOFe/Libkinetic/Element/SliderComponent.html",
			"link": "SOFe/Libkinetic/Element/SliderComponent.html#method_getDefaultAsString",
			"name": "SOFe\\Libkinetic\\Element\\SliderComponent::getDefaultAsString",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\SliderComponent",
			"fromLink": "SOFe/Libkinetic/Element/SliderComponent.html",
			"link": "SOFe/Libkinetic/Element/SliderComponent.html#method_asFormComponent",
			"name": "SOFe\\Libkinetic\\Element\\SliderComponent::asFormComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\SliderComponent",
			"fromLink": "SOFe/Libkinetic/Element/SliderComponent.html",
			"link": "SOFe/Libkinetic/Element/SliderComponent.html#method_adapter",
			"name": "SOFe\\Libkinetic\\Element\\SliderComponent::adapter",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/StaticDropdownComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\StaticDropdownComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\StaticDropdownComponent",
			"fromLink": "SOFe/Libkinetic/Element/StaticDropdownComponent.html",
			"link": "SOFe/Libkinetic/Element/StaticDropdownComponent.html#method_getStepName",
			"name": "SOFe\\Libkinetic\\Element\\StaticDropdownComponent::getStepName",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\StaticDropdownComponent",
			"fromLink": "SOFe/Libkinetic/Element/StaticDropdownComponent.html",
			"link": "SOFe/Libkinetic/Element/StaticDropdownComponent.html#method_getFormType",
			"name": "SOFe\\Libkinetic\\Element\\StaticDropdownComponent::getFormType",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\StaticDropdownComponent",
			"fromLink": "SOFe/Libkinetic/Element/StaticDropdownComponent.html",
			"link": "SOFe/Libkinetic/Element/StaticDropdownComponent.html#method_getFormStepKey",
			"name": "SOFe\\Libkinetic\\Element\\StaticDropdownComponent::getFormStepKey",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/StaticStepSliderComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\StaticStepSliderComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\StaticStepSliderComponent",
			"fromLink": "SOFe/Libkinetic/Element/StaticStepSliderComponent.html",
			"link": "SOFe/Libkinetic/Element/StaticStepSliderComponent.html#method_getStepName",
			"name": "SOFe\\Libkinetic\\Element\\StaticStepSliderComponent::getStepName",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\StaticStepSliderComponent",
			"fromLink": "SOFe/Libkinetic/Element/StaticStepSliderComponent.html",
			"link": "SOFe/Libkinetic/Element/StaticStepSliderComponent.html#method_getFormType",
			"name": "SOFe\\Libkinetic\\Element\\StaticStepSliderComponent::getFormType",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\StaticStepSliderComponent",
			"fromLink": "SOFe/Libkinetic/Element/StaticStepSliderComponent.html",
			"link": "SOFe/Libkinetic/Element/StaticStepSliderComponent.html#method_getFormStepKey",
			"name": "SOFe\\Libkinetic\\Element\\StaticStepSliderComponent::getFormStepKey",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Element",
			"fromLink": "SOFe/Libkinetic/Element.html",
			"link": "SOFe/Libkinetic/Element/ToggleComponent.html",
			"name": "SOFe\\Libkinetic\\Element\\ToggleComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ToggleComponent",
			"fromLink": "SOFe/Libkinetic/Element/ToggleComponent.html",
			"link": "SOFe/Libkinetic/Element/ToggleComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Element\\ToggleComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ToggleComponent",
			"fromLink": "SOFe/Libkinetic/Element/ToggleComponent.html",
			"link": "SOFe/Libkinetic/Element/ToggleComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Element\\ToggleComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ToggleComponent",
			"fromLink": "SOFe/Libkinetic/Element/ToggleComponent.html",
			"link": "SOFe/Libkinetic/Element/ToggleComponent.html#method_getDefault",
			"name": "SOFe\\Libkinetic\\Element\\ToggleComponent::getDefault",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ToggleComponent",
			"fromLink": "SOFe/Libkinetic/Element/ToggleComponent.html",
			"link": "SOFe/Libkinetic/Element/ToggleComponent.html#method_getDefaultAsString",
			"name": "SOFe\\Libkinetic\\Element\\ToggleComponent::getDefaultAsString",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ToggleComponent",
			"fromLink": "SOFe/Libkinetic/Element/ToggleComponent.html",
			"link": "SOFe/Libkinetic/Element/ToggleComponent.html#method_asFormComponent",
			"name": "SOFe\\Libkinetic\\Element\\ToggleComponent::asFormComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Element\\ToggleComponent",
			"fromLink": "SOFe/Libkinetic/Element/ToggleComponent.html",
			"link": "SOFe/Libkinetic/Element/ToggleComponent.html#method_adapter",
			"name": "SOFe\\Libkinetic\\Element\\ToggleComponent::adapter",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Form",
			"fromLink": "SOFe/Libkinetic/Form.html",
			"link": "SOFe/Libkinetic/Form/Form.html",
			"name": "SOFe\\Libkinetic\\Form\\Form",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\Form",
			"fromLink": "SOFe/Libkinetic/Form/Form.html",
			"link": "SOFe/Libkinetic/Form/Form.html#method_sendPacket",
			"name": "SOFe\\Libkinetic\\Form\\Form::sendPacket",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Form",
			"fromLink": "SOFe/Libkinetic/Form.html",
			"link": "SOFe/Libkinetic/Form/FormHandler.html",
			"name": "SOFe\\Libkinetic\\Form\\FormHandler",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\FormHandler",
			"fromLink": "SOFe/Libkinetic/Form/FormHandler.html",
			"link": "SOFe/Libkinetic/Form/FormHandler.html#method___construct",
			"name": "SOFe\\Libkinetic\\Form\\FormHandler::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\FormHandler",
			"fromLink": "SOFe/Libkinetic/Form/FormHandler.html",
			"link": "SOFe/Libkinetic/Form/FormHandler.html#method_getManager",
			"name": "SOFe\\Libkinetic\\Form\\FormHandler::getManager",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\FormHandler",
			"fromLink": "SOFe/Libkinetic/Form/FormHandler.html",
			"link": "SOFe/Libkinetic/Form/FormHandler.html#method_sendForm",
			"name": "SOFe\\Libkinetic\\Form\\FormHandler::sendForm",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\FormHandler",
			"fromLink": "SOFe/Libkinetic/Form/FormHandler.html",
			"link": "SOFe/Libkinetic/Form/FormHandler.html#method_handleFormResponse",
			"name": "SOFe\\Libkinetic\\Form\\FormHandler::handleFormResponse",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\FormHandler",
			"fromLink": "SOFe/Libkinetic/Form/FormHandler.html",
			"link": "SOFe/Libkinetic/Form/FormHandler.html#method_cleanExpiredForms",
			"name": "SOFe\\Libkinetic\\Form\\FormHandler::cleanExpiredForms",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Form",
			"fromLink": "SOFe/Libkinetic/Form.html",
			"link": "SOFe/Libkinetic/Form/FormListener.html",
			"name": "SOFe\\Libkinetic\\Form\\FormListener",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\FormListener",
			"fromLink": "SOFe/Libkinetic/Form/FormListener.html",
			"link": "SOFe/Libkinetic/Form/FormListener.html#method___construct",
			"name": "SOFe\\Libkinetic\\Form\\FormListener::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\FormListener",
			"fromLink": "SOFe/Libkinetic/Form/FormListener.html",
			"link": "SOFe/Libkinetic/Form/FormListener.html#method_e_packetRecv",
			"name": "SOFe\\Libkinetic\\Form\\FormListener::e_packetRecv",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Form",
			"fromLink": "SOFe/Libkinetic/Form.html",
			"link": "SOFe/Libkinetic/Form/Icon.html",
			"name": "SOFe\\Libkinetic\\Form\\Icon",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\Icon",
			"fromLink": "SOFe/Libkinetic/Form/Icon.html",
			"link": "SOFe/Libkinetic/Form/Icon.html#method_getType",
			"name": "SOFe\\Libkinetic\\Form\\Icon::getType",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\Icon",
			"fromLink": "SOFe/Libkinetic/Form/Icon.html",
			"link": "SOFe/Libkinetic/Form/Icon.html#method_getValue",
			"name": "SOFe\\Libkinetic\\Form\\Icon::getValue",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Form",
			"fromLink": "SOFe/Libkinetic/Form.html",
			"link": "SOFe/Libkinetic/Form/ResendFormException.html",
			"name": "SOFe\\Libkinetic\\Form\\ResendFormException",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\ResendFormException",
			"fromLink": "SOFe/Libkinetic/Form/ResendFormException.html",
			"link": "SOFe/Libkinetic/Form/ResendFormException.html#method___construct",
			"name": "SOFe\\Libkinetic\\Form\\ResendFormException::__construct",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Form",
			"fromLink": "SOFe/Libkinetic/Form.html",
			"link": "SOFe/Libkinetic/Form/SimpleIcon.html",
			"name": "SOFe\\Libkinetic\\Form\\SimpleIcon",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\SimpleIcon",
			"fromLink": "SOFe/Libkinetic/Form/SimpleIcon.html",
			"link": "SOFe/Libkinetic/Form/SimpleIcon.html#method___construct",
			"name": "SOFe\\Libkinetic\\Form\\SimpleIcon::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\SimpleIcon",
			"fromLink": "SOFe/Libkinetic/Form/SimpleIcon.html",
			"link": "SOFe/Libkinetic/Form/SimpleIcon.html#method_getType",
			"name": "SOFe\\Libkinetic\\Form\\SimpleIcon::getType",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Form\\SimpleIcon",
			"fromLink": "SOFe/Libkinetic/Form/SimpleIcon.html",
			"link": "SOFe/Libkinetic/Form/SimpleIcon.html#method_getValue",
			"name": "SOFe\\Libkinetic\\Form\\SimpleIcon::getValue",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/InvalidFormResponseException.html",
			"name": "SOFe\\Libkinetic\\InvalidFormResponseException",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/InvalidNodeException.html",
			"name": "SOFe\\Libkinetic\\InvalidNodeException",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\InvalidNodeException",
			"fromLink": "SOFe/Libkinetic/InvalidNodeException.html",
			"link": "SOFe/Libkinetic/InvalidNodeException.html#method___construct",
			"name": "SOFe\\Libkinetic\\InvalidNodeException::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\InvalidNodeException",
			"fromLink": "SOFe/Libkinetic/InvalidNodeException.html",
			"link": "SOFe/Libkinetic/InvalidNodeException.html#method_setMessage",
			"name": "SOFe\\Libkinetic\\InvalidNodeException::setMessage",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/KineticAdapter.html",
			"name": "SOFe\\Libkinetic\\KineticAdapter",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticAdapter",
			"fromLink": "SOFe/Libkinetic/KineticAdapter.html",
			"link": "SOFe/Libkinetic/KineticAdapter.html#method_hasMessage",
			"name": "SOFe\\Libkinetic\\KineticAdapter::hasMessage",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticAdapter",
			"fromLink": "SOFe/Libkinetic/KineticAdapter.html",
			"link": "SOFe/Libkinetic/KineticAdapter.html#method_getMessage",
			"name": "SOFe\\Libkinetic\\KineticAdapter::getMessage",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticAdapter",
			"fromLink": "SOFe/Libkinetic/KineticAdapter.html",
			"link": "SOFe/Libkinetic/KineticAdapter.html#method_getInstantiable",
			"name": "SOFe\\Libkinetic\\KineticAdapter::getInstantiable",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticAdapter",
			"fromLink": "SOFe/Libkinetic/KineticAdapter.html",
			"link": "SOFe/Libkinetic/KineticAdapter.html#method_getKineticConfig",
			"name": "SOFe\\Libkinetic\\KineticAdapter::getKineticConfig",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Trait",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/KineticAdapterBase.html",
			"name": "SOFe\\Libkinetic\\KineticAdapterBase",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticAdapterBase",
			"fromLink": "SOFe/Libkinetic/KineticAdapterBase.html",
			"link": "SOFe/Libkinetic/KineticAdapterBase.html#method_kinetic_setPlugin",
			"name": "SOFe\\Libkinetic\\KineticAdapterBase::kinetic_setPlugin",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticAdapterBase",
			"fromLink": "SOFe/Libkinetic/KineticAdapterBase.html",
			"link": "SOFe/Libkinetic/KineticAdapterBase.html#method_hasMessage",
			"name": "SOFe\\Libkinetic\\KineticAdapterBase::hasMessage",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticAdapterBase",
			"fromLink": "SOFe/Libkinetic/KineticAdapterBase.html",
			"link": "SOFe/Libkinetic/KineticAdapterBase.html#method_getMessage",
			"name": "SOFe\\Libkinetic\\KineticAdapterBase::getMessage",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticAdapterBase",
			"fromLink": "SOFe/Libkinetic/KineticAdapterBase.html",
			"link": "SOFe/Libkinetic/KineticAdapterBase.html#method_getInstantiable",
			"name": "SOFe\\Libkinetic\\KineticAdapterBase::getInstantiable",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticAdapterBase",
			"fromLink": "SOFe/Libkinetic/KineticAdapterBase.html",
			"link": "SOFe/Libkinetic/KineticAdapterBase.html#method_getKineticConfig",
			"name": "SOFe\\Libkinetic\\KineticAdapterBase::getKineticConfig",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/KineticComponent.html",
			"name": "SOFe\\Libkinetic\\KineticComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method___construct",
			"name": "SOFe\\Libkinetic\\KineticComponent::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_getNode",
			"name": "SOFe\\Libkinetic\\KineticComponent::getNode",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_getManager",
			"name": "SOFe\\Libkinetic\\KineticComponent::getManager",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\KineticComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\KineticComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_setAttributeNS",
			"name": "SOFe\\Libkinetic\\KineticComponent::setAttributeNS",
			"doc": "&quot;A variant of setAttribute() with non-default namespace.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_startChild",
			"name": "SOFe\\Libkinetic\\KineticComponent::startChild",
			"doc": "&quot;Resolve a child element into a node with components. Returns null if this node name is not recognized by this component.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_startChildNS",
			"name": "SOFe\\Libkinetic\\KineticComponent::startChildNS",
			"doc": "&quot;A variant of startChild() with non-default namespace.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_acceptText",
			"name": "SOFe\\Libkinetic\\KineticComponent::acceptText",
			"doc": "&quot;Handles the cdata in the element. Returns true if this component consumes the cdata.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\KineticComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_setManager",
			"name": "SOFe\\Libkinetic\\KineticComponent::setManager",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\KineticComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_init",
			"name": "SOFe\\Libkinetic\\KineticComponent::init",
			"doc": "&quot;Register handlers with the PocketMine interface in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_requireAttribute",
			"name": "SOFe\\Libkinetic\\KineticComponent::requireAttribute",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_requireChild",
			"name": "SOFe\\Libkinetic\\KineticComponent::requireChild",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_requireChildren",
			"name": "SOFe\\Libkinetic\\KineticComponent::requireChildren",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_requireText",
			"name": "SOFe\\Libkinetic\\KineticComponent::requireText",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_requireTranslation",
			"name": "SOFe\\Libkinetic\\KineticComponent::requireTranslation",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_resolveClass",
			"name": "SOFe\\Libkinetic\\KineticComponent::resolveClass",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_resolveConfigString",
			"name": "SOFe\\Libkinetic\\KineticComponent::resolveConfigString",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_resolveConfigNumber",
			"name": "SOFe\\Libkinetic\\KineticComponent::resolveConfigNumber",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_resolveConfigBool",
			"name": "SOFe\\Libkinetic\\KineticComponent::resolveConfigBool",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_throw",
			"name": "SOFe\\Libkinetic\\KineticComponent::throw",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_parseBoolean",
			"name": "SOFe\\Libkinetic\\KineticComponent::parseBoolean",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_parseInt",
			"name": "SOFe\\Libkinetic\\KineticComponent::parseInt",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_parseFloat",
			"name": "SOFe\\Libkinetic\\KineticComponent::parseFloat",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_getComponent",
			"name": "SOFe\\Libkinetic\\KineticComponent::getComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticComponent",
			"fromLink": "SOFe/Libkinetic/KineticComponent.html",
			"link": "SOFe/Libkinetic/KineticComponent.html#method_findComponentsByInterface",
			"name": "SOFe\\Libkinetic\\KineticComponent::findComponentsByInterface",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/KineticManager.html",
			"name": "SOFe\\Libkinetic\\KineticManager",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method___construct",
			"name": "SOFe\\Libkinetic\\KineticManager::__construct",
			"doc": "&quot;KineticManager constructor.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_getPlugin",
			"name": "SOFe\\Libkinetic\\KineticManager::getPlugin",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_getAdapter",
			"name": "SOFe\\Libkinetic\\KineticManager::getAdapter",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_getFormHandler",
			"name": "SOFe\\Libkinetic\\KineticManager::getFormHandler",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_hasCont",
			"name": "SOFe\\Libkinetic\\KineticManager::hasCont",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_getContComponents",
			"name": "SOFe\\Libkinetic\\KineticManager::getContComponents",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_setContAction",
			"name": "SOFe\\Libkinetic\\KineticManager::setContAction",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_getContAction",
			"name": "SOFe\\Libkinetic\\KineticManager::getContAction",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_consumeContAction",
			"name": "SOFe\\Libkinetic\\KineticManager::consumeContAction",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_cleanContAction",
			"name": "SOFe\\Libkinetic\\KineticManager::cleanContAction",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_getNodeById",
			"name": "SOFe\\Libkinetic\\KineticManager::getNodeById",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_clickNode",
			"name": "SOFe\\Libkinetic\\KineticManager::clickNode",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_translate",
			"name": "SOFe\\Libkinetic\\KineticManager::translate",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_requireTranslation",
			"name": "SOFe\\Libkinetic\\KineticManager::requireTranslation",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticManager",
			"fromLink": "SOFe/Libkinetic/KineticManager.html",
			"link": "SOFe/Libkinetic/KineticManager.html#method_resolveClass",
			"name": "SOFe\\Libkinetic\\KineticManager::resolveClass",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/KineticNode.html",
			"name": "SOFe\\Libkinetic\\KineticNode",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_create",
			"name": "SOFe\\Libkinetic\\KineticNode::create",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_hasComponent",
			"name": "SOFe\\Libkinetic\\KineticNode::hasComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_addComponent",
			"name": "SOFe\\Libkinetic\\KineticNode::addComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_getComponent",
			"name": "SOFe\\Libkinetic\\KineticNode::getComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_findComponentsByInterface",
			"name": "SOFe\\Libkinetic\\KineticNode::findComponentsByInterface",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_findFirstAncestorComponent",
			"name": "SOFe\\Libkinetic\\KineticNode::findFirstAncestorComponent",
			"doc": "&quot;Finds the first (closest, i.e. most indented) ancestor, including $this, with the provided component&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_getParser",
			"name": "SOFe\\Libkinetic\\KineticNode::getParser",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_getManager",
			"name": "SOFe\\Libkinetic\\KineticNode::getManager",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\KineticNode::setAttribute",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_setAttributeNS",
			"name": "SOFe\\Libkinetic\\KineticNode::setAttributeNS",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_startChild",
			"name": "SOFe\\Libkinetic\\KineticNode::startChild",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_startChildNS",
			"name": "SOFe\\Libkinetic\\KineticNode::startChildNS",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_endElement",
			"name": "SOFe\\Libkinetic\\KineticNode::endElement",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_acceptText",
			"name": "SOFe\\Libkinetic\\KineticNode::acceptText",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_resolve",
			"name": "SOFe\\Libkinetic\\KineticNode::resolve",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_init",
			"name": "SOFe\\Libkinetic\\KineticNode::init",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_isRoot",
			"name": "SOFe\\Libkinetic\\KineticNode::isRoot",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_getHierarchyName",
			"name": "SOFe\\Libkinetic\\KineticNode::getHierarchyName",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\KineticNode",
			"fromLink": "SOFe/Libkinetic/KineticNode.html",
			"link": "SOFe/Libkinetic/KineticNode.html#method_jsonSerialize",
			"name": "SOFe\\Libkinetic\\KineticNode::jsonSerialize",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/ParseException.html",
			"name": "SOFe\\Libkinetic\\ParseException",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\ParseException",
			"fromLink": "SOFe/Libkinetic/ParseException.html",
			"link": "SOFe/Libkinetic/ParseException.html#method_setMessage",
			"name": "SOFe\\Libkinetic\\ParseException::setMessage",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Parser",
			"fromLink": "SOFe/Libkinetic/Parser.html",
			"link": "SOFe/Libkinetic/Parser/JsonFileParser.html",
			"name": "SOFe\\Libkinetic\\Parser\\JsonFileParser",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Parser\\JsonFileParser",
			"fromLink": "SOFe/Libkinetic/Parser/JsonFileParser.html",
			"link": "SOFe/Libkinetic/Parser/JsonFileParser.html#method___construct",
			"name": "SOFe\\Libkinetic\\Parser\\JsonFileParser::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Parser\\JsonFileParser",
			"fromLink": "SOFe/Libkinetic/Parser/JsonFileParser.html",
			"link": "SOFe/Libkinetic/Parser/JsonFileParser.html#method_parse",
			"name": "SOFe\\Libkinetic\\Parser\\JsonFileParser::parse",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Parser\\JsonFileParser",
			"fromLink": "SOFe/Libkinetic/Parser/JsonFileParser.html",
			"link": "SOFe/Libkinetic/Parser/JsonFileParser.html#method_traverseNode",
			"name": "SOFe\\Libkinetic\\Parser\\JsonFileParser::traverseNode",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Parser",
			"fromLink": "SOFe/Libkinetic/Parser.html",
			"link": "SOFe/Libkinetic/Parser/KineticFileParser.html",
			"name": "SOFe\\Libkinetic\\Parser\\KineticFileParser",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Parser\\KineticFileParser",
			"fromLink": "SOFe/Libkinetic/Parser/KineticFileParser.html",
			"link": "SOFe/Libkinetic/Parser/KineticFileParser.html#method___construct",
			"name": "SOFe\\Libkinetic\\Parser\\KineticFileParser::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Parser\\KineticFileParser",
			"fromLink": "SOFe/Libkinetic/Parser/KineticFileParser.html",
			"link": "SOFe/Libkinetic/Parser/KineticFileParser.html#method_startElement",
			"name": "SOFe\\Libkinetic\\Parser\\KineticFileParser::startElement",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Parser\\KineticFileParser",
			"fromLink": "SOFe/Libkinetic/Parser/KineticFileParser.html",
			"link": "SOFe/Libkinetic/Parser/KineticFileParser.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Parser\\KineticFileParser::endElement",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Parser\\KineticFileParser",
			"fromLink": "SOFe/Libkinetic/Parser/KineticFileParser.html",
			"link": "SOFe/Libkinetic/Parser/KineticFileParser.html#method_flushBuffer",
			"name": "SOFe\\Libkinetic\\Parser\\KineticFileParser::flushBuffer",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Parser\\KineticFileParser",
			"fromLink": "SOFe/Libkinetic/Parser/KineticFileParser.html",
			"link": "SOFe/Libkinetic/Parser/KineticFileParser.html#method_parseText",
			"name": "SOFe\\Libkinetic\\Parser\\KineticFileParser::parseText",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Parser\\KineticFileParser",
			"fromLink": "SOFe/Libkinetic/Parser/KineticFileParser.html",
			"link": "SOFe/Libkinetic/Parser/KineticFileParser.html#method_getRoot",
			"name": "SOFe\\Libkinetic\\Parser\\KineticFileParser::getRoot",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Parser\\KineticFileParser",
			"fromLink": "SOFe/Libkinetic/Parser/KineticFileParser.html",
			"link": "SOFe/Libkinetic/Parser/KineticFileParser.html#method_getNamespace",
			"name": "SOFe\\Libkinetic\\Parser\\KineticFileParser::getNamespace",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Parser\\KineticFileParser",
			"fromLink": "SOFe/Libkinetic/Parser/KineticFileParser.html",
			"link": "SOFe/Libkinetic/Parser/KineticFileParser.html#method_parse",
			"name": "SOFe\\Libkinetic\\Parser\\KineticFileParser::parse",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Parser",
			"fromLink": "SOFe/Libkinetic/Parser.html",
			"link": "SOFe/Libkinetic/Parser/XmlFileParser.html",
			"name": "SOFe\\Libkinetic\\Parser\\XmlFileParser",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Parser\\XmlFileParser",
			"fromLink": "SOFe/Libkinetic/Parser/XmlFileParser.html",
			"link": "SOFe/Libkinetic/Parser/XmlFileParser.html#method___construct",
			"name": "SOFe\\Libkinetic\\Parser\\XmlFileParser::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Parser\\XmlFileParser",
			"fromLink": "SOFe/Libkinetic/Parser/XmlFileParser.html",
			"link": "SOFe/Libkinetic/Parser/XmlFileParser.html#method_parse",
			"name": "SOFe\\Libkinetic\\Parser\\XmlFileParser::parse",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Root",
			"fromLink": "SOFe/Libkinetic/Root.html",
			"link": "SOFe/Libkinetic/Root/RootComponent.html",
			"name": "SOFe\\Libkinetic\\Root\\RootComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Root\\RootComponent",
			"fromLink": "SOFe/Libkinetic/Root/RootComponent.html",
			"link": "SOFe/Libkinetic/Root/RootComponent.html#method_dependsComponents",
			"name": "SOFe\\Libkinetic\\Root\\RootComponent::dependsComponents",
			"doc": "&quot;Returns an iterator (usually a Generator) that iterates over the class names of the components that this component must also be used with.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Root\\RootComponent",
			"fromLink": "SOFe/Libkinetic/Root/RootComponent.html",
			"link": "SOFe/Libkinetic/Root/RootComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\Root\\RootComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Root\\RootComponent",
			"fromLink": "SOFe/Libkinetic/Root/RootComponent.html",
			"link": "SOFe/Libkinetic/Root/RootComponent.html#method_startChild",
			"name": "SOFe\\Libkinetic\\Root\\RootComponent::startChild",
			"doc": "&quot;Resolve a child element into a node with components. Returns null if this node name is not recognized by this component.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Root\\RootComponent",
			"fromLink": "SOFe/Libkinetic/Root/RootComponent.html",
			"link": "SOFe/Libkinetic/Root/RootComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\Root\\RootComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Root\\RootComponent",
			"fromLink": "SOFe/Libkinetic/Root/RootComponent.html",
			"link": "SOFe/Libkinetic/Root/RootComponent.html#method_getNamespace",
			"name": "SOFe\\Libkinetic\\Root\\RootComponent::getNamespace",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Root\\RootComponent",
			"fromLink": "SOFe/Libkinetic/Root/RootComponent.html",
			"link": "SOFe/Libkinetic/Root/RootComponent.html#method_getContCmd",
			"name": "SOFe\\Libkinetic\\Root\\RootComponent::getContCmd",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Util",
			"fromLink": "SOFe/Libkinetic/Util.html",
			"link": "SOFe/Libkinetic/Util/Await.html",
			"name": "SOFe\\Libkinetic\\Util\\Await",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Util",
			"fromLink": "SOFe/Libkinetic/Util.html",
			"link": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html",
			"name": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper",
			"doc": "&quot;Wrapper for a &lt;code&gt;{0: any, 1: any}[]&lt;\/code&gt; as ArrayAccess and Iterator. ArrayAccess methods have O(n) performance.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper",
			"fromLink": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html",
			"link": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html#method___construct",
			"name": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper",
			"fromLink": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html",
			"link": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html#method_valid",
			"name": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper::valid",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper",
			"fromLink": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html",
			"link": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html#method_rewind",
			"name": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper::rewind",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper",
			"fromLink": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html",
			"link": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html#method_key",
			"name": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper::key",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper",
			"fromLink": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html",
			"link": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html#method_current",
			"name": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper::current",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper",
			"fromLink": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html",
			"link": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html#method_next",
			"name": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper::next",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper",
			"fromLink": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html",
			"link": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html#method_offsetExists",
			"name": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper::offsetExists",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper",
			"fromLink": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html",
			"link": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html#method_offsetGet",
			"name": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper::offsetGet",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper",
			"fromLink": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html",
			"link": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html#method_offsetSet",
			"name": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper::offsetSet",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper",
			"fromLink": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html",
			"link": "SOFe/Libkinetic/Util/BinaryArrayWrapper.html#method_offsetUnset",
			"name": "SOFe\\Libkinetic\\Util\\BinaryArrayWrapper::offsetUnset",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic\\Util",
			"fromLink": "SOFe/Libkinetic/Util.html",
			"link": "SOFe/Libkinetic/Util/CallbackTask.html",
			"name": "SOFe\\Libkinetic\\Util\\CallbackTask",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Util\\CallbackTask",
			"fromLink": "SOFe/Libkinetic/Util/CallbackTask.html",
			"link": "SOFe/Libkinetic/Util/CallbackTask.html#method___construct",
			"name": "SOFe\\Libkinetic\\Util\\CallbackTask::__construct",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\Util\\CallbackTask",
			"fromLink": "SOFe/Libkinetic/Util/CallbackTask.html",
			"link": "SOFe/Libkinetic/Util/CallbackTask.html#method_onRun",
			"name": "SOFe\\Libkinetic\\Util\\CallbackTask::onRun",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/WindowComponent.html",
			"name": "SOFe\\Libkinetic\\WindowComponent",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\WindowComponent",
			"fromLink": "SOFe/Libkinetic/WindowComponent.html",
			"link": "SOFe/Libkinetic/WindowComponent.html#method_setAttribute",
			"name": "SOFe\\Libkinetic\\WindowComponent::setAttribute",
			"doc": "&quot;Apply an attribute to this component. Returns true if the attribute is consumed by this component, false otherwise.&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\WindowComponent",
			"fromLink": "SOFe/Libkinetic/WindowComponent.html",
			"link": "SOFe/Libkinetic/WindowComponent.html#method_endElement",
			"name": "SOFe\\Libkinetic\\WindowComponent::endElement",
			"doc": "&quot;Validates the element after all attributes and child elements have been resolved&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\WindowComponent",
			"fromLink": "SOFe/Libkinetic/WindowComponent.html",
			"link": "SOFe/Libkinetic/WindowComponent.html#method_resolve",
			"name": "SOFe\\Libkinetic\\WindowComponent::resolve",
			"doc": "&quot;Validates and resolves values that are only available in runtime context&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\WindowComponent",
			"fromLink": "SOFe/Libkinetic/WindowComponent.html",
			"link": "SOFe/Libkinetic/WindowComponent.html#method_getTitle",
			"name": "SOFe\\Libkinetic\\WindowComponent::getTitle",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\WindowComponent",
			"fromLink": "SOFe/Libkinetic/WindowComponent.html",
			"link": "SOFe/Libkinetic/WindowComponent.html#method_getSynopsis",
			"name": "SOFe\\Libkinetic\\WindowComponent::getSynopsis",
			"doc": "&quot;&quot;"
		},

		{
			"type": "Class",
			"fromName": "SOFe\\Libkinetic",
			"fromLink": "SOFe/Libkinetic.html",
			"link": "SOFe/Libkinetic/libkinetic.html",
			"name": "SOFe\\Libkinetic\\libkinetic",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\libkinetic",
			"fromLink": "SOFe/Libkinetic/libkinetic.html",
			"link": "SOFe/Libkinetic/libkinetic.html#method_isRaw",
			"name": "SOFe\\Libkinetic\\libkinetic::isRaw",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\libkinetic",
			"fromLink": "SOFe/Libkinetic/libkinetic.html",
			"link": "SOFe/Libkinetic/libkinetic.html#method_internalInit",
			"name": "SOFe\\Libkinetic\\libkinetic::internalInit",
			"doc": "&quot;&quot;"
		},
		{
			"type": "Method",
			"fromName": "SOFe\\Libkinetic\\libkinetic",
			"fromLink": "SOFe/Libkinetic/libkinetic.html",
			"link": "SOFe/Libkinetic/libkinetic.html#method_getNamespace",
			"name": "SOFe\\Libkinetic\\libkinetic::getNamespace",
			"doc": "&quot;&quot;"
		},


		// Fix trailing commas in the index
		{}
	];

	/** Tokenizes strings by namespaces and functions */
	function tokenizer(term){
		if(!term){
			return [];
		}

		var tokens = [term];
		var meth = term.indexOf('::');

		// Split tokens into methods if "::" is found.
		if(meth > -1){
			tokens.push(term.substr(meth + 2));
			term = term.substr(0, meth - 2);
		}

		// Split by namespace or fake namespace.
		if(term.indexOf('\\') > -1){
			tokens = tokens.concat(term.split('\\'));
		}else if(term.indexOf('_') > 0){
			tokens = tokens.concat(term.split('_'));
		}

		// Merge in splitting the string by case and return
		tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0, -1));

		return tokens;
	};

	root.Sami = {
		/**
		 * Cleans the provided term. If no term is provided, then one is
		 * grabbed from the query string "search" parameter.
		 */
		cleanSearchTerm: function(term){
			// Grab from the query string
			if(typeof term === 'undefined'){
				var name = 'search';
				var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
				var results = regex.exec(location.search);
				if(results === null){
					return null;
				}
				term = decodeURIComponent(results[1].replace(/\+/g, " "));
			}

			return term.replace(/<(?:.|\n)*?>/gm, '');
		},

		/** Searches through the index for a given term */
		search: function(term){
			// Create a new search index if needed
			if(!bhIndex){
				bhIndex = new Bloodhound({
					limit: 500,
					local: searchIndex,
					datumTokenizer: function(d){
						return tokenizer(d.name);
					},
					queryTokenizer: Bloodhound.tokenizers.whitespace
				});
				bhIndex.initialize();
			}

			results = [];
			bhIndex.get(term, function(matches){
				results = matches;
			});

			if(!rootPath){
				return results;
			}

			// Fix the element links based on the current page depth.
			return $.map(results, function(ele){
				if(ele.link.indexOf('..') > -1){
					return ele;
				}
				ele.link = rootPath + ele.link;
				if(ele.fromLink){
					ele.fromLink = rootPath + ele.fromLink;
				}
				return ele;
			});
		},

		/** Get a search class for a specific type */
		getSearchClass: function(type){
			return searchTypeClasses[type] || searchTypeClasses['_'];
		},

		/** Add the left-nav tree to the site */
		injectApiTree: function(ele){
			ele.html(treeHtml);
		}
	};

	$(function(){
		// Modify the HTML to work correctly based on the current depth
		rootPath = $('body').attr('data-root-path');
		treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
		Sami.injectApiTree($('#api-tree'));
	});

	return root.Sami;
})(window);

$(function(){

	// Enable the version switcher
	$('#version-switcher').change(function(){
		window.location = $(this).val()
	});


	// Toggle left-nav divs on click
	$('#api-tree .hd span').click(function(){
		$(this).parent().parent().toggleClass('opened');
	});

	// Expand the parent namespaces of the current page.
	var expected = $('body').attr('data-name');

	if(expected){
		// Open the currently selected node and its parents.
		var container = $('#api-tree');
		var node = $('#api-tree li[data-name="' + expected + '"]');
		// Node might not be found when simulating namespaces
		if(node.length > 0){
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
		source: function(q, cb){
			cb(Sami.search(q));
		}
	});

	// The selection is direct-linked when the user selects a suggestion.
	form.on('typeahead:selected', function(e, suggestion){
		window.location = suggestion.link;
	});

	// The form is submitted when the user hits enter.
	form.keypress(function(e){
		if(e.which == 13){
			$('#search-form').submit();
			return true;
		}
	});


});


