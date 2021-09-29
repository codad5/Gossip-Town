<?php

function uploadSong($conn, $SongName, $artistName, $description, $category, $file, $Featured){

    
    $fileName =  $file['name'];
   $fileTmpName =  $file['tmp_name'];
   $fileSize =  $file['size'];
   $fileError =  $file['error'];
   $fileType =  $file['type'];

   $fileExt = explode('.', $fileName);
   $fileActualExt = strtolower(end($fileExt));

   $allowed = array('mp3', 'mpeg');
   $fileNameNew = "";


    if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
        if ($fileSize < 10000000) {
            $songId = uniqid('Meme', true);
          $fileNameNew = $songId.".".$fileActualExt;
          $fileDestination = "../../uploads/music/".$fileNameNew;

          $sql = "INSERT INTO songupload(SongId, SongName, ArtistName, FeArtist, Descriptions, SongFile, SongCat) VALUES (?, ?, ?, ?, ?, ?, ?);";
          
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../admin/index.php?error=stmtfailed");
            exit();
        }
         mysqli_stmt_bind_param($stmt, "sssssss", $songId, $SongName, $artistName, $Featured, $description, $fileNameNew, $category);
         mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    
          move_uploaded_file($fileTmpName, $fileDestination);

            return true;

        }
        else {
          header("location:../?filetobig");
          exit();
        }
    }

    else {
      header("location:../?fileerror");
          exit();

    }
  }
  else {
    header("location:../?fileerror=wrongfiletype");
          exit();

  }
}

function checkNewsImg($file) {
     $fileName =  $file['name'];
   $fileTmpName =  $file['tmp_name'];
   $fileSize =  $file['size'];
   $fileError =  $file['error'];
   $fileType =  $file['type'];

   $fileExt = explode('.', $fileName);
   $fileActualExt = strtolower(end($fileExt));

   $allowed = array('png', 'jpg', 'svg', 'gif');
   $fileNameNew = "";


    if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
        if ($fileSize < 10000000) {
            $ImgId = uniqid('Meme', true);
          $fileNameNew = $ImgId.".".$fileActualExt;
          $fileDestination = "../../uploads/image/".$fileNameNew;

            return array($ImgId, $fileNameNew, $fileDestination, $fileTmpName);
            

        }
        else {
          return false;
          exit();
        }
    }

    else {
     return false;
          exit();

    }
  }
  else {
    
    return false;
    
          exit();

  }
}

function  uploadNews($conn, $Title, $description, $category, $file1, $file2, $file3){

    $img1 = checkNewsImg($file1);
    $img2 = checkNewsImg($file2);
    $img3 = checkNewsImg($file3);

    if ($img1 !== false) {

        $img1name = $img1[1];
        # code...
    }
    else if ($img1 === false && $img2 !== false) {
        $img1name = $img2[1];
    }
    else if ($img1 === false && $img2 === false && $img3 !== false) {
      $img1name = $img3[1];
    }
    else {
      header("location:../?error=NoImage");
      exit();
    }
    if ($img2 !== false) {

        $img2name = $img2[1];
        # code...
    }
    else if ($img2 === false && $img3 !== false) {
        $img2name = $img3[1];
    }
    
    else {
        $img2name = "";
    }
    
    if ($img3 !== false) {

        $img3name = $img3[1];
        # code...
    }
    else {
        $img3name = "";
    }

    $NewsId = uniqid("MemeNews", true);
     $sql = "INSERT INTO news(NewsId, Title, Descriptions, Cat, Img1, Img2, Img3) VALUES (?, ?, ?, ?, ?, ?, ?);";
          
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../admin/index.php?error=stmtfailed");
            exit();
        }
         mysqli_stmt_bind_param($stmt, "sssssss", $NewsId, $Title, $description, $category, $img1name, $img2name, $img3name);
         mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

    
        //   move_uploaded_file($fileTmpName, $fileDestination);
        if ($img1 !== false) {

        move_uploaded_file($img1[3], $img1[2]);
        # code...
    }
    if ($img2 !== false) {
        
        move_uploaded_file($img2[3], $img2[2]);
        # code...
    }
    if ($img3 !== false) {
        
        move_uploaded_file($img3[3], $img3[2]);
        # code...
    }

}