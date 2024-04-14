<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/reset.css">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>⚔️</text></svg>">
    <style>
        main {
            display: flex;
        }
        .container {
            width: 600px;
            padding: 40px;
        }
    </style>
    <title>RPG Inventory | Register</title>
    <script defer src="../src/js/main.js"></script>
</head>
<body>
<nav>
    <div class="logo">
        <a href="index.php"><img src="../src/img/logo.jpeg" alt="Logo"></a>
    </div>
    <div class="buttons">
        <?php
        session_start();

        if (isset($_SESSION['username'])) {
            echo '<a href="logout.php" class="button">Logout</a>';
            echo '<a href="profile.php" class="button">Profile</a>';
        } else {
            echo '<a href="register.php" class="button">Register</a>';
            echo '<a href="login.php" class="button">Log in</a>';
        }
        ?>
    </div>
</nav>
<div class="container">
    <h2>Profil</h2>
    <form class="profile-form">
        <div class="form-fields">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <label for="email">E-Mail Adresse:</label>
            <input type="text" id="email" name="email">
            <button type="button" id="change-password-button">Change Password</button>
        </div>
        <div class="profile-image">
            <img id="current-profile-image" src="path_to_current_profile_image" alt="Current Profile Image">
            <label for="image-upload">Bild hochladen:</label>
            <input type="file" id="image-upload" name="image-upload">
        </div>
    </form>
</div>
</body>
</html>