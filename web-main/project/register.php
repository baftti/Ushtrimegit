<?php
session_start();
// Include database connection
include_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Query to insert new user into database
    $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // User successfully registered, set session variables and redirect to dashboard
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        // Registration failed, redirect to registration page
        header("Location: register_page.php");
        exit();
    }
}
?>
