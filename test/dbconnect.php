<?php
$username = "jksjdf";
$password = "6MXkUZ[9@Wb9";
$database = "MusoFuseDB";

$conn = new mysqli('localhost', $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>