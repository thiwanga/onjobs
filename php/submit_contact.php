<?php
// Include the database connection file
require 'db_connection.php';

// Retrieve form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];
$message = $_POST['message'];

// Prepare and execute the SQL query to insert the data into the database
$sql = "INSERT INTO contacts (name, phone, email, address, message) VALUES ('$name', '$phone', '$email', '$address', '$message')";

if ($conn->query($sql) === TRUE) {
    // Redirect the user to a thank you page
    header("Location: ../contact.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
