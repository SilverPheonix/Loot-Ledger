
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
            <?php include "navbar.php";
            include '..\src\db\dbconfig.php';
            
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
                        $_SESSION['username'] = $user['u_username'];
                        $_SESSION['firstname'] = $user['u_firstname'];
                        $_SESSION['lastname'] = $user['u_lastname'];
                        $_SESSION['email'] = $user['u_email'];
                        $_SESSION['id'] = $user['u_id'];
            
                        $stmt->close();
                        $mysqli->close();
                        header("Location: index.php");
                        $_SESSION['message'] = 'Login successful';
                        exit;
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
            }
            
            ?>
           
            <div class="container">
                    <?php
                        if(isset($_SESSION['message'])) {
                            if($_SESSION['message'] == 'Login successful') {
                                echo '<div class="success-message alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';
                                unset($_SESSION['message']);
                            } else {
                                echo '<div class="error-message alert alert-danger" role="alert">' . $_SESSION['message'] . '</div>';
                                unset($_SESSION['message']);
                            }
                        }
                    ?>
                <h2>Login</h2>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    <div class="center-buttons">
                        <a href="#" onclick="document.forms[0].submit();" class="fantasy-button">Login</a>
                    </div>
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