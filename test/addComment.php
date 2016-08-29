<?php
session_start();
//include "php/dbconnect.php";
include "dbconnect.php";
 //$sql = "INSERT INTO comments (comment, user) VALUES ('{$_POST['comment']}', '0');";    
$sql = "INSERT INTO Comments(`UserID`, `SongID`, `Comment`) VALUES ('1', '1', 'test');";    
 //if($dbh->exec($sql)){
 //    header("Location: index.php");
 //}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//mysql_query($sql);

?>