<?php

session_start();
include("php/dbconnect.php");


    $pages = $_SESSION['pages'];
    array_shift($pages);
    array_push($pages,"inbox.php");
    $_SESSION['pages'] = $pages;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MusoFuse</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        textarea {   
            width:100%;
        }
        .textwrapper {
            
            margin:5px 0;
            padding:3px;
        }
        .UID {
            color:#FFF;
        }
                .UID2 {
            color:#222;
        }
</style>
  </head>
  <body>
      <div class="container-fluid">

<?php 
$readSQL = "UPDATE Inbox SET IsRead = 1 WHERE InboxID = $_SESSION[id];";
if ($dbh->query($readSQL) === TRUE) {
}




include "navBar.php"; ?>

<!--start of body content -->
<?php
$userSQL = "SELECT * FROM users WHERE id = {$_SESSION['id']};";
$dmSQL = "SELECT * FROM Inbox WHERE InboxID = {$_SESSION['id']} AND Type = 0;"; //direct messages sql
$cmSQL = "SELECT * FROM Inbox WHERE InboxID = {$_SESSION['id']} AND Type = 1;"; //comment on songs sql
$rpSQL = "SELECT * FROM Inbox WHERE InboxID = {$_SESSION['id']} AND Type = 2;"; //reply to comment sql


foreach($dbh->query($userSQL) as $user) {
?>

          <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2><?php echo "Inbox: ". $user['username']; ?></h2>
                        <div class="myDivider"></div><br>
                        <div class="col-md-10"></div>
                        <div class="col-md-12">
                            <h3>Direct Messages:</h3>
                                <div id="showcom">
                                    <ul class="list-group">
                                    <?php
                                
                                foreach ($dbh->query($dmSQL) as $directMessage) {
                                    $directMessageUserSQL = 'SELECT * FROM users WHERE users.id = ' . $directMessage["UserID"] . ';';
                                    foreach ($dbh->query($directMessageUserSQL) as $directMessageUser) {
                                        echo '<li class="list-group-item">';
                                        //delete inbox here
                                        //reply here
                                        echo '<span class="badge progress-bar-danger"><a class="UID" href="deleteInbox.php?message='.$directMessage[ID].'">X</a></span>';
                                        echo '<span class="badge"><a class="UID" href="viewAUsersTracks.php?user='.$directMessageUser[id].'">' . $directMessageUser[username] . '</a></span>';
                                        echo $directMessage[Message]; //. '</li>';//<ul class="list-grpup"><li class="list-group-item"></li></ul>';
                                        
                                        if (isset($_SESSION["username"])) {
                                        echo '<br><button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#rply'. $directMessage[ID] .'">Reply</button>';
                                        echo '<div id="rply'. $directMessage[ID]  .'" class="collapse">';
                                        ?>
                                        <form id='commentForm' method='post' action='pm.php'>
                                <div class="textwrapper"><textarea name='message'></textarea></div>
                                <?php
                                echo "<input type='hidden' name='username' value=$directMessageUser[username]>";
                                ?>
                                <input type='submit' class='btn btn-success'>
                            </form></div>
                            <?php
                                        }    
                                        
                                    }
                                    
                                }
                                echo '</ul></li>';
                            ?>
                            </ul>
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#pmModal">Send A Message</a>
            </div>   
            </div>
          <div class="col-md-12">
                            <h3>Comments on your songs:</h3>
                                <div id="showcom">
                                    <ul class="list-group">
                                    <?php
                                
                                foreach ($dbh->query($cmSQL) as $comment) {
                                    $commentUserSQL = 'SELECT * FROM users WHERE users.id = ' . $comment["UserID"] . ';';
                                    foreach ($dbh->query($commentUserSQL) as $commentUser) {
                                        echo '<li class="list-group-item">';
                                        
                                        $messageSQL = "SELECT * FROM Comments WHERE ID = '$comment[CommentID]';";
                                        foreach ($dbh->query($messageSQL) as $message) {
                                        
                                        $songSQL = "SELECT * FROM Songs WHERE ID = '$message[SongID]'";
                                        foreach ($dbh->query($songSQL) as $song) {
                                            
                                        
                                        echo '<span class="badge progress-bar-danger"><a class="UID" href="deleteInbox.php?message='.$directMessage[ID].'">X</a></span>';
                                        echo '<span class="badge"><a class="UID" href="viewAUsersTracks.php?user='.$commentUser[id].'">' . $commentUser[username] . '</a></span>';

                                        


                                        echo $message[Comment]; //. '</li>';//<ul class="list-grpup"><li class="list-group-item"></li></ul>';
                                        echo "<br><br>Song: <a class='UID2' href='songdetailed.php?id=$song[ID]'> $song[SongTitle]</a>";
                                        
                                        if (isset($_SESSION["username"])) {
                                        echo '<br><a class="btn btn-primary" href="songdetailed.php?id=' .$song[ID].'">Goto Song</a>';
                                        echo '<div id="rply2'. $row3[ID] .'" class="collapse">';
                                        ?>
                                        <form id='commentForm2' method='post' action='addCommentDetailed.php'>
                                <div class="textwrapper"><textarea name='Comment'></textarea></div>
                                <input type='hidden' name='UserID' value=<?php echo "'". $_SESSION[id] . "'"; ?>>
                                <input type='hidden' name='SongID' value=<?php echo "'". $row["ID"] . "'"; ?>>
                                <input type='hidden' name='ReplyID' value=<?php echo "'". $row3["ID"] . "'"; ?>>
                                <input type='submit' class='btn btn-success'>
                            </form></div>
                            <?php
                                        }    
                                       
                                    }
                                        }
                                    }
                                }
                                 echo '</ul></li>';
                            ?>
                            </ul>
                           
                        </div>
                    </div>
                                
                    
                    <div class="col-md-12">
                            <h3>Replies to your Comments:</h3>
                                <div id="showcom">
                                    <ul class="list-group">
                                    <?php
                                
                                foreach ($dbh->query($rpSQL) as $reply) {
                                    $commentUserSQL = 'SELECT * FROM users WHERE users.id = ' . $reply["UserID"] . ';';
                                    foreach ($dbh->query($commentUserSQL) as $commentUser) {
                                        echo '<li class="list-group-item">';
                                        
                                        $messageSQL = "SELECT * FROM Comments WHERE ID = '$reply[CommentID]';";
                                        foreach ($dbh->query($messageSQL) as $message) {
                                        
                                        $songSQL = "SELECT * FROM Songs WHERE ID = '$message[SongID]'";
                                        foreach ($dbh->query($songSQL) as $song) {
                                            
                                        
                                        echo '<span class="badge progress-bar-danger"><a class="UID" href="deleteInbox.php?message='.$directMessage[ID].'">X</a></span>';
                                        echo '<span class="badge"><a class="UID" href="viewAUsersTracks.php?user='.$commentUser[id].'">' . $commentUser[username] . '</a></span>';

                                        


                                        echo $message[Comment]; //. '</li>';//<ul class="list-grpup"><li class="list-group-item"></li></ul>';
                                        echo "<br><br>Song: <a class='UID2' href='songdetailed.php?id=$song[ID]'> $song[SongTitle]</a>";
                                        
                                        if (isset($_SESSION["username"])) {
                                        echo '<br><a class="btn btn-primary" href="songdetailed.php?id=' .$song[ID].'">Goto Song</a>';
                                        echo '<div id="rply2'. $row3[ID] .'" class="collapse">';
                                        ?>
                                        <form id='commentForm2' method='post' action='addCommentDetailed.php'>
                                <div class="textwrapper"><textarea name='Comment'></textarea></div>
                                <input type='hidden' name='UserID' value=<?php echo "'". $_SESSION[id] . "'"; ?>>
                                <input type='hidden' name='SongID' value=<?php echo "'". $row["ID"] . "'"; ?>>
                                <input type='hidden' name='ReplyID' value=<?php echo "'". $row3["ID"] . "'"; ?>>
                                <input type='submit' class='btn btn-success'>
                            </form></div>
                            <?php
                                        }    
                                       // echo '</ul></li>';
                                    }
                                        }
                                    }
                                }
                                 echo '</ul></li>';
                            ?>
                            </ul>
                           
                        </div>
                    </div>
                                </div>
                    </div>
                
              

          
<!-- end of main content-->
<!-- footer -->
<!-- end of footer-->
      </div>
      <?php
      }
      ?>
      
<?php include "modalWindows.php"; ?>
      
      
<!-- bootstrap and jquery JS files-->
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>