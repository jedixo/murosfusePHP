<?php

session_start();
if (!isset($_SESSION['username'])){
header("Location: home.php");
}

    $pages = $_SESSION['pages'];
    array_shift($pages);
    array_push($pages,"home.php");
    $_SESSION['pages'] = $pages;

include("dbconnect.php");
$getInstrument = (isset($_GET['instrument']))? $_GET['instrument']: "";
$getGenre = (isset($_GET['genre']))? $_GET['genre']:"";
$sqlGenre = "Select Name from Genres";			//Will change when tags are added to db
$sqlInst = "Select Instruments from Instruments";	//As Above
$genres = $dbh->query($sqlGenre);
$insts = $dbh->query($sqlInst);
$page = (isset($_GET['page']))? $_GET['page']:"1";
$offset = ($page - 1) * 10;
$entriesSql = "SELECT Songs.Thumbnail, Path, SongTitle, Description, Instruments, Genre, username, Songs.ID 
	       FROM Songs, users 
	       WHERE Songs.UserID = users.id
	       AND username  = '".$_SESSION['username']."'" .(($getInstrument != "")? " 
	       AND users.id = '" . $_SESSION[id]  . "' 
	       AND Instruments like '". $getInstrument."'":""). (($getGenre != "")? ($getInstrument != "") ? " 
	    
	       AND Genre like '". $getGenre."'" : " 
	       AND Genre like '". $getGenre."'" : ""). " 
	       ORDER BY UploadDate";
$entries = $dbh->query($entriesSql); 	//As Above
$totalEntries = mysqli_num_rows($entries);
$pages = ceil($totalEntries/10);

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
                        <h2>Your Tracks</h2>
                        
                        <div class="myDivider">
                        
<!-- Filter -->
                            <form>
                            Genre: <select name="genre">
                            <?php 
                            echo "<option value=\"\">$name</option>";
                            foreach ($genres as $genre){
                            	$name = $genre['Name'];
                            	echo "<option value=\"$name\">$name</option>";                            
                            }
                             
                                
                                echo "</select> Instrument: <select name=\"instrument\">";
                                echo "<option value=\"\">$instrument</option>";
			    	foreach($insts as $inst){
			    		$instrument = $inst['Instruments'];
			    		echo "<option value=\"$instrument\">$instrument</option>";
			    	}
			    	echo "</select>";
			    ?>
                                <input type="submit" class="btn btn-success">
                            </form>
                        </div>
<!-- End Filter -->
                        <br>
                        <h3>Trending</h3>
                        <?php
                        $itemCount = 0;
                        foreach($entries as $entry){
                        	if ($itemCount < ($offset+10) && $itemCount>=$offset){
                        		if ($itemCount %2==0||$itemCount ==0){
                                        	echo "<div class=\"row\">";
                        		}
                        	?>
                        	<div class="musicItem">
                                	<div class="col-md-2">
                                		<?php
                                    			echo "<img alt=\"Music art\" src=\"songImages/" . $entry["Thumbnail"] . "\" width=\"100%\" height=\"100%\">";
                                		?>
                                	</div>
                                	<div class="col-md-4">
                                	<?php
                                	echo "<h4><a href=\"songdetailed.php?id=".$entry["ID"]."\">". $entry["SongTitle"] . " </a></h4>                                  
                                                <p>" . $entry["Description"] . " by " . $entry["username"] . "</p><br>
                                                <audio id=\"player\" controls width = \"100%\">
                                                   <source src=\"" . $entry["Path"] . "\" type=\"audio/mpeg\">
                                                    Your browser does not support the audio element.
                                                </audio><br><span><a href='songdetailed.php?id=".$entry["ID"]."' class='btn btn-info'>Read more</a></span>";
                                                ?>
                                	</div>
                       		</div>
                        	<?php
                        	if (($itemCount  % 2) != 0) {
                                        echo "</div></br>";
                                }
                                
                                }
                                
                        	$itemCount++;
                        	
                        }
                        ?>
                        </div>
                        



<!-- pagination -->
                        <div class="myPagination">
                            <nav>
                              <ul class="pagination">
                                <?php
                                
                                    echo "<li><a href=\"?page=1&genre=$getGenre&instrument=$getInstrument\">&laquo;</a></li><li>";
                                if ($page != 1){
                                echo "<a href=\"?page=".($page-1)."&genre=$getGenre&instrument=$getInstrument\" aria-label=\"Previous\">";
                                } else {
                                echo "<a href=\"?page=$pages&genre=$getGenre&instrument=$getInstrument\" aria-label=\"Previous\">";
                                }
                                echo "<span aria-hidden=\"true\">&lsaquo;</span></a>
                                </li>";
                                
                                
                                for ($i=1; $i<$pages+1; $i++){
                                	echo "<li><a href=\"?page=$i&genre=$getGenre&instrument=$getInstrument\">$i</a></li>";
                                }
                                
                                if ($page != ($pages+1)){
                                echo "<li>
                               <a href=\"?page=".($page+1)."&genre=$getGenre&instrument=$getInstrument\" aria-label=\"Next\">";
                                } else {
                                echo "<li><a href=\"?page=1&genre=$getGenre&instrument=$getInstrument\" aria-label=\"Next\">";
                                }
                                
                                    echo "<span aria-hidden=\"true\">&rsaquo;</span><li><a href=\"?page=$pages&genre=$getGenre&instrument=$getInstrument\">&raquo;</a></li>";

                                ?>
                                
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
<!-- footer -->
<!-- end of footer-->
      </div>
      
<?php include "modalWindows.php"; ?>
      
      
<!-- bootstrap and jquery JS files-->
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>