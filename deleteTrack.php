<?php
session_start();
include("php/dbconnect.php");
//echo $_GET['song'];
//echo $_GET['comment'];
?>
<?php
//find out if comment has any replies
$sql = "DELETE FROM AditionalTracks WHERE ID = {$_GET[track]};";
$dbh->query($sql);
  header("Location: http://www.musofuseaustralia.com/songdetailed.php?id={$_GET[song]}");
?>