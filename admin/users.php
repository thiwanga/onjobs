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
    
    <section class="panel important">
        <h2>Manage Registered Users</h2>
        <!-- User Search Section -->
        <div class="container mt-3">
            <form action="users.php" method="get" class="form-inline">
                <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search Users">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

        <!-- User Details Section -->
        <div class="container mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include the database connection file
                    require '../php/db_connection.php';

                    // Initialize variables
                    $limit = 10;
                    $page = (isset($_GET['page']) && $_GET['page'] > 0) ? $_GET['page'] : 1;
                    $start = ($page - 1) * $limit;
                    $search = isset($_GET['search']) ? $_GET['search'] : '';

                    // Fetch users based on the search and pagination
                    $sql = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%' LIMIT $start, $limit";
                    $result = $conn->query($sql);

                    // Display user details
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo '<td><a href="php/delete_user.php?id=' . $row['id'] . '">Delete</a></td>';
                        echo "</tr>";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </tbody>
            </table>

            <!-- Pagination Links -->
            <?php
            // Get total number of users

            require '../php/db_connection.php';

            $sql = "SELECT COUNT(*) AS total FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
            $result = $conn->query($sql);
            $data = $result->fetch_assoc();
            $total_records = $data['total'];
            $total_pages = ceil($total_records / $limit);

            // Display pagination links
            if ($total_pages > 1) {
                echo '<ul class="pagination justify-content-center mt-3">';
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo '<li class="page-item"><a class="page-link" href="users.php?page=' . $i . '">' . $i . '</a></li>';
                }
                echo '</ul>';
            }
            ?>
        </div>

        <!-- Optional: Add the Bootstrap JS link (for dropdown menus) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </section>

    </main>
</body>
</html>
