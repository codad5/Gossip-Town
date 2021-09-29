<?php
  require "incs/getfunc.inc.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>MEME_WORLD</title>
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/smscreen.css">
  <link rel="stylesheet" href="css/lgscreen.css">
  <link rel="apple-touch-icon" href="favicon.png">
  <link rel='stylesheet' href="css/animate/animate.min.css">


  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<body onloadstart="console.log('hi')">
  <header class="">
    <div class="header-logo"><span>M</span>EME WORLD.<sub class="">com</sub></div>
    <nav>
      <ul>
        <li><a href="music.php">MUSIC</a></li>
        <li><a href="video.php">VIDEO</a></li>
        <li><a href="contact.php">CONTACTS</a></li>
      </ul>
    </nav>
  </header>
  <main class="">
    <section class="hero-section">
      <div class="hot-topic article-topic">

        <div class="topic-header">
          <span>WHATS</span> NEW HERE!
        </div>
        <?php 
             $topNews = getLatestNews($conn);

             if ($topNews !== null) {
               # code...
               echo '<article class="hot-article">
              <img src="uploads/image/'.$topNews['Img1'].'" alt="" srcset="">
              <div class="article">
                '.$topNews['Title'].'
              </div>
            </article>';
             }
             else {
               echo '<article class="hot-article">
              <img src="img/3.png" alt="" srcset="">
              <div class="article">
                Welcome To MEME_WORLD
              </div>
            </article>';
             }

             
            ?>




        <!-- <article class="hot-article">
              <img src="" alt="" srcset="">
              <div class="article">
                2win Describe how he began
              </div>
            </article> -->
      </div>
      <div class="top-week-song article-topic">
        <div class="topic-header">
          <span>WEEK</span> TOP SONGS
        </div>
        <div class="song-list-cnt">
          <?php
            $sql = "SELECT * FROM songupload ORDER BY SongOrder LIMIT 4;";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
              # code...
              while ($row = $resultData = mysqli_fetch_assoc($result)){
                

                if (!empty($row['FeArtist'])) {
                  # code...
                  $feArtist = "ft.<sub>".$row['FeArtist']."<sub>";
                }
                else {
                  $feArtist  = "";
                }
                echo '<div class="song-list" onloadstart="console.log(1)">
            <div class="song_img">

            </div>
            <div class="song-details">
              <div class="top-details list-details">
                '.$row['SongName'].' '.$feArtist.'
              </div>
              <div class="bottom-details list-details">
                '.$row['ArtistName'].'
              </div>

            </div>

          </div>';

              }
              
            }

            
          ?>
          
          
        </div>
      </div>
    </section>

    <section class="top-list">

    </section>
    <section class="tori-time">
      <div class="sec-title">
        TORI TIME
      </div>
      <div class="tori-news">
        <div class="tori-carousel">

        </div>
      </div>
    </section>

    <section class="news-section">

      <div class="section-title">
        NEWS
      </div>
      <div class="section-body">

        <div class="news-carousel">
          <div class="news-boards">

          </div>
          <div class="news-boards">

          </div>
          <div class="news-boards">

          </div>
          <div class="news-boards">

          </div>
          <div class="news-boards">

          </div>
          <div class="news-boards">

          </div>
          <div class="news-boards">

          </div>
        </div>


        <span class="leftbtn-news">
          
        </span>
        <span class="rightbtn-news">
          
        </span>
      </div>
    </section>
    

  </main>

  <footer>

  </footer>
















  <!-- <canvas id="myChart" width="400" height="400"></canvas> -->
  <!-- <script>
      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
      });
      </script> -->
</body>
<script>
  var newsboards = document.querySelectorAll('.news-boards');
  let lftbtn = document.querySelector('.leftbtn-news');
  let rthbtn = document.querySelector('.rightbtn-news');
  var position = 0;
  
  var noof = (newsboards.length ) * (window.innerWidth/(newsboards.length/2));
  lftbtn.addEventListener('click', function () {
    moveTiles("left");
  });
  rthbtn.addEventListener('click', function () {
    moveTiles("right");
  });


  function moveTiles(direction) {
    let styles = "";
    switch (direction) {
      case "left":
        position -= window.innerWidth/newsboards.length;
        styles = `right:${position}px;`;

        break;
      case "right":
        position += window.innerWidth/newsboards.length;
        styles = `right:${position}px;`;

        break;
      default:
        console.log("Invalid direction");
        break;

    }



    if (position < noof * 2.5 && position >= -noof / 2) {
      if (position < window.innerWidth + ((window.innerWidth/newsboards.length) * 4)) {
          newsboards.forEach(element => {
          element.style = styles;
        });
        
      }
      

    }


  }
</script>
<script>
    
    var position = 0;
window.addEventListener("scroll", function(){
//     let trigger = document.querySelector(".top-five-homes");
  let classs = document.querySelectorAll("div");
    let header = document.querySelector(".header");
classs.forEach(element => {
    let boxtop = element.getBoundingClientRect().top;
    let boxbtm = element.getBoundingClientRect().bottom;
    if (boxtop <= window.scrollY) {
      element.classList.add('animate__animated', "animate__fadeInLeftBig");
       
       
    }
    
    else if (boxtop > window.scrollY) {
      element.classList.remove('animate__animated', "animate__fadeInLeftBig");
       
       
    }
});
    

    

    

   
});
  </script>
<script src="scripts/main.js"></script>
</html>