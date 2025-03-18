<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminUsername = 'admin';
    $adminPassword = 'admin'; 

    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($username === $adminUsername && $password === $adminPassword) {
        $_SESSION['username'] = $username;

        header('Location: main.php'); 
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Spline+Sans+Mono&display=swap" rel="stylesheet">
  <style>
    /* General Styles */
    body {
      font-family: 'Spline Sans Mono', sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 400px;
      margin: 100px auto;
      background-color: #fff;
      padding: 20px 30px;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    h2 {
      color: #3d405b;
      margin-bottom: 20px;
    }
    label {
      display: block;
      text-align: left;
      margin-bottom: 5px;
      color: #333;
    }
    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-sizing: border-box;
    }
    button {
      font-family: 'Spline Sans Mono', sans-serif;
      background-color: #3d405b;
      color: #fff;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 10px;
    }
    button:hover {
      background-color: #2a2e38;
    }

    a {
      text-decoration: none;
      color: white;
    }

  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    
    <?php if (isset($error_message)): ?>
      <p class="error" style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    
    <form method="post" action="">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit">Login</button>
    </form>

    <button>
      <a href="/index.html">Back Home</a>
    </button>
  </div>
</body>
</html>
