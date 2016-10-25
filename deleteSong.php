<?php
session_start();
include "php/dbconnect.php";

$pages = $_SESSION['pages'];

//echo $_SESSION[username];
//delete comments
//delete additional tracks
//delete song

$deleteComments = "DELETE FROM Comments WHERE SongID = $_GET[id];";
if ($dbh->query($deleteComments) === TRUE) {
}

$deleteAdditioal = "DELETE FROM AditionalTracks WHERE SongID = $_GET[id];";
if ($dbh->query($deleteAdditioal) === TRUE) {
}

$deleteSong = "DELETE FROM Songs WHERE ID = $_GET[id]";
if ($dbh->query($deleteSong) === TRUE) {
    header("Location: $pages[0]");
} else  {
    echo "failure";
}


?>