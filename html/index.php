<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="../src/css/reset.css" />
		<link rel="stylesheet" href="../src/css/main.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
		<link
			rel="icon"
			href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>⚔️</text></svg>"
		/>
        <style>
            main {
                display: flex;
            }
        </style>
		<title>RPG Inventory | Simple Character Inventory Design</title>
		<script defer src="../src/js/main.js"></script>
	</head>
	<body>
		<?php include "navbar.php";?>
		<main>
			<?php include "characterlist.php";?>
			<div class="character-inventory col-md-6">
				<h1>Loot Ledger</h1>
				<div class="character-inventory-slots">
					<!--div class="inventory-slot" data-slot="0-1-10-11" draggable="true">⚔️</div-->
					<div class="inventory-slot" data-slot="0" draggable="true"></div>
					<div class="inventory-slot" data-slot="1" draggable="true"></div>
					<div class="inventory-slot" data-slot="2" draggable="true"></div>
					<div class="inventory-slot" data-slot="3" draggable="true"></div>
					<div class="inventory-slot" data-slot="4" draggable="true"></div>
					<div class="inventory-slot" data-slot="5" draggable="true"></div>
					<div class="inventory-slot" data-slot="6" draggable="true"></div>
					<div class="inventory-slot" data-slot="7" draggable="true"></div>
					<div class="inventory-slot" data-slot="8" draggable="true"></div>
					<div class="inventory-slot" data-slot="9" draggable="true"></div>
					<div class="inventory-slot" data-slot="10" draggable="true"></div>
					<div class="inventory-slot" data-slot="11" draggable="true"></div>
					<div class="inventory-slot" data-slot="12" draggable="true"></div>
					<div class="inventory-slot" data-slot="13" draggable="true"></div>
					<div class="inventory-slot" data-slot="14" draggable="true"></div>
					<div class="inventory-slot" data-slot="15" draggable="true"></div>
					<div class="inventory-slot" data-slot="16" draggable="true"></div>
					<div class="inventory-slot" data-slot="17" draggable="true"></div>
					<div class="inventory-slot" data-slot="18" draggable="true"></div>
					<div class="inventory-slot" data-slot="19" draggable="true"></div>
					<div class="inventory-slot" data-slot="20" draggable="true"></div>
					<div class="inventory-slot" data-slot="21" draggable="true"></div>
					<div class="inventory-slot" data-slot="22" draggable="true"></div>
					<div class="inventory-slot" data-slot="23" draggable="true"></div>
					<div class="inventory-slot" data-slot="24" draggable="true"></div>
					<div class="inventory-slot" data-slot="25" draggable="true"></div>
					<div class="inventory-slot" data-slot="26" draggable="true"></div>
					<div class="inventory-slot" data-slot="27" draggable="true"></div>
					<div class="inventory-slot" data-slot="28" draggable="true"></div>
					<div class="inventory-slot" data-slot="29" draggable="true"></div>
					<div class="inventory-slot" data-slot="30" draggable="true"></div>
					<div class="inventory-slot" data-slot="31" draggable="true"></div>
					<div class="inventory-slot" data-slot="32" draggable="true"></div>
					<div class="inventory-slot" data-slot="33" draggable="true"></div>
					<div class="inventory-slot" data-slot="34" draggable="true"></div>
					<div class="inventory-slot" data-slot="35" draggable="true"></div>
					<div class="inventory-slot" data-slot="36" draggable="true"></div>
					<div class="inventory-slot" data-slot="37" draggable="true"></div>
					<div class="inventory-slot" data-slot="38" draggable="true"></div>
					<div class="inventory-slot" data-slot="39" draggable="true"></div>
					<div class="inventory-slot" data-slot="40" draggable="true"></div>
					<div class="inventory-slot" data-slot="41" draggable="true"></div>
					<div class="inventory-slot" data-slot="42" draggable="true"></div>
					<div class="inventory-slot" data-slot="43" draggable="true"></div>
					<div class="inventory-slot" data-slot="44" draggable="true"></div>
					<div class="inventory-slot" data-slot="45" draggable="true"></div>
					<div class="inventory-slot" data-slot="46" draggable="true"></div>
					<div class="inventory-slot" data-slot="47" draggable="true"></div>
					<div class="inventory-slot" data-slot="48" draggable="true"></div>
					<div class="inventory-slot" data-slot="49" draggable="true"></div>
					<div class="inventory-slot" data-slot="50" draggable="true"></div>
					<div class="inventory-slot" data-slot="51" draggable="true"></div>
					<div class="inventory-slot" data-slot="52" draggable="true"></div>
					<div class="inventory-slot" data-slot="53" draggable="true"></div>
					<div class="inventory-slot" data-slot="54" draggable="true"></div>
					<div class="inventory-slot" data-slot="55" draggable="true"></div>
					<div class="inventory-slot" data-slot="56" draggable="true"></div>
					<div class="inventory-slot" data-slot="57" draggable="true"></div>
					<div class="inventory-slot" data-slot="58" draggable="true"></div>
					<div class="inventory-slot" data-slot="59" draggable="true"></div>
					<div class="inventory-slot" data-slot="60" draggable="true"></div>
					<div class="inventory-slot" data-slot="61" draggable="true"></div>
					<div class="inventory-slot" data-slot="62" draggable="true"></div>
					<div class="inventory-slot" data-slot="63" draggable="true"></div>
					<div class="inventory-slot" data-slot="64" draggable="true"></div>
					<div class="inventory-slot" data-slot="65" draggable="true"></div>
					<div class="inventory-slot" data-slot="66" draggable="true"></div>
					<div class="inventory-slot" data-slot="67" draggable="true"></div>
					<div class="inventory-slot" data-slot="68" draggable="true"></div>
					<div class="inventory-slot" data-slot="69" draggable="true"></div>
					<div class="inventory-slot" data-slot="70" draggable="true"></div>
					<div class="inventory-slot" data-slot="71" draggable="true"></div>
					<div class="inventory-slot" data-slot="72" draggable="true"></div>
					<div class="inventory-slot" data-slot="73" draggable="true"></div>
					<div class="inventory-slot" data-slot="74" draggable="true"></div>
					<div class="inventory-slot" data-slot="75" draggable="true"></div>
					<div class="inventory-slot" data-slot="76" draggable="true"></div>
					<div class="inventory-slot" data-slot="77" draggable="true"></div>
					<div class="inventory-slot" data-slot="78" draggable="true"></div>
					<div class="inventory-slot" data-slot="79" draggable="true"></div>
					<div class="inventory-slot" data-slot="80" draggable="true"></div>
					<div class="inventory-slot" data-slot="81" draggable="true"></div>
					<div class="inventory-slot" data-slot="82" draggable="true"></div>
					<div class="inventory-slot" data-slot="83" draggable="true"></div>
					<div class="inventory-slot" data-slot="84" draggable="true"></div>
					<div class="inventory-slot" data-slot="85" draggable="true"></div>
					<div class="inventory-slot" data-slot="86" draggable="true"></div>
					<div class="inventory-slot" data-slot="87" draggable="true"></div>
					<div class="inventory-slot" data-slot="88" draggable="true"></div>
					<div class="inventory-slot" data-slot="89" draggable="true"></div>
					<div class="inventory-slot" data-slot="90" draggable="true"></div>
					<div class="inventory-slot" data-slot="91" draggable="true"></div>
					<div class="inventory-slot" data-slot="92" draggable="true"></div>
					<div class="inventory-slot" data-slot="93" draggable="true"></div>
					<div class="inventory-slot" data-slot="94" draggable="true"></div>
					<div class="inventory-slot" data-slot="95" draggable="true"></div>
					<div class="inventory-slot" data-slot="96" draggable="true"></div>
					<div class="inventory-slot" data-slot="97" draggable="true"></div>
					<div class="inventory-slot" data-slot="98" draggable="true"></div>
					<div class="inventory-slot" data-slot="99" draggable="true"></div>
				</div>
			</div>
			<?php include "itemlist.php";?>
		</main>
	</body>
</html>
