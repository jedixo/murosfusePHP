<?php
session_start();
include "dbconnect.php";

//echo $_SESSION[username];
$deleteCommentsSQL = "DELETE FROM Comments WHERE UserID = $_SESSION[id];";
 if ($dbh->query($deleteCommentsSQL) === TRUE) {
    }
$findAdditionalTracks = "SELECT * FROM Songs WHERE UserID = $_SESSION[id];";
foreach ($dbh->query($findAdditionalTracks) as $row) {
    $deleteComments = "DELETE FROM Comments WHERE SongID = $row[ID];";
    $deleteAdditionalSQL = "DELETE FROM AditionalTracks WHERE SongID = $row[ID];";
    if ($dbh->query($deleteAdditionalSQL) === TRUE) {
    }
    if ($dbh->query($deleteComments) === TRUE) {
    }
}

$deleteSongsSQL = "DELETE FROM Songs WHERE UserID = $_SESSION[id];";
 if ($dbh->query($deleteSongsSQL) === TRUE) {
    }


$sql = "DELETE FROM users WHERE id = $_SESSION[id];";
//echo $sql;

if ($dbh->query($sql) === TRUE) {

    $_SESSION[username] = null;
    session_destroy();
    header("Location: ../index.php");
} else  {
    echo "failure";
}


?>