<?php
session_start();
include "php/dbconnect.php";

 $sql = "INSERT INTO comments (comment, user) VALUES ('{$_POST['comment']}', '0');";    
 if($dbh->exec($sql)){
     header("Location: index.php");
 }

?>