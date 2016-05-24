<?php

session_start();
include("dbconnect.php");

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
<!-- start of navbar -->


    <nav role="navigation" class="navbar navbar-inverse">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a href="#" class="navbar-brand">MusoFuse</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="discovery.html">Discovery</a></li>
            
            <?php

    if (isset($_SESSION['username'])) {
        /////LOGOUTNEEDS HERE
        echo "<li><a href='php/logout.php'>Logout</a></li>";
    } else {
        echo '<li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>';
}

?>
            
            
            
            
            
<!--            Search bar                -->
            <form class="navbar-form navbar-left" role="search" id="searchContainer">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default">Search <span class="glyphicon glyphicon-search"></span></button>
            </form>
            </ul>
            
            
<!--            Profile Dropdown menu      -->
      <?php

    if (isset($_SESSION['username'])) { ?>
            <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span>  *Username Placeholder <img src="mf-images/profile-placeholder.png" width="25px" height="25px"></a>
          <ul class="dropdown-menu">
            <li><a href="#">Add new track</a></li>
            <li><a href="#">View your music <span class="badge">42</span></a></li>
            <li><a href="#">View your projects <span class="badge">12</span></a></li>
            <li role="separator" class="divider"></li>
            <li><a href="profile.html">Edit Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Log out</a></li>
          </ul>
        </li>
            </ul>
            <?php } ?>
          </div>
      </nav>
<!--end of nav bar -->
<!--start of body content -->
          <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Home</h2>
                        <div class="myDivider"></div>
                        <h3>New This Week</h3><br>
                        <div class="row">
                            <div class="musicItem">
                                <div class="col-md-2">
                                    <img alt="Music art" src="mf-images/magikarp.jpg" width="100%" height="100%">
                                    <audio controls width = "100%">
                                        <source src="track.mp3" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                                <div class="col-md-4">
                                    <h4>Fix you (cover) - Jake Dixon</h4>
                                    <p>Just a cover of coldplay's fix you that I put together one day, good for use as an example here <a href="#" class="btn btn-info">Read more</a></p>
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
                        
                        <br><div class="myDivider"></div>
                        <h3>Trending</h3>
                        <div class="row">
                            <<div class="musicItem">
                                <div class="col-md-2">
                                    <img alt="Music art" src="mf-images/magikarp.jpg" width="100%" height="100%">
                                    <audio controls width = "100%">
                                        <source src="track.mp3" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                                <div class="col-md-4">
                                    <h4>Fix you (cover) - Jake Dixon</h4>
                                    <p>Just a cover of coldplay's fix you that I put together one day, good for use as an example here <a href="#" class="btn btn-info">Read more</a></p>
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
<!-- footer -->
<!-- end of footer-->
      </div>
      
<!-- login modal window -->
      <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
<!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login:</h4>
                </div>
                <div class="modal-body">
                <form id="loginForm" method="post"" action="#"" >
                    Email Address:<br>
                <input type="text" placeholder="Username" name='username' class='username' id='username'><br>
                    Password:<br>
                <input type="password" placeholder="Password" name='password' class='password' id='password'><br><br>
                
                </div>
                <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Login" form="loginForm"  name= 'submit' >
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#registerModal">Register</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
                </form>
            </div>
          </div>
      </div>
      
      <?php

if (isset($_POST['submit'])) {
    
    $sql = "SELECT * FROM users WHERE username = '{$_POST['username']}'";
    $dbh = new PDO("sqlite:db/tcmc.sqlite"); 
    foreach ($dbh->query($sql) as $row) {
        header("Location:www.google.com");
        if ($row[username] == $_POST['username']) {
            if ($row[password] == md5($_POST['password'])) {
                unset($_SESSION['error']);
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['id'] = $row[Id];
               
                header("Refresh:0");
            } else {
                $_SESSION['error'] = 'Invalid Password';
                unset($_POST['username']);
                unset($_POST['password']);
              //  header("Location:#openModal");
            }
        } else {
            $_SESSION['error'] = 'invalid username';
            unset($_POST['username']);
            unset($_POST['password']);
         //   header("Location:#openModal");
        }
    }

}
header("Refresh:0");
?>
      
      
<!-- end of modal -->

<!-- register modal window -->
      <div id="registerModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
<!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Register:</h4>
                </div>
                <div class="modal-body">
                    <form id="registerForm">
                        Email Address:<br>
                        <input type="text" placeholder="Username"><br>
                        Password:<br>
                        <input type="password" placeholder="Password"><br>
                        Confirm Password:<br>
                        <input type="password" placeholder="Password"><br>
                        Musician Name:<br>
                        <input type="text" placeholder="Musician Name"><br><br>
                        <input type="checkbox"> Do you accept the <a href="#">terms</a> and conditions of use<br><br>
                    </form>
                </div>
                <div class="modal-footer">
                <input class="btn btn-success" value="Sign-Up" form="registerForm">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
          </div>
      </div>
<!-- end of modal -->
      
      
<!-- bootstrap and jquery JS files-->
    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>