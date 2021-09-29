<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEME-WORLD-ADMIN</title>
</head>
<body>
        upload a new song

    <form action="incs/uploadsong.inc.php" method="post" enctype="multipart/form-data">

        <label for="songname">Song Name:</label>
        <input type="text" name="songname"> 
        <br>
        <label for="artist-Name">Artist Name:</label>
        <input type="text" name="artistname">
        <label for="artist-Name">featured:</label>
        <input type="text" name="featured">
        <label for="file">SONG File:</label>
        <input type="file" name="file" id="">
        <br>
        <label for="Description">Description:</label>
        <textarea name="description" id="" cols="30" rows="10" resize="0"></textarea>
        <label for="category">Category:</label>
        <input type="text" name="category">
        <button name="uploadsong" value="Upload">uploadsong</button>

    </form>
    <br>
    <br>
      <form action="incs/uploadnews.inc.php" method="post" enctype="multipart/form-data">

        <label for="Title">News TITLE</label>
        <input type="text" name="Title"> 
        <br>
        <!-- <label for="artist-Name">Artist Name:</label>
        <input type="text" name="artistname"> -->
        
        <label for="Description">Story:</label>
        <textarea name="description" id="" cols="30" rows="10" resize="0"></textarea>
        <label for="category">Category:</label>
        <input type="text" name="category">
        <label for="file">Pictures :</label>
        <input type="file" name="img1" id="">
        <input type="file" name="img2" id="">
        <input type="file" name="img3" id="">

        <br>
        <button name="uploadnews" value="Upload">uploadsong</button>

    </form>

   
</body>
</html>