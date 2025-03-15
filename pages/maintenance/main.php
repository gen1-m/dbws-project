<?php
// Include the access control script
include '../../scripts/process_login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Maintenance</title>
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
    h2 {
      color: #3d405b;
      border-bottom: 2px solid #ddd;
      padding-bottom: 5px;
      margin-top: 40px;
    }
    ul {
      list-style: none;
      padding: 0;
    }
    li {
      margin: 10px 0;
    }
    a.insert_page, a.search_page {
      display: block;
      padding: 10px 15px;
      background-color: #3d405b;
      color: #fff;
      text-decoration: none;
      border-radius: 4px;
      transition: background-color 0.3s ease;
    }
    a.insert_page:hover, a.search_page:hover {
      background-color: #2a2e38;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Maintenance Page</h1>
    
    <h2>Insert Queries:</h2>
    <ul class="insert_pages">
      <li><a href="insert_queries/users.php" class="insert_page">Users</a></li>
      <li><a href="insert_queries/clubs.php" class="insert_page">Clubs</a></li>
      <li><a href="insert_queries/club_participants.php" class="insert_page">Club Participants</a></li>
      <li><a href="insert_queries/club_leaders.php" class="insert_page">Club Leaders</a></li>
      <li><a href="insert_queries/club_moderators.php" class="insert_page">Club Moderators</a></li>
      <li><a href="insert_queries/club_members.php" class="insert_page">Club Members</a></li>
      <li><a href="insert_queries/events.php" class="insert_page">Events</a></li>
      <li><a href="insert_queries/club_events.php" class="insert_page">Club Events</a></li>
      <li><a href="insert_queries/personal_events.php" class="insert_page">Personal Events</a></li>
      <li><a href="insert_queries/event_participants.php" class="insert_page">Event Participants</a></li>
      <li><a href="insert_queries/event_hosts.php" class="insert_page">Event Hosts</a></li>
      <li><a href="insert_queries/event_attendees.php" class="insert_page">Event Attendees</a></li>
    </ul>
    
    <h2>Search Queries:</h2>
    <ul class="search_pages">
      <li><a href="search_queries/users.php" class="search_page">Users</a></li>
      <li><a href="search_queries/clubs.php" class="search_page">Clubs</a></li>
      <li><a href="search_queries/events.php" class="search_page">Events</a></li>
      <li><a href="search_queries/club_participants.php" class="search_page">Club Participants</a></li>
    </ul>
  </div>
</body>
</html>
