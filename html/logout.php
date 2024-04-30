<?php
session_start();
unset($_SESSION['loggedin']);
unset($_SESSION['message']);
header('Location: index.php');
exit;