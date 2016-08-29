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
                        <h2>Home</h2>
                        <div class="myDivider"></div>
                        <h3>New This Week</h3><br>                        
                                <?php
$sql    = "SELECT * FROM Songs, users WHERE Songs.UserId = users.ID ORDER BY UploadDate DESC ";
$result = $dbh->query($sql);
$i      = 0;

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        //  echo "<pre>";
        //  print_r($result);
        //  print_r($row);
        //  print_r(mysqli_fetch_row($result));
        //  echo "</pre>";
        
        if (($i % 2) == 1) {
            
            echo "<div class=\"row\">";
        }
        
        echo "
                                                    <div class=\"musicItem\">
                                                        <div class=\"col-md-2\">
                                                            <img alt=\"Music art\" src=\"songImages/" . $row["Thumbnail"] . " \" width=\"100%\" height=\"100%\">
                                                            <audio controls width = \"100%\">
                                                                <source src=\"" . $row["Path"] . "\" type=\"audio/mpeg\">
                                                                Your browser does not support the audio element.
                                                            </audio>
                                                        </div>
                                                        <div class=\"col-md-4\">
                                                                    <h4><a href=\"songFiles/" . $row["Path"] . "\">" . $row["SongTitle"] . " </a></h4>                                  
                                                                    <p>" . $row["Description"] . " by " . $row["username"] . "                                                                         
                                                                    </p>
                                                            </div></div>";
        if (($i % 2) == 1) {
            echo "</div>";
        }
        $i++;
    }
    
} else {
    echo "0 results";
}
$dbh->close();

?>                                
 </br>                       
<!--                        Pagination                              -->
                        <div class="myPagination">
                            <nav>
                              <ul class="pagination">
                                <li>
                                  <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                  </a>
                                </li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                  <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                        </div>
                        
                    </div>
                </div>
              </div>
          <div class="col-md-1"></div>

          
<!-- end of main content-->

<?php include "modalWindows.php"; ?>
            
<!-- bootstrap and jquery JS files-->
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>