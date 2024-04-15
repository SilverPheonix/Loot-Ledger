<div class="sidebar">
                <label for="itemName"></label><input id="itemName" type="text" placeholder="Name des Items">
                <label for="itemColor"></label><input id="itemColor" type="color">
                <button onclick="addItem()">Add Item</button>
                <div id="itemlist">
                    <div class="item" style="color: blue">Battleaxe</div>
                    <div class="item" style="color: blue">Dagger</div>
                    <div class="item" style="color: blue">Shield</div>
                    <div class="item" style="color: blue">Shortsword</div>
                    <div class="item" style="color: blue">Spear</div>
                    <div class="item" style="color: blue">Backpack</div>
                    <div class="item" style="color: green">Shortbow</div>
                    <div class="item" style="color: green">Longbow</div>
                    <div class="item" style="color: green">Crossbow</div>
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