<?php
session_start();
include("php/dbconnect.php");
//echo $_GET['song'];
//echo $_GET['comment'];
?>
<?php
//find out if comment has any replies
$sql = "DELETE FROM Comments WHERE ReplyID = {$_GET[comment]};";
$dbh->query($sql);
$sql = "DELETE FROM Comments WHERE ID = {$_GET[comment]};";
$dbh->query($sql);
$sql = "DELETE FROM Inbox WHERE CommentID = {$_GET[comment]};";
$dbh->query($sql);
  header("Location: http://www.musofuseaustralia.com/songdetailed.php?id={$_GET[song]}");
?>