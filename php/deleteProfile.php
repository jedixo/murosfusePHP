<?php
session_start();
include "php/dbconnect.php";

echo $_SESSION[username];

$sql = "DELETE FROM users WHERE username='{$_SESSION['username']}';";
echo $sql;

if($dbh->exec($sql)){
    // echo "deleting user suceeded";
    $_SESSION[username] = null;
    header("Location: index.php");
}else{
    echo "deleting user failed";
}
?>