<?php
session_start();
include("php/dbconnect.php");
//echo $_GET['song'];
//echo $_GET['comment'];
?>
<?php
//find out if comment has any replies
$sql = "DELETE FROM Inbox WHERE ID = {$_GET[message]};";
$dbh->query($sql);
header("Location: http://www.musofuseaustralia.com/inbox.php");
?>