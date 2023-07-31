<?php
    // Start a new session or resume the existing session
    session_start();

    // Clear all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect the user to the login page after logout
    header("Location: ../signup.php");
    exit;
?>