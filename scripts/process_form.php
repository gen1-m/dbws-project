<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Process Form Result</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Spline+Sans+Mono&display=swap" rel="stylesheet">
  <style>
    /* Global Styles - matching main.php */
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
      text-align: center;
      font-size: 1.1em;
    }
    a.insert_page, a.search_page {
      display: inline-block;
      padding: 10px 15px;
      background-color: #3d405b;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
      margin-top: 20px;
    }
    a.insert_page:hover, a.search_page:hover {
      background-color: #2a2e38;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    // Process form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $table_name = $_POST["table_name"]; // Selected table name

        // Define a mapping of tables to columns
        $table_columns = [
            "users" => ["username", "password"],
            "clubs" => ["club_size", "club_name", "club_desc"],
            "club_participants" => ["join_date", "user_id", "club_id"],
            "club_leaders" => ["user_id", "club_id"],
            "club_moderators" => ["user_id", "club_id"],
            "club_members" => ["user_id", "club_id"],
            "events" => ["event_size", "event_name", "event_desc", "event_privacy", "event_time"],
            "club_events" => ["event_id", "club_id"],
            "personal_events" => ["user_id", "event_id"],
            "event_participants" => ["user_id", "event_id"],
            "event_hosts" => ["user_id", "event_id"],
            "event_attendees" => ["user_id", "club_id"],
        ];

        // Validate the table name to prevent potential security issues
        if (!array_key_exists($table_name, $table_columns)) {
            echo "<p>Invalid table name</p>";
            exit;
        }

        // Get column names for the selected table
        $columns = $table_columns[$table_name];

        // Prepare placeholders for the query
        $placeholders = implode(", ", array_fill(0, count($columns), "?"));

        // Build the SQL query dynamically
        $sql = "INSERT INTO $table_name (" . implode(", ", $columns) . ") VALUES ($placeholders)";

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare($sql);

        // Check if the prepare() succeeded
        if (!$stmt) {
            echo "<p>Error: " . $conn->error . "</p>";
            exit;
        }

        // Bind parameters dynamically
        $bindParams = array("");
        foreach ($columns as $col) {
            $bindParams[0] .= "s";
            $bindParams[] = &$_POST[$col];
        }
        call_user_func_array(array($stmt, 'bind_param'), $bindParams);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<h1>Data Added Successfully</h1>";
        } else {
            echo "<h1>Error: " . $stmt->error . "</h1>";
        }
            
        $stmt->close();
    }
    // Close the database connection
    $conn->close();
    ?>

    <p><a href="/pages/maintenance/main.php" class="insert_page">Back</a></p>
  </div>
</body>
</html>
