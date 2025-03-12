<?php
// Start the session (if not already started)
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Hardcoded admin credentials (replace with your actual logic)
    $adminUsername = 'admin';
    $adminPassword = 'admin'; // You should hash and store passwords securely in a real-world scenario

    // Retrieve user input
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Check if the entered credentials match the admin account (replace with your actual logic)
    if ($username === $adminUsername && $password === $adminPassword) {
        // Set the username in the session to mark the user as logged in
        $_SESSION['username'] = $username;

        // Redirect to the main page
        header('Location: main.php'); // Change to the actual main page
        exit();
    } else {
        $error_message = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    
    <?php
    // Display error message, if any
    if (isset($error_message)) {
        echo '<p style="color: red;">' . $error_message . '</p>';
    }
    ?>

    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
