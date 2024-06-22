<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $strength = $_POST['strength'];
    
  
    require_once 'dbconfig.php';

    $sql = "INSERT INTO characters (user_id, name, strength) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("isi", $user_id, $name, $strength);

    if ($stmt->execute()) {
        echo "Character inserted successfully";
    } 
    else{
        echo "Error inserting character: " . $mysqli->error;
        }

    $stmt->close();
    $mysqli->close();
}
else{
    echo "Error: Invalid request method";
    }
?>
