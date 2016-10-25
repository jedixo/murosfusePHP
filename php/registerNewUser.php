<?php
session_start();
include "dbconnect.php";
require "password.php";
    
// echo "hello world.";

$userPhoto;



//UPLOADING user pic//
    $target_dir = "../" . time();
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        header("location:../index.php?error=99");
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "png" ) {
        header("location:../index.php?error=3");
      
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        header("location:../$pages[1]?error=99");
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $userPhoto = $target_file;



            if($_POST[password1] == $_POST[password2]){
    // echo "passwords match";
    $hash = password_hash($_POST[password1], PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (email, password, username, firstname, lastname, DOB, isAdmin, Thumbnail) VALUES ('{$_POST['email']}', '{$hash}', '{$_POST['username']}', '{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['DOB']}', '0', '{$userPhoto}');"; 
//    $result = $dbh->query($sql); 
    //echo $sql;

    

    if($dbh->query($sql)){
       




        header("Location:../home.php");
        //echo "database exec worked";
    }else{
        echo "database exec failed";
    }
}else{
    echo "passwords do not match";
}




            //header('location:../home.php');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } 






// print_r($_POST);


?>