<div class="sidebar col-md-3">
    
    <div class = characters-container>
        <div class="center-buttons">
            <a href="#" class="create-character-button" onclick="createCharacter()">Create</a>
        </div>
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
                        if ($i == 0) {
                            // This is the first character, use a different background image
                            // echo("<li class='first-list-group-item' id='c".$row['id']."' data-strength='".$row['strength']."' class='top-list-background-img' style='background-image: url(\"../src/img/list-goup-styling/top-list.png\");'>".$row['name']."(".$row['strength'].")<i style='float:right;' class='bi bi-x-lg'></i><i style='float:right;' class='bi bi-pencil-square' ></i></li>");
                            echo "<li class='first-list-group-item top-list-background-img' id='".$row['id']."' data-name='".$row['name']."' data-strength='".$row['strength']."' style='background-image: url(\"../src/img/list-goup-styling/top-list.png\");'>";
                            echo "<div class='first-list-item-name'>".$row['name']."</div>";
                            // echo "<div class='first-list-item-strength-icons'>Strength - ".$row['strength']."<span><i class='bi bi-x-lg'></i><i class='bi bi-pencil-square'></i></span></div>";
                            echo "<div class='first-list-item-strength-icons'>Strength - ".$row['strength']." 
                            <span style='margin-left: 14px;'><i class='bi bi-x-lg' 
                            style='color: white; -webkit-text-stroke: 0.5px black; text-shadow: 0 0 1px #EAEAF1; font-size: 15px;'>
                            </i><i class='bi bi-pencil-square'
                             style='color: white; -webkit-text-stroke: 0.5px black; text-shadow: 0 0 1px #EAEAF1; font-size: 15px;'>
                            </i></span></div>";
                            echo "</li>";
                        } else {
                            // This is not the first character, use the same background image
                            // echo("<li class='list-group-item' id='c".$row['id']."' data-strength='".$row['strength']."' class='list-element-background-img' style='background-image: url(\"../src/img/list-goup-styling/list-element.png\");'>".$row['name']."(".$row['strength'].")<i style='float:right;' class='bi bi-x-lg'></i><i style='float:right;' class='bi bi-pencil-square' ></i></li>");
                            echo "<li class='list-group-item list-element-background-img' id='".$row['id']."' data-name='".$row['name']."' data-strength='".$row['strength']."' style='background-image: url(\"../src/img/list-goup-styling/list-element.png\");'>";
                            echo "<div class='list-item-name'>".$row['name']."</div>";
                            echo "<div class='list-item-strength-icons'>Strength - ".$row['strength']." 
                            <span style='margin-left: 14px;'><i class='bi bi-x-lg' 
                            style='color: white; -webkit-text-stroke: 0.5px black; text-shadow: 0 0 1px #EAEAF1; font-size: 15px;'>
                            </i><i class='bi bi-pencil-square'
                             style='color: white; -webkit-text-stroke: 0.5px black; text-shadow: 0 0 1px #EAEAF1; font-size: 15px;'>
                            </i></span></div>";
                            echo "</li>";

                        }
                    }
                } else {
                    echo("<p class=\"no-character-yet-message\" style='background-image: url(\"../src/img/list-goup-styling/top-list.png\");'>You haven't created any characters yet!</p>");
                }

                $stmt->close();
                $mysqli->close();
            ?>
            <script>
                $(document).ready(function() {
                    // Use event delegation to handle click events on dynamically added delete buttons
                    $('.list-group').on('click', '.bi-x-lg', function() {
                        var id = $(this).closest('li').attr('id');
                        confirmDelete(id);
                    });
                    // Link to charactereditor when clicking on the pencil icon
                    $('.list-group').on('click', '.bi-pencil-square', function() {
                        var id = $(this).closest('li').attr('id');
                        window.location.href = 'charactereditor.php?character_id=' + id;
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
                            $('#' + id).remove();
                            location.reload();
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