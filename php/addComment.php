<?php
session_start();
include "php/dbconnect.php";
$user = 1;
$song = 1;
$sql = "INSERT INTO Comments (`UserID`, `SongID`, `Comment`) VALUES ('$user','$song','{$_POST['comment']}');";    
//$sql = "INSERT INTO Comments(`UserID`, `SongID`, `Comment`) VALUES ('1', '1', 'test');";    

if ($dbh->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>