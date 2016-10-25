<?php

session_start();
include("php/dbconnect.php");

<<<<<<< HEAD

    $pages = $_SESSION['pages'];
    array_shift($pages);
    array_push($pages,"home.php");
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
<<<<<<< HEAD
                    <h2><?php echo $_SESSION[username]; ?></h2>
                    <div class="myDivider"></div><br>
                    <h3>Edit Your Account Details</h3>
=======
                    <h2>*Placeholder Username</h2>
                    <div class="myDivider"></div><br>
                    <h3>Edit Your Account Details: </h3>
>>>>>>> origin/master
                    <form method="post" action="php/editProfile.php">
                        <?php
                        $sql = "SELECT * FROM users WHERE username='{$_SESSION['username']}'";
                        foreach($dbh->query($sql) as $row){
                            ?>
                        <!--<img src="mf-images/profile-placeholder.png" width="20%"><br><br>-->
                        <!--<input type="file" value="profileImage" placeholder="Choose a new profile Image"><br> Email Address:<br>-->
<<<<<<< HEAD
                        <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Username</span>
                            <input type="text" name="username" class="form-control" value="<?php echo $row[username];?>" aria-describedby="basic-addon1">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Email</span>
                            <input type="text" name="email" class="form-control" value="<?php echo $row[email];?>" aria-describedby="basic-addon1">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Password</span>
                            <input type="password" name="password" class="form-control" aria-describedby="basic-addon1" required>
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">First Name</span>
                            <input type="text" name="firstname" class="form-control" value="<?php echo $row[firstname];?>" aria-describedby="basic-addon1">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Last Name</span>
                            <input type="text" name="lastname" class="form-control" value="<?php echo $row[lastname];?>" aria-describedby="basic-addon1">
                        </div><br>
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Birth Date</span>
                            <input type="text" name="DOB" class="form-control" value="<?php echo $row[DOB];?>" aria-describedby="basic-addon1">
                        </div><br>
                        
                        <?php 
                        }
                        ?>
                        <input type="submit" class="btn btn-success" value="Save">  <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#areYouSureModal">Delete Account</a><br>
                    </form>
                    
                    
                    <?php 
                    $sql = "SELECT * FROM ActivityLog WHERE user = '$_SESSION[username]';";
                    // echo $sql;
                    $result = $dbh->query($sql);
                    if ($result->num_rows > 0) {
                        echo "<h3>Your Recent Activity</h3>";
                        while($row = $result->fetch_assoc()) {
                            // print_r($row);
                            echo "<p>" . $row[dateGenerated] . " " . $row[log] . "</p>";
                        }
                    } else{
                        echo "no activity records found.";
                    }
                    ?>
=======
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
>>>>>>> origin/master

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