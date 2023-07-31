<?php
// Include the database connection file
require 'db_connection.php';

// Start a new session or resume the existing session
session_start();

// Process the form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query to fetch the user with the provided username
    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $admin = $result->fetch_assoc();
        // Verify the password
        if ($password === $admin['password']) {
            // Password is correct, user is logged in
            $_SESSION['email'] = $email; // Store the username in the session
            header("Location: ../admin_panel.php");
            exit; // Terminate the script to prevent further output
        } else {
            // Password is incorrect
            echo "Invalid password!";
        }
    } else {
        // No user found with the provided username
        echo "admin not found!";
    }
}

// Close the database connection
$conn->close();
?>
