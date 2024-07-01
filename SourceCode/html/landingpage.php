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
		<link
			rel="icon"
			href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>⚔️</text></svg>"
		/>
        <style>
            main {
                display: flex;
            }
        </style>
		<title>RPG Inventory</title>
		<script defer src="../src/js/main.js"></script>
    </head>
    <body>
        <?php include "navbar.php";?>
        <div class="character-inventory col-md-6">
            <br>
            <div class="row">
                <div class ="col-sm-12 col-md-6" style="padding:5%">
                    <h1>Welcome to Loot Ledger</h1><br><hr><br>
                    <p style="text-align:center;" >This RPG Inventory Management System allows users to create and manage inventories for their RPG characters conveniently over the internet. The size of these inventories dynamically adjusts based on the Strength Modifier of the character. The stronger the character, the more space available in the inventory. The inventory itself consists of a grid where the character's items can be placed. Each item has its own size (e.g., short sword: 1x2) and can be rotated to stack efficiently.</p>
                    <br><hr><br>
                    <div style="justify-content: center;" class="buttons">
                        <a href="register.php" class="button, fantasy-button">Register</a>
                        <a href="login.php" class="button, fantasy-button">Log in</a>
			        </div>
                </div>
                <div class ="col-sm-12 col-md-6">
                <br><br>
                    <p style="text-align:right; padding:5%"> 
                    <img width=100% src="../src/img/logo.jpeg" alt="Logo"></p>
                </div>
            </div>
        </div>
    </body>
</html>