<?php
    include '..\src\db\dbconfig.php';
    
    $name = $_POST['name'];
    $strength = $_POST['strength'];
    
    $query = "INSERT INTO characters (name, strength, user_id) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sii", $name, $strength, $_SESSION['id']);
    $stmt->execute();
    
    $stmt->close();
    $mysqli->close();
    
    header("Location: characterList.php"); // Redirect back to the character list
?>
