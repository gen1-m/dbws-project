<?php
// Include the access control script
include '../../../scripts/sub_process_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Club Participants</title>
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
      color: #333;
    }
    /* Container styling */
    .container {
      max-width: 600px;
      margin: 50px auto;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
    }
    /* Link styling */
    a {
      color: #3d405b;
      text-decoration: none;
      margin-bottom: 20px;
      display: inline-block;
    }
    a:hover {
      text-decoration: underline;
    }
    /* Heading styling */
    h1 {
      text-align: center;
      color: #3d405b;
      margin-bottom: 20px;
    }
    /* Form styling */
    form {
      display: flex;
      flex-direction: column;
    }
    select, input[type="text"], input[type="datetime-local"] {
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 16px;
      width: 100%;
      box-sizing: border-box;
    }
    button {
      background-color: #3d405b;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }
    button:hover {
      background-color: #2a2e38;
    }
  </style>
</head>
<body>
  <div class="container">
    <a href="../main.php">Go back</a>
    <h1>Club Participants</h1>
    <form method="get" action="../../../scripts/generate_form.php">
      <input type="hidden" name="table_name" value="club_participants">
      <select id="type_attributes" name="type_attributes" required>
        <option value="datetime-local~join_date">Join Date</option>
        <option value="number~user_id">User Id</option>
        <option value="number~club_id">Club Id</option>
      </select>
      <button type="submit">Select</button>
    </form>
  </div>
</body>
</html>
