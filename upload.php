<?php
    session_start();
    include "dbconnect.php";

    //variables
    $user = $_SESSION['id'];
    $musicPath;
    $thumbPath;
    $title = $_POST['songTitle'];
    $genere = (isset($_POST['genre']))? $_POST['genre']:"";
    $instrument = (isset($_POST['instrument']))? $_POST['instrument']: "";
    $addition = (isset($_POST['addTrack']))? $_POST['addTrack']:"";
    $description = $_POST['description'];
    $hits = 0;
    $date = date("Y-m-d");



    if ($addition == "") {
    //UPLOADING SONGS//
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
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "mp3" && $imageFileType != "wav" && $imageFileType != "ogg" && $imageFileType != "png" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $musicPath = $target_file;

            //UPLOADING THUMBNAIL//
            $target_dir = "../" . time();
            $target_file = $target_dir . basename($_FILES["songImage"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["songImage"]["tmp_name"]);
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "png" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["songImage"]["tmp_name"], $target_file)) {
                    $thumbPath = $target_file;

                    $sql = "INSERT INTO Songs (`SongTitle`, `UserID`, `Path`, `Description`, `UploadDate`, `Hits`, `Thumbnail`, `Instruments`, `Genre`) VALUES ('$title','$user','$musicPath','$description','$date','$hits','$thumbPath','$instrument','$genere');";
                
                    //sqlhere    
                    if ($dbh->query($sql) === TRUE) {

                        $id = 0;
                        $sql = "SELECT ID FROM Songs WHERE SongTitle = '$title';";
                        foreach($dbh->query($sql) as $row) {
                            $id = $row['ID'];
                        }


                        header("location:../songdetailed.php?id=".$id);
                    
                    } else {
                        echo "error in sql<br>";
                        echo $sql;    
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            //header('location:../index.php');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }   
    } else {
    //UPLOADING additional SONGS//
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
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "mp3" && $imageFileType != "wav" && $imageFileType != "ogg" && $imageFileType != "png" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $musicPath = $target_file;

            $originalSong = 0;
            $sql = "SELECT ID FROM Songs WHERE SongTitle = '$addition';";
            foreach($dbh->query($sql) as $row) {
                $originalSong = $row['ID'];
            }


            $sql = "INSERT INTO AditionalTracks (`SongID`, `UserID`, `Path`) VALUES ('$originalSong','$user','$musicPath');";
            if ($dbh->query($sql) === TRUE) {
                header("location:../songdetailed.php?id=".$originalSong);
            } else {
                echo "error in sql<br>";
                echo $sql;    
            }
            //header('location:../home.php');
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } 



    }
?>