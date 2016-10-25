<?php

session_start();
include("php/dbconnect.php");


    $pages = $_SESSION['pages'];
    array_shift($pages);
    array_push($pages,"home.php");
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

</head>

<body>
    <div class="container-fluid">

        <?php include "navBar.php"; ?>
        
        <!--start of body content -->
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2><?php echo $_SESSION[username]; ?></h2>
                    <div class="myDivider"></div><br>
                    <h3>Edit Your Account Details</h3>
                    <form method="post" action="php/editProfile.php">
                        <?php
                        $sql = "SELECT * FROM users WHERE username='{$_SESSION['username']}'";
                        foreach($dbh->query($sql) as $row){
                            ?>
                        <!--<img src="mf-images/profile-placeholder.png" width="20%"><br><br>-->
                        <!--<input type="file" value="profileImage" placeholder="Choose a new profile Image"><br> Email Address:<br>-->
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