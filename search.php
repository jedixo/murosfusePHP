<?php

session_start();
include("php/dbconnect.php");

<<<<<<< HEAD
    $pages = $_SESSION['pages'];
    array_shift($pages);
    array_push($pages,"search.php");
    $_SESSION['pages'] = $pages;

=======
>>>>>>> origin/master
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
      
  </head>
  <body>
      <div class="container-fluid">

<?php include "navBar.php"; ?>

<!--start of body content -->
          <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Search</h2>
                        <div class="myDivider"></div><br> 
                        <!-- Songs Search -->                     
                                
                                <?php
                                    echo "<div class='col-md-6'><h2>Songs</h2><br>";
<<<<<<< HEAD
                                    $sql = "SELECT * FROM Songs, users WHERE  Songs.UserID = users.id AND SongTitle LIKE '%$_GET[SearchParameters]%' ORDER BY UploadDate DESC  ";
=======
                                    $sql = "SELECT * FROM Songs WHERE SongTitle LIKE '%$_GET[SearchParameters]%' ORDER BY UploadDate DESC ";
>>>>>>> origin/master
                                    // echo $sql;
                                    $result = $dbh->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
<<<<<<< HEAD
                                            //echo "<pre>";
                                            //print_r($row);
                                            //echo "</pre>";
=======
                                        //  print_r($row);
>>>>>>> origin/master
                                            echo "<div class=\"row\">
                                                    <div class=\"musicItem\">
                                                        <div class=\"col-md-4\">
                                                            <img alt=\"Music art\" src=\"songImages/". $row["Thumbnail"] ." \" width=\"100%\" height=\"100%\">
<<<<<<< HEAD
                                                            
                                                        </div></div>
                                                        <div class=\"col-md-8\">
                                                                    <h4><a href=\"songdetailed.php?id=".$row["ID"]."\">" . $row["SongTitle"] . " </a></h4>                                  
                                                                    <p>" . $row["Description"] . " by <a href=\"viewAUsersTracks.php?user=".$row["UserID"]."\">" . $row["username"] ."</a>                                                                         
                                                                    </p><br>
                                                                    <audio controls width = \"100%\">
                                                                <source src=\"" . $row["Path"] . "\" type=\"audio/mpeg\">
                                                                Your browser does not support the audio element.
                                                            </audio>
                                                            </div></div></br>";
=======
                                                            <audio controls width = \"100%\">
                                                                <source src=\"" . $row["Path"] . "\" type=\"audio/mpeg\">
                                                                Your browser does not support the audio element.
                                                            </audio>
                                                        </div></div>
                                                        <div class=\"col-md-8\">
                                                                    <h4><a href=\"songFiles/" . $row["Path"] . "\">" . $row["SongTitle"] . " </a></h4>                                  
                                                                    <p>" . $row["Description"] . " by " . $row["username"] ."                                                                         
                                                                    </p>
                                                            </div></div>";
>>>>>>> origin/master
                                                                    }
                                                                } else {
                                                                    echo "0 results";
                                                                }
                                                                // $dbh->close();
                                                                echo "</div>";
                                            ?>

                            <!-- Artists Search -->

                            <?php 
                            echo "<div class='col-md-6'><h2>Artists</h2><br>";
                                    $sql = "SELECT * FROM users WHERE username LIKE '%$_GET[SearchParameters]%'";
                                    // echo $sql;
                                    $result = $dbh->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                        //  print_r($row);
                                            echo "<div class=\"row\">
                                                    <div class=\"musicItem\">
                                                        <div class=\"col-md-4\">
                                                            <img alt=\"Music art\" src=\"profileImages/". $row["Thumbnail"] . " \" width=\"100%\" height=\"100%\">
                                                        </div></div>
                                                        <div class=\"col-md-8\">
<<<<<<< HEAD
                                                            <h4><a href=\"viewAUsersTracks.php?user=".$row["id"]."\">" . $row["username"] . "</a></h4>";

                                                            $findNumTracks = "SELECT id FROM Songs WHERE UserID = $row[id];";
                                                            $num = 0;
                                                             foreach ($dbh->query($findNumTracks) as $trk) {
                                                                 $num = $num + 1;
                                                             }
                                                             echo "Number of Songs: $num";
                                                            

                                                            echo "</div></div>";
=======
                                                            <h4><a href='#'>" . $row["username"] . "</a></h4>
                                                            </div></div>";
>>>>>>> origin/master
                                                                    }
                                                                } else {
                                                                    echo "0 results";
                                                                }
                                                                // $dbh->close();
                                                                echo "</div>";

                            
                            ?>                                                
                        
                    </div>
                </div>
              </div>
          <div class="col-md-1"></div>

          
<!-- end of main content-->
<!-- footer -->
<!-- end of footer-->
      </div>
      
<?php include "modalWindows.php"; ?>
      
      
<!-- bootstrap and jquery JS files-->
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>