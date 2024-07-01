<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
			.grid-stack { 
				background: #b3b3cc;
				width: 100%;
            	max-height: 100vh;
				border-radius:10px;
				margin: 5px;
				overflow: hidden;
			}
  			.grid-stack-item-content {
				text-align: center;
				padding: 5px;
				background-color: #3c3c44;
				border-radius:10px;
				border-color: white;
				border-width: 2px;
				border-style: solid;
				cursor: pointer;
			}
			.selected {
				background-color: #d3d3d3; /* Beispiel Farbe für den ausgewählten Zustand */
			}
			.center-button{
				text-align: center ;
				margin: auto;
				display: grid;
				justify-content: center;
			}
        </style>
		<link href="..\node_modules/gridstack/dist/gridstack.min.css" rel="stylesheet"/>
		<script src="..\node_modules/gridstack/dist/gridstack-all.js"></script>
		<title>RPG Inventory | Simple Character Inventory Design</title>
		<script defer src="../src/js/main.js"></script>
	</head>
	<body>
		<?php include "navbar.php";?>
		<main>
			<?php include "characterlist.php";?>

			<div class="character-inventory col-md-7 ">
				<h1>Loot Ledger</h1>
				
				<div>
				
			 	<div class="center-button">
				 	<h3 id="charactername"></h3>
					<button class="fantasy-button center-button" id ="getItems" >Save</button>

				</div>
					<div class="container-fluid"><style type="text/css" gs-style-id="gs-id-0"></style></div>
				</div>
			</div>
  
			</div>
			
				
			<?php include "itemlist.php";?>
			
				<script>
					$('#getItems').hide();
					$(document).ready(function() {
						$('.list-group-item, .first-list-group-item').on('click', function() {
							// Entferne die Klasse 'selected' von allen Listenelementen
							$('.list-group-item, .first-list-group-item').removeClass('selected');

							// Greife auf den strength-Wert zu
							let strengthValue = $(this).data('strength');
							console.log('Strength:', parseInt(strengthValue/2));

							// Optional: Verwende den strength-Wert weiter
							// Hier kannst du zusätzlichen Code hinzufügen, um den Wert weiterzuverarbeiten
							load_grid(parseInt(strengthValue/2), $(this).get(0).id);
							
							$('#getItems').show();
							
							$('#charactername').html($(this).data('name'));
							$('#charactername').data('c_id', $(this).get(0).id);
							//console.log($(this).data('name')+" "+$('#charactername').data('c_id'));
						});
						//Lädt die Items aus dem grid
						$('#getItems').on('click', function () {
							let items = grid.save();
							console.log("Grid items:", items);
							saveItems(items);
						});
					});
					
					//
					function saveItems(items){
						let c_id =$('#charactername').data('c_id');
						let c_name =$('#charactername').html;
						$.ajax({
								url: '../src/db/insertItems.php',
								method: 'POST',
								data: {
									character: c_id,
									item_list: items,

								},
								success: function() {
									console.log('Items uploaded successfully'+ c_name);
								},
								error: function(error) {
									console.error('Error uploading items:' + c_name, error);
								}
							});
						

					}
					// $(document).ready(function() {
					// 	$('.list-group-item').on('click', function() {
					// 		// Entferne die Klasse 'selected' von allen Listenelementen
					// 		$('.list-group-item').removeClass('selected');

					// 		// Greife auf den strength-Wert zu
					// 		let strengthValue = $(this).data('strength');
					// 		console.log('Strength:', parseInt(strengthValue/2));

					// 		// Optional: Verwende den strength-Wert weiter
					// 		// Hier kannst du zusätzlichen Code hinzufügen, um den Wert weiterzuverarbeiten
					// 		load_grid(parseInt(strengthValue/2));
					// 	});
					// });
					function load_grid(str, c_id){
						if (window.grid) {
							console.log("Destroying old grid");
							grid.destroy();
						}
						window.grid = GridStack.addGrid(document.querySelector('.container-fluid'),{
							cellHeight: 70,
							acceptWidgets: true,
							removable: '#trash', // drag-out delete class
							disableOneColumnMode: true,
							float: false,
							minRow: str, // Mindestanzahl der Zeilen
							maxRow: str,
						});
						
						GridStack.setupDragIn('.newWidget', { appendTo: 'body', helper: 'clone', scroll: false, noResize: true });
						grid.removeAll();
						let items = [];
						$.ajax({
								url: '../src/db/getItems.php',
								method: 'POST',
								dataType: "json",
								data: {
									character: c_id,

								},
								success: function(response) {
									console.log(response);
									for (var i = 0; i < response.length; i++) {
										items.push({x: response[i].x, y: response[i].y, w: response[i].w, h: response[i].h, content: response[i].value});
									}
									grid.load(items);
									grid.on('added removed change', function(e, items) {
										let str = '';
										items.forEach(function(item) { str += ' (x,y)=' + item.x + ',' + item.y; });
										console.log(e.type + ' ' + items.length + ' items:' + str );
									});
									// Begrenzung der Positionierung innerhalb des Grids
									grid.on('change', function (event, items) {
										items.forEach(function (item) {
											if (item.x + item.w > 12) {
												grid.update(item.el, { x: 12 - item.w });
											}
											if (item.y + item.h > str) {
												grid.update(item.el, { y: str - item.h });
											}
										});
									});	
								},
								error: function(error) {
									console.error('Error', error);
								}
							});
					}

					function createCharacter() {
						var characterName = prompt("Enter character name:");
						var characterStrength = prompt("Enter character strength:");
						if (characterName != null && characterName != "" && characterStrength != null && characterStrength != "") {
							
							var userId = <?php echo $_SESSION['id']; ?>;
							insert_character(userId, characterName, characterStrength);
						}
					}

					function insert_character(userId, characterName, characterStrength) {
						$.ajax({
								url: '../src/db/insertCharacter.php',
								method: 'POST',
								data: { 
									user_id: userId,
									name: characterName,
									strength: characterStrength
								},
								success: function() {
									console.log('Character uploaded successfully'+ userId + characterName + characterStrength);
									window.location.reload();
								},
								error: function(error) {
									console.error('Error uploading character:' + userId + characterName + characterStrength, error);
								}
							});
					}
				</script>
		</main>
	</body>
</html>
