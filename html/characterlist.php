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
    
        $stmt->close();
        $mysqli->close();
    
    ?>
   
    <script>
        $(document).ready(function() {
            $('.bi-x-lg').click(function() {
                var id = $(this).parent().attr('id').substring(1);
                confirmDelete(id);
            });
        }); 
   
         function confirmDelete(id) {
        if (confirm("Are you sure you want to delete character " + $('#c' + id).text() + "?")) {
            
            deleteCharacter(id);
        }
    }

    function deleteCharacter(id) {

        $.ajax({
            url: '../src/db/deleteCharacter.php',
            method: 'POST',
            data: { id: id },

            success: function(response) {
                $('#c' + id).remove();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
        </script>
    </ul>
</div>
</div>