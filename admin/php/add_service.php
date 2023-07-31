<?php
    // Include the database connection file
    require 'db_connection.php';

    // Process the form data when the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $title = $_POST["title"];
        $category = $_POST["category"];
        $description = $_POST["description"];
        $image = $_FILES["image"]["name"];
        $temp_image = $_FILES["image"]["tmp_name"];
        $price = $_POST["price"];

        // Move the uploaded image to a folder (e.g., 'uploads') on the server
        $upload_dir = '../uploads/';
        move_uploaded_file($temp_image, $upload_dir . $image);

        // Insert the data into the "services" table
        $sql = "INSERT INTO services (title, category, description, image, price) VALUES ('$title', '$category', '$description', '$image', '$price')";

        if ($conn->query($sql) === TRUE) {
            echo "Service added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
?>
