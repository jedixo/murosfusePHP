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
          <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel" id="loginPanel">
                <h3>Login:</h3>
                <form id="loginForm" method="post" action="php/loginVerification.php" >
                    Email Address:<br>
                <input type="text" placeholder="Username" name='username' class='username' id='username'><br>
                    Password:<br>
                <input type="password" placeholder="Password" name='password' class='password' id='password'><br><br>
                <input type="submit" class="btn btn-success" value="Login"  name= 'submit' >
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#registerModal">Register</a>
                <a href="home.php" class="btn btn-primary">Continue as Guest</a>
                </form>
                </div>
              </div>
          <div class="col-md-3"></div>

          
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