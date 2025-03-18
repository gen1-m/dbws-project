<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Details</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Spline+Sans+Mono&display=swap" rel="stylesheet">
  <style>
    /* Global Styles matching main.php */
    body {
      font-family: 'Spline Sans Mono', sans-serif;
      background-color: #f9f9f9;
      margin: 0;
      padding: 0;
      color: #333;
    }
    .container {
      max-width: 900px;
      margin: 50px auto;
      background-color: #fff;
      padding: 30px;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      color: #3d405b;
      margin-bottom: 20px;
    }
    p {
      font-size: 1.1em;
      margin: 10px 0;
    }
    .back-button {
      margin-top: 20px;
      display: inline-block;
      padding: 10px 15px;
      background-color: #3d405b;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    .back-button:hover {
      background-color: #2a2e38;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['table_name'])) {
        $table_name = $_GET['table_name'];

        if ($table_name != 'club_participants') {
            $id = $_GET['id'];
            $table_name_singular = substr_replace($table_name, "", -1);
        
            $sql = 'SELECT * FROM '. $table_name . ' WHERE ' . $table_name_singular .'_id = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
        } else {
            $user_id = $_GET['user_id'];
            $club_id = $_GET['club_id'];
        
            $sql = "SELECT * FROM $table_name WHERE user_id=? AND club_id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $user_id, $club_id);
            $stmt->execute();
        } 
        
        $result = $stmt->get_result(); // Fetch the result
        
        $row = $result->fetch_assoc(); // Fetch the data
        
        echo "<h1>Details:</h1>";
        if ($row) {
            foreach ($row as $key => $value) {
                echo "<p>" . htmlspecialchars($key) . ": " . htmlspecialchars($value) . "</p>";
            }
        } else {
            echo "<p>No record found</p>";
        }
        
        $stmt->close();
    }
    // Close the database connection
    $conn->close();
    ?>
    <a href="/pages/maintenance/main.php" class="back-button">Back</a>
  </div>
</body>
</html>
