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
                        <h2>Discovery</h2>
                        <div class="myDivider"></div><br>
                        This feature is coming soon.
<!--                        <h3>New This Week</h3><br>-->
                        <!--
                        <div>
                            <form>
                            Genre: <select name="Genre">
                                <option value="Classical">Classical</option>
                                <option value="Rock/Metal">Rock/Metal</option>
                                <option value="Electronic">Electronic</option>
                                <option value="Other">Other</option>
                                </select> Instrument: <select name="Instrument">
                                <option value="Vocals">Vocals</option>
                                <option value="Guitar">Guitar</option>
                                <option value="Drums">Drums</option>
                                <option value="Synth">Synth</option>
                                <option value="Other">Other</option>
                                </select> <input type="submit" name="submit" value="Filter" class="btn btn-success">
                            </form>
                        </div><br>
                        <div class="row">
                            <div class="musicItem">
                                <div class="col-md-2">
                                    <img alt="Music art" src="mf-images/placeholder-lp.png" width="100%" height="100%">
                                </div>
                                <div class="col-md-4">
                                    <h4>Song Title - Musician</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies nunc nec felis posuere, in scelerisque risus accumsan. Vivamus tempor, mi et varius maximus... <a href="#" class="btn btn-info">Read more</a></p>
                                </div>
                            </div>
                            <div class="musicItem">
                                <div class="col-md-2">
                                    <img alt="Music art" src="mf-images/placeholder-lp.png" width="100%" height="100%">
                                </div>
                                <div class="col-md-4">
                                    <h4>Song Title - Musician</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies nunc nec felis posuere, in scelerisque risus accumsan. Vivamus tempor, mi et varius maximus... <a href="#" class="btn btn-info">Read more</a></p>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="musicItem">
                                <div class="col-md-2">
                                    <img alt="Music art" src="mf-images/placeholder-lp.png" width="100%" height="100%">
                                </div>
                                <div class="col-md-4">
                                    <h4>Song Title - Musician</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies nunc nec felis posuere, in scelerisque risus accumsan. Vivamus tempor, mi et varius maximus... <a href="#" class="btn btn-info">Read more</a></p>
                                </div>
                            </div>
                            <div class="musicItem">
                                <div class="col-md-2">
                                    <img alt="Music art" src="mf-images/placeholder-lp.png" width="100%" height="100%">
                                </div>
                                <div class="col-md-4">
                                    <h4>Song Title - Musician</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies nunc nec felis posuere, in scelerisque risus accumsan. Vivamus tempor, mi et varius maximus... <a href="#" class="btn btn-info">Read more</a></p>
                                </div>
                            </div>
                        </div><br>
                        -->
                        
<!--
                        <br><div class="myDivider"></div>
                        <h3>Trending</h3>
-->
<!--
                        <div class="row">
                            <div class="musicItem">
                                <div class="col-md-2">
                                    <img alt="Music art" src="mf-images/placeholder-lp.png" width="100%" height="100%">
                                </div>
                                <div class="col-md-4">
                                    <h4>Song Title - Musician</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies nunc nec felis posuere, in scelerisque risus accumsan. Vivamus tempor, mi et varius maximus... <a href="#" class="btn btn-info">Read more</a></p>
                                </div>
                            </div>
                            <div class="musicItem">
                                <div class="col-md-2">
                                    <img alt="Music art" src="mf-images/placeholder-lp.png" width="100%" height="100%">
                                </div>
                                <div class="col-md-4">
                                    <h4>Song Title - Musician</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies nunc nec felis posuere, in scelerisque risus accumsan. Vivamus tempor, mi et varius maximus... <a href="#" class="btn btn-info">Read more</a></p>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="musicItem">
                                <div class="col-md-2">
                                    <img alt="Music art" src="mf-images/placeholder-lp.png" width="100%" height="100%">
                                </div>
                                <div class="col-md-4">
                                    <h4>Song Title - Musician</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies nunc nec felis posuere, in scelerisque risus accumsan. Vivamus tempor, mi et varius maximus... <a href="#" class="btn btn-info">Read more</a></p>
                                </div>
                            </div>
                            <div class="musicItem">
                                <div class="col-md-2">
                                    <img alt="Music art" src="mf-images/placeholder-lp.png" width="100%" height="100%">
                                </div>
                                <div class="col-md-4">
                                    <h4>Song Title - Musician</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies nunc nec felis posuere, in scelerisque risus accumsan. Vivamus tempor, mi et varius maximus... <a href="#" class="btn btn-info">Read more</a></p>
                                </div>
                            </div>
                        </div>
              -->          
<!--                        Pagination                              -->

<!--
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
          -->

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