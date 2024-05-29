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
                width: 900px;
                padding: 40px;
            }
        </style>
        <title>RPG Inventory | Register</title>
        <script defer src="../src/js/main.js"></script>
    </head>
    <body>
    <?php include "navbar.php";
    include '..\src\db\dbconfig.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
    
        // Check if username or email has changed
        if ($username != $_SESSION['username'] || $email != $_SESSION['email']) {
            // Check if new username or email already exists in the database
            $result = NULL;
            //If both have changed we use another query
            if ($username != $_SESSION['username'] && $email != $_SESSION['email']) {
                $query = "SELECT * FROM user WHERE u_username = ? OR u_email = ?";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("ss", $username, $email);
                $stmt->execute();
                $result = $stmt->get_result();            
                $stmt->close();
            }
            //if only one has changed
            else{
                $query = "";
                $param = "";
                //if the username has changed
                if($username != $_SESSION['username']){
                    $query = "SELECT * FROM user WHERE u_username = ?";
                    $param = $username;
                }
                //if the email has changed
                else{
                    $query = "SELECT * FROM user WHERE u_email = ?";
                    $param = $email;
                }
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param("s", $param);
                $stmt->execute();
                $result = $stmt->get_result();            
                $stmt->close();
            }
            if ($result->num_rows > 0) {
                $_SESSION['message'] = 'Username or Email already exists';
            } else {
                // Update the username and email in the database
                $stmt = $mysqli->prepare("UPDATE user SET u_username = ?, u_email = ? WHERE u_id = ?");
                $stmt->bind_param("ssi", $username, $email, $_SESSION['id']);
                $stmt->execute();
                $stmt->close();
    
                // Update the session variables
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
    
                $_SESSION['message'] = 'Profile updated successfully';
            }
        }
        $mysqli->close(); // Close the database connection
    }
    ?>
    <div class="container">
        <?php
        if(isset($_SESSION['message'])) {
            if($_SESSION['message'] == 'Profile updated successfully') {
                echo '<div class="success-message alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';
                unset($_SESSION['message']);
            } else {
                echo '<div class="error-message alert alert-danger" role="alert">' . $_SESSION['message'] . '</div>';
                unset($_SESSION['message']);
            }
        }
        ?>
        <h3>Profil</h3>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <div class="form-fields">
                <div class="user-details">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>">
                    <label for="email">E-Mail Adresse:</label>
                    <input type="text" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
                    <div class="button-container">
                        <a href="#" class="fantasy-button" onclick="document.querySelector('form').submit();">Update Profile</a>
                        <a href="changepw.php" class="fantasy-button">Change Password</a>
                    </div>
                </div>
                <div class="profile-image-container">
                    <div class="profile-image">
                        <img id="current-profile-image" src="path_to_current_profile_image" alt="Current Profile Image">
                    </div>
                    <label for="image-upload">Bild hochladen:</label>
                    <input type="file" id="image-upload" name="image-upload">
                </div>
            </div>
        </form>
    </div>
    </body>
</html>
