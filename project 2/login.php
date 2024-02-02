<?php
session_start();
include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: index.php");
        exit();
    }
}
?>
