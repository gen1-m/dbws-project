<?php
// Start the session (if not already started)
session_start();

// Check if the user is logged in and is an admin
if (isset($_SESSION['username']) && $_SESSION['username'] === 'admin') {
    // User is logged in and is an admin, allow access to main.html
    include '../pages/maintenance/main.php';
} else {
    // Redirect to a login page or display an error message
    header('Location: ../maintenance/login.php'); // Change 'login.php' to your actual login page
    exit();
}
?>

<p>Welcome, <?php echo $_SESSION['username']; ?>! <a href="logout.php">Logout</a></p>
