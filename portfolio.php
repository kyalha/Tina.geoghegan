<!DOCTYPE html>
<html>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tinageo";
$con=mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_errno($con))
{
  return false;
}
$select_images = "select * from image;";
$result_images = mysqli_query($con,$select_images);
$select_thumb = "select * from image;";
$result_thumb = mysqli_query($con,$select_thumb);
$select_folders = "select * from folder;";
$result_folders = mysqli_query($con,$select_folders);

$allFolders = [];

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Christina Geoghegan</title>
  <link rel="stylesheet" href="style/responsiveslides.css">
  <link rel="stylesheet" href="style/index.css" type="text/css">
  <link rel="stylesheet" href="style/portfolio.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/portoflio_user.js"></script>
  <script>
    </script>
  </head>
  <body>
    <header>
      <nav class="navbar shadow">
        <p class="title"> Christina Geoghegan </p>
        <ul class= "menu">
          <li>
            <a href="index.php" class="underline" id="home">Home</a>
          </li>
          <li>
            <a href="portfolio.php" class="underline" id="potfolio">Portfolio</a>
          </li>
          <li>
            <a href="biography.php" class="underline" id="biography">Biography</a>
          </li>
          <li>
            <a href="exhibition.php" class="underline" id="exhibition">Exhibition</a>
          </li>
          <li>
            <a href="contact.php" class="underline" id="contact">Contact</a>
          </li>
        </ul>
      </nav>
    </header>
    <div class="container">
      <aside>
        <p>Select album: </p>
        <div id="albumList">
          <?php
          $iFolder = 0;
          while($res_fol = $result_folders->fetch_row()){
            $allFolders[$iFolder] = $res_fol[1];
            echo '<button id="'.$res_fol[1].'" class="option" value="'.$res_fol[1].'" onclick="displayImages(this.value)"><p>'.$res_fol[1] .'</p></button>';
            $iFolder++;
          }
          ?>
      </div>
      </aside>

      <section class="portfolio" id="rightContent">
          <div class="fullScreen" id="fullScreenID">
            <img id="imageToshow" src="" />
            <img id="enlarge" src="images/icons/enlarge.png" onclick="appearFullScreen(indexImage)" style="display:none"/>
            <img id="close" src="images/icons/close.png" onclick="leaveFullScreen()" style="display:none"/>
            <img id="left" src="images/icons/arrow-left.png" onclick="changePicture('left')" style="display:none"/>
            <img id="right" src="images/icons/arrow-right.png" onclick="changePicture('right')" style="display:none"/>
          </div>
          <?php
          echo '<div class="rslides" id="slider3">';
          while($row = $result_images->fetch_assoc()) {
              echo '<div class="'. $row["folder"] .'" id="details" style="width:100%;display:none;" name="slideImage">';
              echo '<p id="albumTitle'. $row["name"].'" style="display:none"> - '. $row["folder"] .' - </p>';
              echo '<img src="'.$row["path"].'" alt="' . $row["name"] .'" id="' . $row["name"] .'" class="slide"> <div class="descriptionDetails"  id="description' . $row["name"].'" style="position:absolute; background-color:black; color:white; opacity: 0.8; width:100%; height: 100%; bottom:0; left:0;right:0;height:30px; padding-left:40%; padding-top:5px;">'. $row["description"] .'</div>';
              echo '</div>';
          }
          echo '</div>';

          echo '<ul id="slider3-pager" class="showThumb">';
          while($row = $result_thumb->fetch_assoc()) {
              echo '<div class="'. $row["folder"] .'" id="detailsThumb" style="display:none" name="slideThumb">';
              echo '<img src="'.$row["path"].'" alt="' . $row["name"] .'" id="' . $row["name"] .'" class="slide" width="100px" height="100px" style="padding:5px;" onclick="changeImage(this.id)">';
              echo '</div>';
          }
          echo '</ul>';
          ?>
          <div id="noImages" style="display:none;">No images in this album to display.</div>
        </div>
      </section>
    </div>
    <footer>
      <a href="/bio"><img src="images/icons/fb.png" class="icon element"></a>
      <a href="/bio"><img src="images/icons/linkedin.png" class="icon element"></a>
      <p>Christina Geoghegan - 2016</p>
    </footer>
  </body>
  </html>
