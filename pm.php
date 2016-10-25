<?php
session_start();
include "php/dbconnect.php";

$inboxUsername = (isset($_POST['username']))? $_POST['username']:"";;
$inboxID;
$userID = $_SESSION['id'];
$message = $_POST['message'];
//$message = mysql_real_escape_string($message);

$findUserIDSQL = "SELECT id FROM users WHERE username = '$inboxUsername';";
foreach ($dbh->query($findUserIDSQL) as $user) {
    $inboxID = $user['id'];
    //echo $user;
}

$InboxSQL = "INSERT INTO Inbox (`InboxID`, `UserID`, `Type`, `IsRead`, `Message`) VALUES ('$inboxID','$userID',0,0,'$message') ;";
if ($dbh->query($InboxSQL) === TRUE) {
    $pages = $_SESSION['pages'];

    header("Location: $pages[1]");
} else {
    echo $InboxSQL ."<br>";
    echo $inboxUsername . "<br>";
    echo $findUserIDSQL . "<br>";
    echo $inboxID;
}
?>