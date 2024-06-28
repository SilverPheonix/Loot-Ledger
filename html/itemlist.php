            
            <div class="sidebar col-md-3">
                <div class = container>
                    <div id="trash" style="padding: 5px; margin-bottom: 15px;" class="text-center ui-droppable ui-droppable-over">
						<div>
							<button class="fantasy-button">Drop here to remove!</button>
						</div>
					</div>
                    <div id="itemlist">
                        <div class="newWidget grid-stack-item ui-resizable-disabled" gs-x="1" gs-y="1" gs-w="3" gs-h="4" gs-name="Battleaxe" gs-no-resize="true">
                            <div class="grid-stack-item-content">
                                <div>
                                    <img class="item-img" src="../src/img/items/Battleaxe.jpeg" alt="Battleaxe">
                                    <span>Battleaxe</span>
                                </div>
                            </div>
                        </div>
                        <div class="newWidget grid-stack-item ui-resizable-disabled" gs-x="1" gs-y="1" gs-w="2" gs-h="2" gs-no-resize="true">
                            <div class="grid-stack-item-content">
                                <div>
                                    <img class="item-img" src="../src/img/items/Dagger1.jpeg" alt="Dagger">
                                    <span>Dagger</span>
                                </div>
                            </div>
                        </div>
                        <div class="newWidget grid-stack-item ui-resizable-disabled" gs-x="1" gs-y="1" gs-w="3" gs-h="3" gs-no-resize="true">
                            <div class="grid-stack-item-content">
                                <div>
                                    <img class="item-img" src="../src/img/items/Shield.jpeg" alt="Shield">
                                    <span>Shield</span>
                                </div>
                            </div>
                        </div>
                        <div class="newWidget grid-stack-item ui-resizable-disabled" gs-x="1" gs-y="1" gs-w="2" gs-h="3" gs-no-resize="true">
                            <div class="grid-stack-item-content">
                                <div>
                                    <img class="item-img" src="../src/img/items/Shortsword.jpeg" alt="Shortsword">
                                    <span>Shortsword</span>
                                </div>
                            </div>
                        </div>
                        <div class="newWidget grid-stack-item ui-resizable-disabled" gs-x="1" gs-y="1" gs-w="2" gs-h="3" gs-no-resize="true">
                            <div class="grid-stack-item-content">
                                <div>
                                    <img class="item-img" src="../src/img/items/Spear.jpeg" alt="Spear">
                                    <span>Spear</span>
                                </div>
                            </div>
                        </div>
                        <div class="newWidget grid-stack-item ui-resizable-disabled" gs-x="1" gs-y="1" gs-w="3" gs-h="3" gs-no-resize="true">
                            <div class="grid-stack-item-content">
                                <div>
                                    <img class="item-img" src="../src/img/items/Backpack.jpeg" alt="Backpack">
                                    <span>Backpack</span>
                                </div>
                            </div>
                        </div>
                        <div class="newWidget grid-stack-item ui-resizable-disabled" gs-x="1" gs-y="1" gs-w="2" gs-h="3" gs-no-resize="true">
                            <div class="grid-stack-item-content">
                                <div>
                                    <img class="item-img" src="../src/img/items/Shortbow.jpeg" alt="Shortbow">
                                    <span>Shortbow</span>
                                </div>
                            </div>
                        </div>
                        <div class="newWidget grid-stack-item ui-resizable-disabled" gs-x="1" gs-y="1" gs-w="2" gs-h="4" gs-no-resize="true">
                            <div class="grid-stack-item-content">
                                <div>
                                    <img class="item-img" src="../src/img/items/Longbow.jpeg" alt="Longbow">
                                    <span>Longbow</span>
                                </div>
                            </div>
                        </div>
                        <div class="newWidget grid-stack-item ui-resizable-disabled" gs-x="1" gs-y="1" gs-w="3" gs-h="3" gs-no-resize="true">
                            <div class="grid-stack-item-content">
                                <div>
                                    <img class="item-img" src="../src/img/items/Crossbow.jpeg" alt="Crossbow">
                                    <span>Crossbow</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>

                function addItem(){
                    var newItem = document.createElement("div");
                    var itemName = document.getElementById("itemName").value;
                    var itemColor = document.getElementById("itemColor").value;
                    newItem.textContent = itemName;
                    newItem.ClassName = "item";
                    newItem.style.color = itemColor;
                    var list = document.getElementById("itemlist");
                    list.insertBefore(newItem, list.childNodes[0]);
                }
            </script>