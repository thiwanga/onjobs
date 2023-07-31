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

    <?php
        // Include the database connection file
        require './php/db_connection.php';

        // Fetch the number of registered users
        $sql_users = "SELECT COUNT(*) AS total_users FROM users";
        $result_users = $conn->query($sql_users);
        $row_users = $result_users->fetch_assoc();
        $total_users = $row_users['total_users'];

        // Fetch the number of services
        $sql_services = "SELECT COUNT(*) AS total_services FROM services";
        $result_services = $conn->query($sql_services);
        $row_services = $result_services->fetch_assoc();
        $total_services = $row_services['total_services'];

        // Close the database connection
        $conn->close();
    ?>

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
        <div class="row">
            <div class="col-md-3 col-sm-6 ">
                <div class="service-box">
                    <div class="service-icon yellow">
                        <div class="front-content">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <h3>Total Users</h3>
                            <p style="font-size:30px; color:red"><?php echo $total_users; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 ">
                <div class="service-box">
                    <div class="service-icon yellow">
                        <div class="front-content">
                        <i class="fa fa-user" aria-hidden="true"></i>
                            <h3>Total Services</h3>
                            <p style="font-size:30px; color:red"><?php echo $total_services; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="panel important">
        <a href="service.php"><input type="button" value="Add Service" class="box2"></a>
        <a href="manage_service.php"><input type="button" value="Manage Service" class="box2"></a>
        <a href="add_users.php"><input type="button" value="Add Users" class="box2"></a>
        <a href="users.php"><input type="button" value="Manage Users" class="box2"></a>
    </section>

    </main>
</body>
</html>
