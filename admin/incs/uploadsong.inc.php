<?php

    if (!isset($_POST['uploadsong'])) {
        # code...
        header("Location:../");
        exit();
    }
    require "dbh.inc.php"; 
    require "function.inc.php"; 
    
    foreach ($_POST as $key) {
        # code...
        if (empty($key)) {
            # code...
        header("Location:../?error=emptyinput");
        exit();
            
        }
    }
    
    $SongName = $_POST['songname'];
    $artistName = $_POST['artistname'];
    $Featured = $_POST['featured'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    $file = $_FILES['file'];

    if (uploadSong($conn, $SongName, $artistName, $description, $category, $file, $Featured) !== false) {
        # code...
        header("Location:../?error=uploadsucess");
        exit();
    }