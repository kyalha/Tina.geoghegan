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
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Christina Geoghegan</title>
  <link rel="stylesheet" href="responsiveslides.css">
  <link rel="stylesheet" href="../style/index.css" type="text/css">
  <link rel="stylesheet" href="portfolio.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="responsiveslides.min.js"></script>
  <script>
  $(function () {
    $("#slider3").responsiveSlides({
      manualControls: '#slider3-pager',
      maxwidth: 1000,
      auto: false
    });
  });


  function displayImages(classname) {
    var rslides = document.getElementsByClassName('rslides');
    var allDivs= document.getElementsByName("contentFile");
    var divsClass = document.getElementsByClassName(classname);
    document.getElementById('albumTitle').style.display= "inline";
    document.getElementById('albumTitle').innerHTML = classname;
    document.getElementById('slider3-pager').style.display= "inline-flex";
    document.getElementById('enlarge').style.display= "inline";
    for (var j = 0; j < allDivs.length; j++) {
      if(allDivs[j].className == classname){
        allDivs[j].style.display = 'inline-flex';
        document.getElementById('noImages').style.display= "none";
      }else {
        allDivs[j].style.display = 'none';
        document.getElementById('noImages').style.display= "none";
      }
    }
    if(divsClass.length == 0 || divsClass == undefined){
      document.getElementById('noImages').innerHTML= '<p style="padding: 10px;"> No images to display </p>';
      document.getElementById('noImages').style.display= "inline";
      document.getElementById('slider3-pager').style.display= "none";
      document.getElementById('enlarge').style.display= "none";
    }
  }

  function appearFullScreen (indexImage) {
    document.getElementById('fullScreenID').style.background = "url(../images/gallery/" +srcImages[indexImage] +") no-repeat center";
    document.getElementById('fullScreenID').style.width = "100%";
    document.getElementById('fullScreenID').style.height = "100%";
    document.getElementById('fullScreenID').style.position = "fixed";
    document.getElementById('fullScreenID').style.padding = "0";
    document.getElementById('fullScreenID').style.margin = "0";
    document.getElementById('fullScreenID').style.top = "0";
    document.getElementById('fullScreenID').style.left = "0";
    document.getElementById('fullScreenID').style.zIndex = "10";
    document.getElementById('fullScreenID').style.backgroundColor = "#000000";
    document.getElementById('close').style.display="inline";
    document.getElementById('left').style.display="inline";
    document.getElementById('right').style.display="inline";
    document.getElementById('left').style.opacity = "1";
    document.getElementById('right').style.opacity = "1";
    if(indexImage == 0){
      document.getElementById('left').style.opacity = "0.5";
    }
    else if(indexImage == srcImages.length-1){
       document.getElementById('right').style.opacity = "0.5";
   }
  }
    function leaveFullScreen() {
      document.getElementById('fullScreenID').style.background = "none";
      document.getElementById('fullScreenID').style.width = "0";
      document.getElementById('fullScreenID').style.height = "0";
      document.getElementById('fullScreenID').style.position = "inherit";
      document.getElementById('fullScreenID').style.padding = "0";
      document.getElementById('fullScreenID').style.margin = "0";
      document.getElementById('fullScreenID').style.top = "0";
      document.getElementById('fullScreenID').style.left = "0";
      document.getElementById('fullScreenID').style.zindex = "0";
      document.getElementById('fullScreenID').style.backgroundColor = "none";
      document.getElementById('close').style.display="none";
      document.getElementById('enlarge').style.display="inline";
      document.getElementById('left').style.display="none";
      document.getElementById('right').style.display="none";
    }
    var indexImage = 0;
    var srcImages = [];
    document.addEventListener("DOMContentLoaded", function(event) {
        var images = document.getElementById('slider3').getElementsByTagName('img');
        for(var i = 0; i < images.length; i++) {
            var newPath = images[i].src.substring(images[i].src.lastIndexOf("/")+1, images[i].src.length);
            srcImages.push(newPath);
        }
        var firstAlbum = document.getElementById("albumList").children[0];
        firstAlbum.style.background = "url('../images/icons/folder-open.png') center top no-repeat;";
      });

      function changePicture(direction){
          if(direction == "left" && indexImage > 0){
            indexImage--;
            appearFullScreen(indexImage);
          }else if(direction == "right" && indexImage < srcImages.length-1){
            indexImage++;
            appearFullScreen(indexImage);
          }
      }

    </script>
  </head>
  <body>
    <header>
      <nav class="navbar shadow">
        <p class="title"> Christina Geoghegan </p>
        <ul class= "menu">
          <li>
            <a href="../index.php" class="underline" id="home">Home</a>
          </li>
          <li>
            <a href="portfolio.php" class="underline" id="potfolio">Portfolio</a>
          </li>
          <li>
            <a href="../biography.php" class="underline" id="biography">Biography</a>
          </li>
          <li>
            <a href="../exhibition.php" class="underline" id="exhibition">Exhibition</a>
          </li>
          <li>
            <a href="../contact.php" class="underline" id="contact">Contact</a>
          </li>
        </ul>
      </nav>
    </header>
    <div class="container">
      <aside>
        <p>Select album: </p>
        <div id="albumList">
          <?php
          while($res_fol = $result_folders->fetch_row()){
            echo '<button id="'.$res_fol[1].'" class="option" value="'.$res_fol[1].'" onclick="displayImages(this.value)"><div class="folderIcon"></div><p>'.$res_fol[1] .'</p></button>';
          }
          ?>
      </div>
      </aside>

      <section class="portfolio" id="rightContent">
          <div class="fullScreen" id="fullScreenID">
            <img id="enlarge" src="../images/icons/enlarge.png" onclick="appearFullScreen(indexImage)" style="display:inline"/>
            <img id="close" src="../images/icons/close.png" onclick="leaveFullScreen()" style="display:none"/>
            <img id="left" src="../images/icons/arrow-left.png" onclick="changePicture('left')" style="display:none"/>
            <img id="right" src="../images/icons/arrow-right.png" onclick="changePicture('right')" style="display:none"/>
          </div>
          <p id="albumTitle"></p>
          <?php
          echo '<div class="rslides" id="slider3">';
          while($row = $result_images->fetch_assoc()) {
            echo '<div class="'. $row["folder"] .'" id="details" style="width:100%;" name="contentFile">';
            echo ' <li><img src="../'.$row["path"].'" alt="' . $row["name"] .'" id="' . $row["name"] .'" class="slide"> <div class="descriptionDetails" style="position:absolute; background-color:black; color:white; opacity: 0.8; width:100%; height: 100%; bottom:0; left:0;right:0;height:30px; padding-left:40%; padding-top:5px;">'. $row["description"] .'</div></li>';
            echo '</div>';
          }
          echo '</div>';

          echo '<ul id="slider3-pager">';
          while($row = $result_thumb->fetch_assoc()) {
            echo '<div class="'. $row["folder"] .'" id="detailsThumb" style="" name="contentFile">';
            echo ' <li><a href="#"><img src="../'.$row["path"].'" alt="' . $row["name"] .'" id="' . $row["name"] .'" class="slide" width="100px" height="100px" style="padding:5px;"></a></li>';
            echo '</div>';
          }
          echo '</ul>';
          ?>
          <div id="noImages"></div>
        </div>
      </section>
    </div>
    <footer>
      <a href="/bio"><img src="../images/icons/fb.png" class="icon element"></a>
      <a href="/bio"><img src="../images/icons/linkedin.png" class="icon element"></a>
      <p>Christina Geoghegan - 2016</p>
    </footer>
  </body>
  </html>
