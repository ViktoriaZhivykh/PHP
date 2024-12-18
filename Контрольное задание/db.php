<?php
$servername = "localhost";
$username = "root"; 
$password = "mypass"; 
$db = "task_manager"; 
$host = '127.0.0.1';
$port = 3306;

$conn = new mysqli(hostname: $servername, username: $username, password: $password, database: $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>