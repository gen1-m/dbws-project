<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['table_name']) && isset($_GET['type_attributes'])) {
    $table_name = $_GET['table_name'];
    $type_attribute = $_GET['type_attributes'];
    $parts = explode('~', $type_attribute);
    $type = $parts[0];
    $attribute = $parts[1];
} else {
    echo "Invalid parameters.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Form</title>
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
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
    input, select {
      width: 100%;
      padding: 8px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
    button {
      display: inline-block;
      padding: 10px 15px;
      background-color: #3d405b;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    button:hover {
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
    <h1>Search Form</h1>
    <form method="get" action="search_results.php">
      <input type="hidden" name="table_name" value="<?php echo htmlspecialchars($table_name); ?>">
      <label for="<?php echo htmlspecialchars($attribute); ?>">
        <?php echo ucfirst(htmlspecialchars($attribute)); ?>:
      </label>
      <?php
      if ($type != 'select') {
          echo '<input type="' . htmlspecialchars($type) . '" id="' . htmlspecialchars($attribute) . '" name="' . htmlspecialchars($attribute) . '" required>';
      } else {
          echo '<select id="' . htmlspecialchars($attribute) . '" name="' . htmlspecialchars($attribute) . '" required>';
          echo '  <option value="private">Private</option>';
          echo '  <option value="public">Public</option>';
          echo '</select>';
      }
      ?>
      <button type="submit">Search</button>
    </form>
    <a href="/pages/maintenance/main.php" class="back-button">Back</a>
  </div>
</body>
</html>
