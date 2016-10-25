<?php
session_start();
include "php/dbconnect.php";
$user = $_POST['UserID'];

$song = $_POST['SongID'];
$comment = $_POST['Comment'];
$sql = "INSERT INTO Comments (`UserID`, `SongID`, `Comment`) VALUES ('$user','$song','$comment');";    
//$sql = "INSERT INTO Comments(`UserID`, `SongID`, `Comment`) VALUES ('1', '1', 'test');";    

if ($dbh->query($sql) === TRUE) {
    header("Location: home.php");
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    //echo $_POST['UserID'];
}
?>