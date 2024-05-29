<div class="sidebar col-md-3">
    <div class = container>
    
    <ul class="list-group">
    <?php
        include '..\src\db\dbconfig.php';
        $query = "SELECT * FROM characters where user_id=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("i",  $_SESSION['id']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows >0) {
            for($i=0; $i<$result->num_rows;$i++){
                $row= $result->fetch_assoc();
                echo("<li class='list-group-item' id='c".$row['id']."'>".$row['name']."(".$row['strength'].")<i style='float:right;' class='bi bi-x-lg'></i><i style='float:right;' class='bi bi-pencil-square' ></i></li>");
            }
            
        } else {
            echo("<p>You haven't created charcters yet!</p>");
        }
        // button to create a new character that links to createCharacter.php
        echo("<a href='createCharacter.php' class='btn btn-primary'>Create Character</a>");
            
        $stmt->close();
        $mysqli->close();
    
    ?>
    <script>
        </script>
    </ul>
</div>
</div>