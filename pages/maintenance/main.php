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
</head>
<body>
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
</body>
</html>
