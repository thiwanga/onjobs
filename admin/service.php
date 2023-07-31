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
        <h2>Post a service</h2>
        <form action="php/add_service.php" method="post" enctype="multipart/form-data" style="width: 50%">

            <label for="title">Service Title:</label>
            <input type="text" name="title" required><br>

            <label for="category">Category:</label>
            <select name="category" required>
                <option value="CopyWriting">Copy Writing</option>
                <option value="DigitalMarketing">Digital Marketing</option>
                <option value="GraphicsDesign">Graphics & Design</option>
                <option value="LifeStyle">LifeStyle</option>
                <option value="LogoDesign">Logo Design</option>
                <option value="WebsiteProgramming">Website & Programming</option>
                <!-- Add more category options as needed -->
            </select><br>

            <label for="description">Description:</label>
            <textarea name="description" rows="5" required></textarea><br>

            <label for="image">Image:</label>
            <input type="file" name="image" accept="image/*" required><br>

            <label for="price">Price:</label>
            <input type="text" name="price" required><br>

            <input type="submit" value="Add Service">
        </form>
    </section>

    </main>
</body>
</html>
