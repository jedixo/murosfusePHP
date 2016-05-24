<?php
session_start();
include "php/dbconnect.php";
    
// echo "hello world.";

// print_r($_POST);

if($_POST[password1] == $_POST[password2]){
    // echo "passwords match";
    $sql = "INSERT INTO users (email, password, username, firstname, lastname, DOB, isAdmin) VALUES ('{$_POST['email']}', '{$_POST['password1']}', '{$_POST['username']}', '{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['DOB']}', '0');";    
    echo $sql;
    if($dbh->exec($sql)){
        $_SESSION['username'] = $_POST['username'];
        header("Location: index.html");
        echo "database exec worked";
    }else{
        echo "database exec failed";
    }
}else{
    echo "passwords do not match";
}
?>