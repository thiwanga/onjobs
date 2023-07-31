<?php
    // Start a new session or resume the existing session
    session_start();

    // Check if the user is logged in (check for the existence of the 'email' session variable)
    if (!isset($_SESSION['email'])) {
        // If not logged in, redirect to the login page
        header("Location: signup.php");
        exit;
    }

    function getTotalContacts()
{
    global $conn;
    $sql = "SELECT COUNT(*) as total FROM contacts";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['total'];
}

// Function to get contacts with pagination
function getContactsWithPagination($limit, $offset)
{
    global $conn;
    $sql = "SELECT * FROM contacts ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
    $result = $conn->query($sql);
    $contacts = array();
    while ($row = $result->fetch_assoc()) {
        $contacts[] = $row;
    }
    return $contacts;
}

    // Function to delete a contact
    function deleteContact($contact_id)
    {
        global $conn;
        $sql = "DELETE FROM contacts WHERE id = $contact_id";
        $conn->query($sql);
    }

    // Pagination
    $contactsPerPage = 10;
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $contactsPerPage;

    // Get total number of contacts
    $totalContacts = getTotalContacts();

    // Get contacts with pagination
    $contacts = getContactsWithPagination($contactsPerPage, $offset);

    // Handle contact deletion
    if (isset($_POST['delete'])) {
        $contactId = $_POST['contact_id'];
        deleteContact($contactId);
        header("Location: contact.php?page=$page");
        exit();
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
        <h2>Contact us</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contacts as $contact) : ?>
                    <tr>
                        <td><?php echo $contact['id']; ?></td>
                        <td><?php echo $contact['user_id']; ?></td>
                        <td><?php echo $contact['name']; ?></td>
                        <td><?php echo $contact['phone']; ?></td>
                        <td><?php echo $contact['email']; ?></td>
                        <td><?php echo $contact['address']; ?></td>
                        <td><?php echo $contact['message']; ?></td>
                        <td><?php echo $contact['created_at']; ?></td>
                        <td>
                            <form method="post" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                <input type="hidden" name="contact_id" value="<?php echo $contact['id']; ?>">
                                <button type="submit" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    </main>
</body>
</html>
