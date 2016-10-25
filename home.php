<?php
<<<<<<< HEAD
    session_start();
    include("php/dbconnect.php");

    $pages = $_SESSION['pages'];
    array_shift($pages);
    array_push($pages,"home.php");
    $_SESSION['pages'] = $pages;

=======

session_start();
include("php/dbconnect.php");
>>>>>>> origin/master

?>
<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MusoFuse</title>

        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <script src="jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <?php   
                include "navBar.php";
                include "addComment.php"; 
            ?>
            <!--start of body content -->
            <div class="col-md-1"></div>
=======
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
>>>>>>> origin/master
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Home</h2>
                        <div class="myDivider"></div>
                        <h3>New This Week</h3><br>                        
<<<<<<< HEAD
                        <?php
                            

			    // Pagination
			    $totalRowsQuery = $dbh->query("SELECT * FROM Songs");
			    $totalRows = mysqli_num_rows($totalRowsQuery);
			    $rowsPerPage = 10;
			    $pages = ceil($totalRows / $rowsPerPage);
			    
			    // What page are we currently on?
			    $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
			        'options' => array(
			            'default'   => 1,
			            'min_range' => 1,
			        ),
			    )));
			    
			    // Calculate the offset for the query
			    $offset = ($page - 1)  * $rowsPerPage;
			
			    // Some information to display to the user
			    $start = $offset + 1;
			    $end = min(($offset + $rowsPerPage ), $totalRows);
			 //   echo "<pre>totalRows: <br>";
			 //   print_r($totalRows);
			 //   echo "<br>totalRowsQuery:<br>";
			 //   print_r($totalRowsQuery);
			 //   echo "<br>rowsPerPage: <br>";
			 //   print_r($rowsPerPage);
			 //   echo "<br>pages: <br>";
			 //   print_r($pages);
			 //   echo "<br>page: <br>";
			 //   print_r($page);
			 //   echo "<br>offset: <br>";
			 //   print_r($offset);
			 //   echo "</pre>";
			    
			    $sql = "SELECT Songs.Thumbnail, Path, SongTitle, Description, username, Songs.ID, Songs.UserID FROM Songs, users WHERE Songs.UserID = users.id ORDER BY UploadDate DESC LIMIT " . $rowsPerPage . " OFFSET " . $offset . "";
                            $result = $dbh->query($sql);
                            $i = 0;

			    
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    if ((($i % 2) == 0) || $i == 0) {
                                        echo "<div class=\"row\">";
                                    }
                                   // echo "<pre>";
                                   // print_r($row);
                                   // echo"</pre>";
                                    echo "
                                        <div class=\"musicItem\">
                                            <div class=\"col-md-2\">
                                                <img alt=\"Music art\" src=\"songImages/" . $row["Thumbnail"] . "\" width=\"100%\" height=\"100%\">
                                                
                                            </div>
                                            <div class=\"col-md-4\">
                                                <h4><a href=\"songdetailed.php?id=".$row["ID"]."\">" . $row["SongTitle"] . " </a></h4>                                  
                                                <p>" . $row["Description"] . " by <a href=\"viewAUsersTracks.php?user=".$row["UserID"]."\">" . $row["username"] . "</a></p><br>
                                                <audio id=\"player\" controls width = \"100%\">
                                                   <source src=\"" . $row["Path"] . "\" type=\"audio/mpeg\">
                                                    Your browser does not support the audio element.
                                                </audio><br><span><a href='songdetailed.php?id=".$row["ID"]."' class='btn btn-info'>Read more</a>    ";
                                                if (isset($_SESSION["username"])) {
                                                    //echo "<a data-id='" . $row["ID"] . "' class='open-commentsModal btn btn-success' data-toggle='modal' data-target='#commentModal" . $row["ID"] ."'>Quick Comment</a>";
                                                }
                                                echo "</span>      
                                            </div>
                                        </div>
					<br>
                                        <div id='commentModal" . $row["ID"] ."' class='modal fade' role='dialog'>
                                            <div class='modal-dialog'>
                                                <!-- content -->
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                                        <h4 class='modal-title'>Comments for: " . $row["SongTitle"] ."</h4>
                                                    </div>
                                                        <div class='modal-body'>";  
                                                            $sql2 = 'SELECT * FROM Comments WHERE Comments.SongID = ' . $row["ID"] . ';';
                                                            $result2 = $dbh->query($sql2);
                                                            echo '<ul class="list-group">';
                                                                foreach ($dbh->query($sql2) as $row2) {
                                                                    $sq3 = 'SELECT * FROM users WHERE users.id = ' . $row2["UserID"] . ';';
                                                                    foreach ($dbh->query($sq3) as $row3) {
                                                                        echo '<li class="list-group-item">';
                                                                            echo '<span class="badge">' . $row3[username] . '</span>';
                                                                        echo $row2[Comment] . '</li>';
                                                                        unset($row3);
                                                                        unset($sq3);
                                                                    }
                                                                }
                                                                unset($sql2);
                                                                unset($result2);
                                                                unset($row2);
                                                            echo '</ul>';
                                                            echo "
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <form id='commentForm' method='post' action='addComment.php'>
                                                                <textarea rows='4' cols='50' name='Comment'></textarea>
                                                                <input type='hidden' name='UserID' value='" . $_SESSION[id] . "'>
                                                                <input type='hidden' name='SongID' value='" . $row["ID"] . "'>
                                                                <input type='submit' class='btn btn-success'>
                                                                <button type='button' class='btn btn-danger' data-dismiss='modal'>Cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>";
                                    if (($i % 2) != 0) {
                                        echo "</div></br>";
                                    }
                                    $i++;
                                }
                            } else {
                                echo "0 results";
                            }
                           
                        ?>                                
                        </br>                       
                        <!--                        Pagination                              -->
                        <div class="myPagination">
                            <nav>
                                <ul class="pagination">
                                    <?php
                                    echo '<li><a href="?page=1">&laquo;</a></li>';
                                    echo '<li><a href="?page=' . ($page - 1) . '">&lsaquo;</a></li>';
                                    $i2 = 1;
                                    while( $i2 <= $pages){
                                    	echo '<li><a href="?page=' . $i2 . '">' . $i2 . '</a></li>';
                                    	$i2++;
                                    	}                               
                                    
                              
                                    echo '<li><a href="?page=' . ($page + 1) . '">&rsaquo;</a></li>';
                                    echo '<li><a href="?page=' . $pages . '">&raquo;</a></li>';
				    
                                    ?>
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-1"></div>        
        <!-- end of main content-->
        <?php 
            include "modalWindows.php";
            $dbh->close(); 
        ?>    
        <!-- bootstrap and jquery JS files-->
        
        
    </body>
=======
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
>>>>>>> origin/master
</html>