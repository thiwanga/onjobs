<?php
// Include the database connection file
require 'db_connection.php';

// Process the form data when the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        // Validate that the password and confirm_password match
        if ($password !== $confirm_password) {
            echo "Error: Passwords do not match!";
        } else {
            // Insert the data into the database
            $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "User added successful!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
$conn->close();
?>