<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: projekt.php");
    exit();
}
header("Location: home.html");
?>
