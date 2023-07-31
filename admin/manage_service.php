<?php
    // Start a new session or resume the existing session
    session_start();

    // Check if the user is logged in (check for the existence of the 'email' session variable)
    if (!isset($_SESSION['email'])) {
        // If not logged in, redirect to the login page
        header("Location: signup.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS for dark/light theme -->
    <link id="theme-style" rel="stylesheet" href="css/light.css">
</head>
<body>
    <header role="banner">
        <h1>Admin Panel</h1>
        <ul class="utilities">
        <br>
        Welcome, <?php echo $_SESSION['email']; ?>! <a href="./php/logout.php">Logout</a>
    </ul>
    </header>

    <nav role='navigation'>
    <ul class="main">
        <li class="dashboard"><a href="admin_panel.php">Dashboard</a></li>
        <li class="edit"><a href="service.php">Add Service</a></li>
        <li class="write"><a href="manage_service.php">Manage Service</a></li>
        <li class="users"><a href="add_users.php">Add User</a></li>
        <li class="write"><a href="users.php">Manage Users</a></li>
    </ul>
    </nav>

    <main role="main">
    
    <section class="panel important" style="max-width:50%">
        <h2>Manage Service</h2>
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Search services...">
            <input type="submit" value="Search">
        </form>

        <?php
        // Include the database connection file
        require '../php/db_connection.php';

        // Pagination settings
        $results_per_page = 10;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $start_from = ($page - 1) * $results_per_page;

        // Retrieve service details from the database
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $sql = "SELECT * FROM services WHERE title LIKE '%$search%' OR category LIKE '%$search%' LIMIT $start_from, $results_per_page";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>Title</th><th>Category</th><th>Description</th><th>Price</th><th>Image</th><th>Action</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['title'] . '</td>';
                echo '<td>' . $row['category'] . '</td>';
                echo '<td>' . $row['description'] . '</td>';
                echo '<td>' . $row['price'] . '</td>';
                echo '<td><img src="uploads/' . $row['image'] . '" width="100"></td>';
                echo '<td><a href="./php/delete_service.php?id=' . $row['id'] . '">Delete</a></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "No services found.";
        }

        // Pagination links
        $sql = "SELECT COUNT(*) AS total FROM services WHERE title LIKE '%$search%' OR category LIKE '%$search%'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $total_pages = ceil($row['total'] / $results_per_page);

        echo '<div>';
        for ($i = 1; $i <= $total_pages; $i++) {
            echo '<a href="manage_service.php?page=' . $i . '">' . $i . '</a> ';
        }
        echo '</div>';

        // Close the database connection
        $conn->close();
        ?>
    </section>

    </main>
</body>
</html>
