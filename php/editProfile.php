<?php
session_start();
include "php/dbconnect.php";

echo $_SESSION[username];

$sql = "UPDATE users SET email='{$_POST['email']}', password='{$_POST['password']}', username='{$_POST['username']}', firstname='{$_POST['firstname']}', lastname='{$_POST['lastname']}', DOB='{$_POST['DOB']}' where username='{$_SESSION['username']}';";
echo $sql;

if($dbh->exec($sql)){
    // echo "deleting user suceeded";
    $_SESSION[username] = $_POST[username];
    header("Location: index.php");
}else{
    echo "updating user failed";
}
?>