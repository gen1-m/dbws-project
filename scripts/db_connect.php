<?php
$hostname = "sql212.infinityfree.com";
$username = "if0_38483541"; 
$password = "Fuckdisshit27";
$database = "if0_38483541_defaultdb";
$port = 3306;

// Create connection
$conn = new mysqli($hostname, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}
?>
