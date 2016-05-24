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
                    <li><a href="index.html">Home</a></li>
                    <li><a href="discovery.html">Discovery</a></li>

                    <!--            Search bar                -->
                    <form class="navbar-form navbar-left" role="search" id="searchContainer">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Search <span class="glyphicon glyphicon-search"></span></button>
                    </form>
                </ul>


                <!--            Profile Dropdown menu      -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span> *Username Placeholder <img src="mf-images/profile-placeholder.png" width="25px"
                                height="25px"></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#uploadModal">Add new track</a></li>
                            <li><a href="#">View your music <span class="badge">42</span></a></li>
                            <li><a href="#">View your projects <span class="badge">12</span></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Edit Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Log out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <!--end of nav bar -->
        <!--start of body content -->
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>*Placeholder Username</h2>
                    <div class="myDivider"></div><br>
                    <h3>Edit Your Account Details: </h3>
                    <form method="post" action="editProfile.php">
                        <?php
                        $sql = "SELECT * FROM users WHERE username='{$_SESSION['username']}'";
                        foreach($dbh->query($sql) as $row){
                            ?>
                        <!--<img src="mf-images/profile-placeholder.png" width="20%"><br><br>-->
                        <!--<input type="file" value="profileImage" placeholder="Choose a new profile Image"><br> Email Address:<br>-->
                        Email Address:<br>
                        <input type="text" placeholder="Email" name="email "value="<?php echo $row[email];?>"><br><br> 
                        Password: <br>
                        <input type="password" placeholder="Password" name="password" value="<?php echo $row[password];?>"><br><br> 
                        Username: <br>
                        <input type="text" placeholder="Username" name="username" value="<?php echo $row[username];?>"><br><br>
                        First Name: <br>
                        <input type="text" placeholder="First Name" name="firstname" value="<?php echo $row[firstname];?>"><br><br>
                        Last Name: <br>
                        <input type="text" placeholder="Last Name" name="lastname" value="<?php echo $row[lastname];?>"><br><br>
                        Date of Birth: <br>
                        <input type="text" placeholder="DOB" name="DOB" value="<?php echo $row[DOB];?>"><br><br>
                        <?php 
                        }
                        ?>
                        <input type="submit" class="btn btn-success" value="Save">
                    </form><br>
                    
                    <a href="deleteProfile.php" class="btn btn-danger">Delete Account</a><br><br>

                    <div class="myDivider"></div><br>
                    <h3>Your Tracks</h3>
                    <div class="row">
                        <div class="musicItem">
                            <div class="col-md-2">
                                <img alt="Music art" src="mf-images/placeholder-lp.png" width="100%" height="100%">
                            </div>
                            <div class="col-md-4">
                                <h4>Song Title - Musician</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies nunc nec felis
                                    posuere, in scelerisque risus accumsan. Vivamus tempor, mi et varius maximus... <a href="#"
                                        class="btn btn-info">Read more</a></p>
                            </div>
                        </div>
                        <div class="musicItem">
                            <div class="col-md-2">
                                <img alt="Music art" src="mf-images/placeholder-lp.png" width="100%" height="100%">
                            </div>
                            <div class="col-md-4">
                                <h4>Song Title - Musician</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultricies nunc nec felis
                                    posuere, in scelerisque risus accumsan. Vivamus tempor, mi et varius maximus... <a href="#"
                                        class="btn btn-info">Read more</a></p>
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
                    <form id="loginForm">
                        Email Address:<br>
                        <input type="text" placeholder="Username"><br> Password:
                        <br>
                        <input type="password" placeholder="Password"><br><br>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Login" form="loginForm">
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#registerModal">Register</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->


    <!-- upload modal window -->
    <div id="uploadModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload a track:</h4>
                </div>
                <div class="modal-body">
                    <form id="uploadForm" enctype="multipart/form-data" method="post" action="php/upload.php" >
                    <!-- should also store username needs to be added -->
                        <input type="file"  name="fileToUpload" id="fileToUpload" />
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" value="Upload File" name="submit" form="uploadForm">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
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
                        <input type="text" placeholder="Username"><br> Password:
                        <br>
                        <input type="password" placeholder="Password"><br> Confirm Password:<br>
                        <input type="password" placeholder="Password"><br> Musician Name:<br>
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