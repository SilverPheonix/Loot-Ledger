            
            <div class="sidebar col-md-3">
                <div class = container>
                <label for="itemName"></label><input id="itemName" type="text" placeholder="Name des Items">
                <label for="itemColor"></label><input id="itemColor" type="color">
                <button onclick="addItem()">Add Item</button><br><hr><br>
                <div id="itemlist">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#battleaxe" style="color: blue">Battleaxe</a>
                        </div>
                        <div id="battleaxe" class="collapse">
                            <div class="card-body">
                                <div class="inventory-slot" data-slot="101"draggable="true">
                                    <img  width=100% src="../src/img/items/Battleaxe.jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#dagger" style="color: blue">Dagger</a>
                        </div>
                        <div id="dagger" class="collapse">
                            <div class="card-body">
                                <div class="inventory-slot" data-slot="102"draggable="true">
                                    <img  width=100% src="../src/img/items/Dagger1.jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#shield" style="color: blue">Shield</a>
                        </div>
                        <div id="shield" class="collapse">
                            <div class="card-body">
                                <div class="inventory-slot" data-slot="103"draggable="true">
                                    <img  width=100% src="../src/img/items/Shield.jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#shortsword" style="color: blue">Shortsword</a>
                        </div>
                        <div id="shortsword" class="collapse">
                            <div class="card-body">
                                <div class="inventory-slot" data-slot="104"draggable="true">
                                    <img  width=100% src="../src/img/items/Shortsword.jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#Spear" style="color: blue">Spear</a>
                        </div>
                        <div id="Spear" class="collapse">
                            <div class="card-body">
                                <div class="inventory-slot" data-slot="105"draggable="true">
                                    <img  width=100% src="../src/img/items/Spear.jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#Backpack" style="color: blue">Backpack</a>
                        </div>
                        <div id="Backpack" class="collapse">
                            <div class="card-body">
                                <div class="inventory-slot" data-slot="106"draggable="true">
                                    <img  width=100% src="../src/img/items/Backpack.jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#Shortbow" style="color: green">Shortbow</a>
                        </div>
                        <div id="Shortbow" class="collapse">
                            <div class="card-body">
                                <div class="inventory-slot" data-slot="107"draggable="true">
                                    <img  width=100% src="../src/img/items/Shortbow.jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#Longbow" style="color: green">Longbow</a>
                        </div>
                        <div id="Longbow" class="collapse">
                            <div class="card-body">
                                <div class="inventory-slot" data-slot="108"draggable="true">
                                    <img  width=100% src="../src/img/items/Longbow.jpeg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <a class="btn" data-bs-toggle="collapse" href="#Crossbow" style="color: green">Crossbow</a>
                        </div>
                        <div id="Crossbow" class="collapse">
                            <div class="card-body">
                                <div class="inventory-slot" data-slot="109"draggable="true">
                                    <img  width=100% src="../src/img/items/Crossbow.jpeg">
                                </div>
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