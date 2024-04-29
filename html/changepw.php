<?php
session_start();
include '..\src\db\dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $new_password_repeat = $_POST['new_password_repeat'];

    // Check if all fields are filled
    if (empty($current_password) || empty($new_password) || empty($new_password_repeat)) {
        $_SESSION['message'] = 'All fields must be filled out';
    } else {
        // Check if new passwords match
        if ($new_password != $new_password_repeat) {
            $_SESSION['message'] = 'New passwords do not match';
        } else {
            // Check if current password is correct
            $query = "SELECT * FROM user WHERE u_username = ?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("s", $_SESSION['username']);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            $hashed_password = $user['u_pw'];

            if (password_verify($current_password, $hashed_password)) {
                // Current password is correct, update the password
                $stmt = $mysqli->prepare("UPDATE user SET u_pw = ? WHERE u_username = ?");
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt->bind_param("ss", $hashed_new_password, $_SESSION['username']);
                $stmt->execute();
                $stmt->close();
                $_SESSION['message'] = 'Password change successful';
                header("Location: profile.php");
            } else {
                // Current password is incorrect, show an error message
                $_SESSION['message'] = 'Current password is incorrect';
            }
        }
    }
    $mysqli->close(); // Close the database connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/reset.css">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>⚔️</text></svg>">
    <title>RPG Inventory | Change Password</title>
    <script defer src="../src/js/main.js"></script>
</head>
<body>
<?php include "navbar.php";?>
<div class="container">
    <?php
    if(isset($_SESSION['message'])) {
        if($_SESSION['message'] == 'Password change successful') {
            echo '<div class="success-message alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
        } else {
            echo '<div class="error-message alert alert-danger" role="alert">' . $_SESSION['message'] . '</div>';
            unset($_SESSION['message']);
        }
    }
    ?>
    <h2>Change Password</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <label for="current_password">Current Password:</label>
        <input type="password" id="current_password" name="current_password">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password">
        <label for="new_password_repeat">Repeat New Password:</label>
        <input type="password" id="new_password_repeat" name="new_password_repeat">
        <button type="submit">Change Password</button>
    </form>
</div>
</body>
</html>