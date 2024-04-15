<?php
session_start();
include 'src\db\dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE u_username = ?";
    
    // Use prepared statements to prevent SQL injection
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify the password
        $user = $result->fetch_assoc();
        $hashed_password = $user['u_pw'];
        

        // Verify the entered password against the hashed password
        if (password_verify($password, $hashed_password)) {
            // Passwords match, set the session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['u_username'] = $user['u_username'];
            $_SESSION['u_role'] = $user['u_role'];
            $_SESSION['u_firstname'] = $user['u_firstname'];
            $_SESSION['u_lastname'] = $user['u_lastname'];
            $_SESSION['u_email'] = $user['u_email'];
            $_SESSION['u_title'] = $user['u_title'];    
            $_SESSION['u_gender'] = $user['u_gender'];
            $_SESSION['u_id'] = $user['u_id'];

            $stmt->close();
            $mysqli->close();

            // Redirect to a new page based on the user role
            if ($_SESSION["u_role"] == "user" || $_SESSION["u_role"] == "admin") {
                header("Location: index.php");
                exit;
            }
        } else {
            // Passwords don't match, show an error message
            $_SESSION['message'] = 'Login failed, Passwords don\'t match';
        }
    } else {
        // User not found, show an error message
        $_SESSION['message'] = 'Login failed, Username not found';
    }

    $stmt->close();
    $mysqli->close();

    if (isset($_SESSION["loggedin"]) && isset($_SESSION["username"]) && isset($_SESSION["role"])) {
        // Redirect to a new page based on the user role
        if ($_SESSION["role"] == "user") {
            header("Location: index.php");
        } else if ($_SESSION["role"] == "admin") {
            header("Location: index.php");
        }
        exit;
    }
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
        <title>RPG Inventory | Login</title>
        <script defer src="../src/js/main.js"></script>
    </head>
    <body>
        <main>
            <?php include "navbar.php";?>
            <div class="container">
                <h2>Login</h2>
                <form>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    <button type="submit">Login</button>
                </form>
            </div>
        </main>
        <footer>
            <p>&copy; <?php echo date("Y"); ?> Loot Ledger</p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>