<?php

session_start();
include("php/dbconnect.php");

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
                                    $sql = "SELECT * FROM Songs WHERE SongTitle LIKE '%$_GET[SearchParameters]%' ORDER BY UploadDate DESC ";
                                    // echo $sql;
                                    $result = $dbh->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                        //  print_r($row);
                                            echo "<div class=\"row\">
                                                    <div class=\"musicItem\">
                                                        <div class=\"col-md-4\">
                                                            <img alt=\"Music art\" src=\"songImages/". $row["Thumbnail"] ." \" width=\"100%\" height=\"100%\">
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
                                                            <h4><a href='#'>" . $row["username"] . "</a></h4>
                                                            </div></div>";
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