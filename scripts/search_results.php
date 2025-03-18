<?php
include 'db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results</title>
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
    .result {
      display: block;
      padding: 10px 15px;
      background-color: #3d405b;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      margin: 10px 0;
      transition: background-color 0.3s ease;
      text-align: center;
    }
    .result:hover {
      background-color: #2a2e38;
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
        $get_keys = array_keys($_GET);
        $get_values = array_values($_GET);
        $table_name = $get_values[0];
        $attribute_name = $get_keys[1];
        $attribute_value = $get_values[1];

        $sql = "SELECT * FROM $table_name WHERE $attribute_name LIKE ?";
        $stmt = $conn->prepare($sql);
        
        // Add '%' before and after the attribute value for substring search
        $attribute_value = '%' . $attribute_value . '%';
        
        $param_type = "s";
        if (is_numeric($attribute_value)) {
            // If the attribute is numeric, bind it as an integer
            $param_type = "i";
        }
        
        // Bind the parameter
        $stmt->bind_param($param_type, $attribute_value);
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();

        // Fetch data from the result set
        if ($result->num_rows > 0) {
            echo "<h1>Results:</h1>";
            if ($table_name != 'club_participants') {
                while ($row = $result->fetch_assoc()) {
                    $table_name_singular = substr_replace($table_name, "", -1);
                    $id = $row[$table_name_singular . '_id'];
                    $href = "result_details.php?table_name=$table_name&id=$id";
                    echo "<a class=\"result\" href=\"$href\">" . htmlspecialchars($row[$attribute_name]) . "</a>";
                }
            } else {
                while ($row = $result->fetch_assoc()) {
                    $user_id = $row['user_id'];
                    $club_id = $row['club_id'];
                    $href = "result_details.php?table_name=$table_name&user_id=$user_id&club_id=$club_id";
                    echo "<a class=\"result\" href=\"$href\">" . htmlspecialchars($row[$attribute_name]) . "</a>";
                }
            }
        } else {
            echo "<h1>No results found for the given search criteria!</h1>";
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
