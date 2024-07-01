<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    require_once 'dbconfig.php';
    $sql = "DELETE FROM items where character_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $sql = "DELETE FROM characters WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Character deleted successfully";
    } 
    else{
        echo "Error deleting character: " . $mysqli->error;
        }

    $stmt->close();
    $mysqli->close();
} 
else{
    echo "Error: Invalid request method";
    }
?>
