<?php
session_start();
// Include database connection
include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query to check if user exists
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // User exists, set session variables and redirect to dashboard
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        // User doesn't exist or incorrect credentials, redirect to login page
        header("Location: index.php");
        exit();
    }
}
?>
