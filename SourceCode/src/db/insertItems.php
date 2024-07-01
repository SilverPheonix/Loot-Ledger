<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $c_id = $_POST['character'];
    $items = $_POST['item_list'];
    
    require_once 'dbconfig.php';

    $sql = "DELETE FROM items where character_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $c_id);
    $stmt->execute();

    foreach($items as $i){
        $sql = "INSERT INTO items (character_id, value, x,y,h,w) VALUES (?, ?, ?,?,?,?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("isiiii", $c_id, $i["content"], $i["x"], $i["y"],$i["h"], $i["w"]);

        if ($stmt->execute()) {
            echo "Item inserted successfully";
        } 
        else{
            echo "Error inserting items: " . $mysqli->error;
            }

    }

    $stmt->close();
    $mysqli->close();
}
else{
    echo "Error: Invalid request method";
    }
?>
