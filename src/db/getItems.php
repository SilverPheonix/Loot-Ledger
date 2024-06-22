<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $c_id = $_POST['character'];
    
    require_once 'dbconfig.php';

    $sql = "SELECT * FROM items where character_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $c_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $items = array();
    for($i= 0;$row = $result->fetch_object();$i++) {
        $items[$i] = $row;
    }
    echo json_encode($items);

    $stmt->close();
    $mysqli->close();
}
else{
    echo "Error: Invalid request method";
    }
?>
