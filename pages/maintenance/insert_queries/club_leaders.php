<?php
// Include the access control script
include '../../../scripts/sub_process_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Leaders</title>
</head>
<body>
    <a href="../main.php">Go back</a>
    <h1>Club Leaders</h1> 

    <form method="post" action="../../../scripts/process_form.php">
        <input type="hidden" name="table_name" value="club_leaders">

        <label for="user_id">User Id:</label><br>
        <input type="text" id="user_id" name="user_id" required><br><br>

        <label for="club_id">Club Id:</label><br>
        <input type="text" id="club_id" name="club_id" required><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
