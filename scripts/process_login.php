<?php
// Start the session (if not already started)
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'admin') {
    // Redirect to a login page or display an error message
    header('Location: ../maintenance/login.php'); // Change 'login.php' to your actual login page
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Spline+Sans+Mono&display=swap" rel="stylesheet">
  <style>
    /* Global Styles */
    body {
      font-family: 'Spline Sans Mono', sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    /* Container for the main content */
    .main-container {
      max-width: 900px;
      margin: 20px auto;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }
    /* Styling for the welcome message */
    .welcome-message {
      text-align: center;
      margin-top: 20px;
      font-size: 18px;
      color: #333;
    }
    .welcome-message a {
      color: #3d405b;
      text-decoration: none;
      font-weight: bold;
    }
    .welcome-message a:hover {
      text-decoration: underline;
    }
    /* Username color styling */
    .username {
      color:rgb(0, 60, 255); /* Red color; change this to any color you prefer */
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="main-container">
    <?php
    // Include the main maintenance page content
    include '../pages/maintenance/main.php';
    ?>
    <div class="welcome-message">
      <p>Welcome, <span class="username"><?php echo $_SESSION['username']; ?></span>! <a href="logout.php">Logout</a></p>
    </div>
  </div>
</body>
</html>
