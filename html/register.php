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
        </style>
        <title>RPG Inventory | Register</title>
        <script defer src="../src/js/main.js"></script>
    </head>
    <body>
        <main>
            <?php include "navbar.php";
            include '..\src\db\dbconfig.php';

            // define variables asnd set to empty values
            $fname = $lname = $email = $username = $password = $password_repeat = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $fname = test_input($_POST["fname"]);
                $lname = test_input($_POST["lname"]);
                $email = test_input($_POST["email"]);
                $username = test_input($_POST["username"]);
                $password = test_input($_POST["password"]);
                $password_repeat = test_input($_POST["password_repeat"]);
            
                // Check if all fields are filled
                if (empty($fname) || empty($lname) || empty($email) || empty($password) || empty($password_repeat) || empty($username)) {
                    $_SESSION['message'] = 'All fields must be filled out';
                } else {
                    // Check if passwords match
                    if ($password != $password_repeat) {
                        $_SESSION['message'] = 'Passwords do not match';
                    } else {
                        // Check if email is valid
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $_SESSION['message'] = 'Invalid email format';
                        } else {
                            // Check if both username and email are unique
                            $stmt = $mysqli->prepare("SELECT * FROM user WHERE u_username = ? OR u_email = ?");
                            $stmt->bind_param("ss", $username, $email);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $stmt->close();
            
                            if ($result->num_rows > 0) {
                                $_SESSION['message'] = 'Username or Email already exists';
                            } else {
                                $stmt = $mysqli->prepare("INSERT INTO user (u_firstname, u_lastname, u_role, u_pw, u_status, u_email, u_username) VALUES (?, ?, 'user', ?, 1, ?, ?)");
                                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
                                $stmt->bind_param("sssss", $fname, $lname, $hashed_password, $email, $username);
                                $stmt->execute();
                                $_SESSION['id'] = $stmt->insert_id;
                                $stmt->close();
                                $_SESSION['loggedin'] = true;
                                $_SESSION['username'] = $username;
                                $_SESSION['firstname'] =$fname;
                                $_SESSION['lastname'] = $lname;
                                $_SESSION['email'] = $email;
                                $_SESSION['message'] = 'Registration successful';
                                header("Location: index.php");
                            }
                        }
                    }
                }
                $mysqli->close(); // Close the database connection
            }
            function test_input($data)
            {
                global $mysqli;
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
            
            <div class="container">
            <div class="row justify-content-center">
                <h2>Register</h2>
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                    <?php
                        if(isset($_SESSION['message'])) {
                            if($_SESSION['message'] == 'Registration successful') {
                                echo '<div class="success-message alert alert-success" role="alert">' . $_SESSION['message'] . '</div>';
                                unset($_SESSION['message']);
                            } else {
                                echo '<div class="error-message alert alert-danger" role="alert">' . $_SESSION['message'] . '</div>';
                                unset($_SESSION['message']);
                            }
                        }
                    ?>
                    <div class="form-margin form-group"> 
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Firstname" alt="Please enter your firstname" required>
                    </div>
                    <div class="form-group form-margin">
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Surname" alt="Please enter your surname"required>
                    </div>
                    <div class="form-group form-margin">
                        <input type="text" class="form-control" id="email" name="email" placeholder="E-Mail" alt="Please enter your E-Mail"required>
                    </div>
                    <div class="form-group form-margin">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" alt="Please enter your Username" required>
                    </div>
                    <div class="form-group form-margin">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" alt="Please enter your password" required>
                    </div>
                    <div class="form-group form-margin">
                        <input type="password" class="form-control" id="password_repeat" name="password_repeat" placeholder="Confirm Password" alt="Please confirm your password" required>
                    </div>
                    <button type="submit" onclick="return logFormData();" class="fantasy-button-reg">Register</button>
                </form>
            </div>
            </div>
        </main>
        <footer>
            <p>&copy; <?php echo date("Y"); ?> Loot Ledger</p>
        </footer>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
        function logFormData(event) {
            event.preventDefault(); // prevent form submission
            var fname = document.getElementById('fname').value;
            var lname = document.getElementById('lname').value;
            var email = document.getElementById('email').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            console.log('First Name: ' + fname);
            console.log('Last Name: ' + lname);
            console.log('Email: ' + email);
            console.log('Username: ' + username);
            console.log('Password: ' + password);

            return false; // prevent form submission
        }
        </script>
    </body>
</html>