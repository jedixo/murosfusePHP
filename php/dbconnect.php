<?php
$username = "jksjdf";
$password = "6MXkUZ[9@Wb9";
$dbname = "MusoFuseDB";
// Create connection
$dbh = new mysqli('localhost', $username, $password, $dbname);
// Check connection
if ($dbh->connect_error) {
    die("Connection failed: " . $dbh->connect_error);
} 
?>