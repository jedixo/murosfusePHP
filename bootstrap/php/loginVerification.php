<?php
session_start();
include "php/dbconnect.php";
    
//echo "hello world.";
    
$sql = "SELECT * FROM users WHERE username = '{$_POST['username']}';";    
//echo $sql;
$result = $dbh->query($sql);
//header("Location: www.google.com");
    foreach ($dbh->query($sql) as $row) {
//        header("Location: www.bing.com");
        print_r($row);
        echo "<br><br><br>username: " . $row[username] . " password: " . $row[password];
        echo "<br><br><br>username: " . $_POST[username] . " password: " . $_POST[password];
        if ($row[username] == $_POST['username']) {
            if ($row[password] == $_POST['password']) {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['id'] = $row[Id];
                header("Location: index.php");
            } else {
                echo "password is incorrect.";
            }
        } else {
            echo "user does not exist";
        }
    }
?>