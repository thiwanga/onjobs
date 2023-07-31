<?php
    // Include the database connection file
    require '../php/db_connection.php';

    // Check if the user ID is provided
    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];

        // Delete the user from the database
        $sql = "DELETE FROM users WHERE id = $user_id";
        if ($conn->query($sql) === TRUE) {
            // Redirect back to the users.php page after deletion
            header("Location: ../users.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
?>
