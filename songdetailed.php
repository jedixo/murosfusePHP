<?php

session_start();
include("php/dbconnect.php");


    $pages = $_SESSION['pages'];
    array_shift($pages);
    array_push($pages,"songdetailed.php?id=$_GET[id]");
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
</style>
  </head>
  <body>
      <div class="container-fluid">

<?php include "navBar.php"; ?>

<!--start of body content -->
<?php
$sql = "SELECT * FROM Songs WHERE ID = {$_GET['id']};"; //DO NOT CHANGE THIS.... i will kill you

foreach($dbh->query($sql) as $row) {
    $hits = $row[Hits] + 1;


?>

          <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2><?php echo $row[SongTitle]; ?></h2>
                        <div class="myDivider"></div><br>
                        
                        <div class="col-md-4">
                            <img alt="Music art" src=<?php echo "'songImages/". $row[Thumbnail] ."'" ?> width="100%" height="100%"> 
                        </div>
                        <div class="col-md-8">
                        <?php 
                        $sql2 = "SELECT * FROM users WHERE users.id = {$row['UserID']};";
                        foreach($dbh->query($sql2) as $row2) {
                        ?>
                        <p> <?php echo "" . $row[Description] . " by: <a href=\"viewAUsersTracks.php?user=".$row2["id"]."\">" . $row2[username] . "";} ?></a></p>
                        <p>Uploaded: <?php echo $row[UploadDate]; ?>, Hits: <?php echo $hits; ?> </p>
                        </div>
                        <!-- music files ehre -->
                        <div class="col-md-10">
                            <span>
                                <?php
                                $tracks = 1;
                                echo "track: ". $tracks;?>
                            </span>
                            <audio controls width="100%">
                                <source src=<?php echo "'". $row["Path"] . "'"; ?> type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                            <?php
                                $SQL2nd = "SELECT * FROM AditionalTracks WHERE SongID = {$row['ID']};";
                                foreach($dbh->query($SQL2nd) as $additional) {
                                ?>
                                    <br>
                                    <span>
                                        <?php
                                        $tracks = $tracks + 1;
                                        echo "track: ". $tracks;
                                        ?>
                                    </span>
                                    <audio controls width="100%">
                                        <source src=<?php echo "'". $additional["Path"] . "'"; ?> type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>

                                    <?php
                                    $addUsrSql = "SELECT * FROM users WHERE id = '$additional[UserID]';";
                                    foreach($dbh->query($addUsrSql) as $addUsr) {
                                        if (isset($_SESSION['id']) && $_SESSION['id'] == $additional['UserID'] || $_SESSION['id'] == $row['UserID']) {
                                            echo '<span class="badge progress-bar-danger"><a class="UID" href="deleteTrack.php?song='. $row['ID'] .'&track='. $additional['ID'] .'">X</a></span>';
                                        }//<a href=\"viewAUsersTracks.php?user=".$row["UserID"]."\">"
                                        echo "<span class='badge'><a class='UID' href='viewAUsersTracks.php?user=$addUsr[id]'>$addUsr[username]</a></span>";
                                    }



                                }
                                ?>
                                <br>
                                <?php
                                if (isset($_SESSION['id'])) {
                                ?>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addTrackModal">Add Track</button>
                                <?php
                                }
                                if (isset($_SESSION['id']) && $_SESSION['id'] == $row['UserID']) {
                                    echo "<a href='#' class='btn btn-danger' data-toggle='modal' data-target='#areYouSure2Modal'>Delete Song</a>";
                                }
                                ?>
                        </div>
                        <div class="col-md-12">
                            <h3>Comments:</h3>
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#showcom">Show Comments</button>
                                <div id="showcom" class="collapse">
                            <ul class="list-group">
                            <?php
                                $sql3 = "SELECT * FROM Comments WHERE Comments.SongID = {$_GET['id']} AND ReplyID IS NULL;";
                                foreach ($dbh->query($sql3) as $row3) {
                                    $sq3 = 'SELECT * FROM users WHERE users.id = ' . $row3["UserID"] . ';';
                                    foreach ($dbh->query($sq3) as $row4) {
                                        echo '<li class="list-group-item">';
                                        if (isset($_SESSION['id']) && $_SESSION['id'] == $row4['id']) {
                                            echo '<span class="badge progress-bar-danger"><a class="UID" href="deletecoment.php?song='. $row['ID'] .'&comment='. $row3['ID'] .'">X</a></span>';
                                        }
                                        echo '<span class="badge"><a class="UID" href="viewAUsersTracks.php?user='.$row4[id].'">' . $row4[username] . '</a></span>';
                                        echo $row3[Comment]; //. '</li>';//<ul class="list-grpup"><li class="list-group-item"></li></ul>';
                                        $rql = "SELECT * FROM Comments WHERE ReplyID = {$row3[ID]};";
                                        echo '<ul class="list-group">';

                                        foreach ($dbh->query($rql) as $rep) {
                                            $uql = 'SELECT * FROM users WHERE users.id = ' . $rep["UserID"] . ';';
                                            foreach ($dbh->query($uql) as $usr) {
                                                echo '<li class="list-group-item">';
                                                if (isset($_SESSION['id']) && $_SESSION['id'] == $usr['id']) {
                                            echo '<span class="badge progress-bar-danger"><a class="UID" href="deletecoment.php?song='. $row['ID'] .'&comment='. $rep['ID'] .'">X</a></span>';
                                        }
                                                echo '<span class="badge"><a class="UID" href="viewAUsersTracks.php?user='.$usr[id].'">' . $usr[username] . '</a></span>';
                                                echo $rep[Comment] . '</li>';
                                            }
                                        }
                                        if (isset($_SESSION["username"])) {
                                        echo '<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#rply'. $row3[ID] .'">Reply</button>';
                                        echo '<div id="rply'. $row3[ID] .'" class="collapse">';
                                        ?>
                                        <form id='commentForm' method='post' action='addCommentDetailed.php'>
                                <div class="textwrapper"><textarea name='Comment'></textarea></div>
                                <input type='hidden' name='UserID' value=<?php echo "'". $_SESSION[id] . "'"; ?>>
                                <input type='hidden' name='SongID' value=<?php echo "'". $row["ID"] . "'"; ?>>
                                <input type='hidden' name='ReplyID' value=<?php echo "'". $row3["ID"] . "'"; ?>>
                                <input type='submit' class='btn btn-success'>
                            </form></div>
                            <?php
                                        }    
                                        echo '</ul></li>';
                                    }
                                }
                            ?>
                            </ul>
                           <?php 
                                 if (isset($_SESSION["username"])) {
                            ?>
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Add Comment</button>
                                <div id="demo" class="collapse">
                            <form id='commentForm' method='post' action='addCommentDetailed.php'>
                                <div class="textwrapper"><textarea name='Comment'></textarea></div>
                                <input type='hidden' name='UserID' value=<?php echo "'". $_SESSION[id] . "'"; ?>>
                                <input type='hidden' name='SongID' value=<?php echo "'". $row["ID"] . "'"; ?>>
                                <input type='submit' class='btn btn-success'>
                            </form>
                            </div>
                            </div>
                            <?php
                                 }
                                 ?>
                        </div>
                    </div>
                </div>
              </div>
          <div class="col-md-1"></div>

          
<!-- end of main content-->
<!-- footer -->
<!-- end of footer-->
      </div>
      <?php 
      
      $sql = "UPDATE Songs SET Hits = {$hits} WHERE ID = {$_GET['id']};";
      $dbh->query($sql);
      
      
      
      
      
include "modalWindows.php"; 
}?>

      
      
<!-- bootstrap and jquery JS files-->
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>