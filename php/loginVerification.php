<?php
session_start();
include "dbconnect.php";
include "password.php";
    
//echo "hello world.";
    
$sql = "SELECT * FROM users WHERE username = '{$_POST['username']}';";    
// echo $sql;
// $result = $dbh->query($sql);
// print_r($result);

$username = "jksjdf";
$password = "6MXkUZ[9@Wb9";
$dbname = "MusoFuseDB";
// Create connection
$conn = new mysqli('localhost', $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$result = $conn->query($sql);
$hash = password_hash($_POST[password], PASSWORD_BCRYPT);



//echo "$result";
//header("Location: www.google.com");
    foreach ($result as $row) {
//        header("Location: www.bing.com");
        //print_r($row);
        //echo "<br><br><br>username: " . $row[username] . " password: " . $row[password];
        //echo "<br><br><br>username: " . $_POST[username] . " password: " . $_POST[password];
        //echo "<pre>";
        //print_r($row);
//        echo"$hash";
        //echo "</pre>";
                


        if ($row[username] === $_POST['username']) {
            if (password_verify($_POST['password'], $row[password])) {                
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['id'] = $row[id];
                $_SESSION['thumbnail'] = $row[Thumbnail];
                $_SESSION['interrupt'] = false;
                if(!isset($_SESSION['pages'])){
                    $pages = array("home.php","home.php");
                    $_SESSION['pages'] = $pages;
                }
                // echo "Hello Correct User.";
                $pages = $_SESSION['pages'];

                echo "<script>window.top.location='http://www.musofuseaustralia.com/$pages[1]'</script>";
            } else {
                //echo "password is incorrect.";
                //$_SESSION['interrupt'] = true;
                 echo "<script>window.top.location='http://www.musofuseaustralia.com/$pages[1]?error=0'</script>";

            }
        } else {
            //echo "Username is incorrect.";
            //$_SESSION['interrupt'] = true;
            echo "<script>window.top.location='http://www.musofuseaustralia.com/$pages[1]?error=1'</script>";

        }
    }
          //  echo ", this user does not exist";
          //header("Location: http://www.musofuseaustralia.com/home.php");
          echo "<script>window.top.location='http://www.musofuseaustralia.com/$pages[1]?error=1'</script>";

?>