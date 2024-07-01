<?php
$servername = "localhost";  // Usually "localhost" or an IP address
$username = "root";
$password = "";
$database = "lootledgerDB";

$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Set character set to utf8
$mysqli->set_charset("utf8");

?>