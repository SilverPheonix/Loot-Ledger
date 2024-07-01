<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/reset.css">
    <link rel="stylesheet" href="../src/css/main.css">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>⚔️</text></svg>">
    <title>RPG Inventory | Change Password</title>
    <script defer src="../src/js/main.js"></script>
</head>
<body>
<?php include "navbar.php";?>
<?php
include '..\src\db\dbconfig.php';

$character_name = '';
$strength_score = '';
$notes = '';

// Fetch the current character data when the page loads
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $stmt = $mysqli->prepare("SELECT * FROM characters WHERE id = ?");
    $stmt->bind_param("i", $_GET['character_id']);
    $_SESSION ['character_id'] = $_GET['character_id'];
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $character_name = $row['name'];
        $strength_score = $row['strength'];
        $notes = $row['notes'];
        $creation_date = $row['creation_date'];
    }
    $stmt->close();
}

// Update the character data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['save_changes'])) {
        $character_name = $_POST['character_name'];
        $strength_score = $_POST['strength_score'];
        $notes = !empty($_POST['notes']) ? $_POST['notes'] : NULL; // Set notes to NULL if empty

        if (empty($character_name) || empty($strength_score)) {
            $_SESSION['message'] = 'Character name and strength score are required fields';
        } else {
            $stmt = $mysqli->prepare("UPDATE characters SET name = ?, strength = ?, notes = ? WHERE id = ?");
            $stmt->bind_param("sisi", $character_name, $strength_score, $notes, $_SESSION['character_id']);
            $stmt->execute();
            $_SESSION['message'] = 'Character updated successfully';
            $stmt->close();
            header("Location: index.php");
        }
    } else if (isset($_POST['discard_changes'])) {
        header("Location: index.php");
    }

    $mysqli->close();
}
?>
<div class="container">
    <h2>Edit Character</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

        <div class="form-group" style="text-align: center">
            <label for="character_name">Character Name</label>
            <input type="text" class="form-control" id="character_name" name="character_name" value="<?php echo $character_name; ?>" required>
            <label for='strength_score_selector'>Strength Score:</label>
            <select  id='strength_score_selector' name='strength_score' style="display: inline-block"></select>
            <label for="notes">Extra Notes:</label>
            <textarea class="form-fields" id="notes" name="notes" rows="6" cols="38" style="resize: vertical; margin-bottom: 10px"><?php echo $notes; ?></textarea>
            <button type="submit" name="save_changes" class="btn btn-primary" style="display: inline-block;">Save Changes</button>
            <button type="submit" name="discard_changes" class="btn btn-secondary" style="display: inline-block; margin-left: 10px;">Discard Changes</button>
        </div>
        <script>
            window.onload = function() {
                var select = document.getElementById("strength_score_selector");
                for(var i = 1; i <= 30; i++) {
                    var option = document.createElement("option");
                    option.value = i;
                    option.text = i;
                    if (i === <?php echo $strength_score; ?>) {
                        option.selected = true;
                    }
                    select.appendChild(option);
                }
            }
        </script>
    </form>
</div>
</body>
</html>