<?php
session_start();
include "php/dbconnect.php";


$inboxID;
$user = $_POST['UserID'];
$song = $_POST['SongID'];
$type = 1;

if (isset($_POST['ReplyID'])) {
    $replyid = $_POST['ReplyID'];
    
    $type = 2;
    $usrToReplySQL = "SELECT UserID FROM Comments WHERE ReplyID = $replyid;";
    foreach ($dbh->query($usrToReplySQL) as $usr) {
        $inboxID = $usr['UserID'];
    }
} else {
    $usrToReplySQL = "SELECT UserID FROM Songs WHERE ID = $song;";
    foreach ($dbh->query($usrToReplySQL) as $usr) {
        $inboxID = $usr['UserID'];
    }
}


$comment = $_POST['Comment'];
//$comment = mysql_real_escape_string($comment);
$userID = $user;

$isRead = 0;
$commentID;

if (isset($_POST['ReplyID'])) {
    $sql = "INSERT INTO Comments (`UserID`, `SongID`, `Comment`, `ReplyID`) VALUES ('$user','$song','$comment', '$replyid');";
} else {
    $sql = "INSERT INTO Comments (`UserID`, `SongID`, `Comment`) VALUES ('$user','$song','$comment');";  
}  
//$sql = "INSERT INTO Comments(`UserID`, `SongID`, `Comment`) VALUES ('1', '1', 'test');";    

if ($dbh->query($sql) === TRUE) {

    //gets the comments id
    $ComIDSQL = "SELECT ID FROM Comments ORDER BY ID DESC LIMIT 1;";

    foreach ($dbh->query($ComIDSQL) as $comID) {
        $commentID = $comID['ID'];
    }

    $InboxSQL = "INSERT INTO Inbox (`InboxID`, `UserID`, `Type`, `IsRead`, `CommentID`) VALUES ('$inboxID','$userID','$type',0,'$commentID') ";
    if ($dbh->query($InboxSQL) === TRUE) {

        // activity log code
        $theDate = getdate(date("U"));
        $myDate = $theDate[year] . "-" . $theDate[mon] . "-" . $theDate[mday];
        // echo $myDate;
        $sql = "SELECT * FROM users WHERE id = $inboxID;";
        $result = $dbh->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $inboxUsername = $row[username];
            }
        }

        $sql = "INSERT INTO ActivityLog(user, dateGenerated, log) VALUES ('$_SESSION[username]', '$myDate', 'You commented on $inboxUsername's song.');";
        // echo $sql;
        $dbh->query($sql);

        header("Location: songdetailed.php?id=".$song);
    }
} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
    //echo $_POST['UserID'];
}
?>