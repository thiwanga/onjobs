<?php
    // Include the database connection file
    require 'db_connection.php';

    // Check if the service ID is provided
    if (isset($_GET['id'])) {
        $service_id = $_GET['id'];

        // Delete the service from the database
        $sql = "DELETE FROM services WHERE id = $service_id";
        if ($conn->query($sql) === TRUE) {
            // Redirect back to the manage_service.php page after deletion
            header("Location: ../manage_service.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
?>
