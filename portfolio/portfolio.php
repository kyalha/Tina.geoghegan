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
  <link rel="stylesheet" href="portfolio.css">
  <link rel="stylesheet" href="style/index.css" type="text/css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script src="responsiveslides.min.js"></script>
  <script>
    $(function () {
      $("#slider3").responsiveSlides({
        manualControls: '#slider3-pager',
        maxwidth: 1000
      });
    });


    function displayImages(classname) {
       var rslides = document.getElementsByClassName('rslides');
        var allDivs= document.getElementsByName("contentFile");
        for (var j = 0; j < allDivs.length; j++) {
                if(allDivs[j].className == classname){
                    allDivs[j].style.display = 'inline';
                    document.getElementById('slider3').style.display = 'flex';
                    document.getElementById('slider3-pager').style.display = 'flex';
                    document.getElementById('noImages').style.display = 'none';
                  }else {
                    allDivs[j].style.display = 'none';
                    document.getElementById('slider3').style.display = 'none';
                    document.getElementById('slider3-pager').style.display = 'none';
                      document.getElementById('noImages').innerHTML= '<p style="padding: 10px;"> No images to display </p>';
                  }
              }
      }

  </script>
  <style>
  .main {
      order: 2;
    display: flex;
    flex-grow: 3;
    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
    -webkit-column-count: 2;
    -moz-column-count: 2;
    column-count: 2;
    }

    .rslides_tabs {
      display: flex;
      padding: 10px;
    }

    .container{
      -webkit-column-count: 2;
      -moz-column-count: 2;
      column-count: 2;
    }
  </style>
</head>
<body>

	<header>
		<nav class="navbar shadow">
				  <p class="title"> Christina Geoghegan </p>
				  <ul class= "menu">
				    <li>
				    	<a href="/" class="underline" id="home">Home</a>
				    </li>
				    <li>
				        <a href="/print" class="underline" id="work">Work</a>
				    </li>
				    <li>
				        <a href="/web" class="underline" id="cv">C.V</a>
				    </li>
				    <li>
				        <a href="/bio" class="underline" id="biography">Biography</a>
				    </li>
				    <li>
				        <a href="/contact" class="underline" id="contact">Contact</a>
				    </li>
				    <li>
				        <a href="/admin" class="underline" id="admin">Admin</a>
				    </li>
				  </ul>

		</nav>
	</header>
  <div class="container">
      <aside>
        <?php
        echo '<p>Select album: </p>';
        while($res_fol = $result_folders->fetch_row()){
          echo '<button class="'. $res_fol[1] .' option" value="'.$res_fol[1] .'" onclick="displayImages(this.value)"> '.$res_fol[1] .'</button>';
         }
         ?>
      </aside>

      <section class="portfolio" id="rightContent">
        <div id="wrapper">
          <?php
					echo '<div class="rslides" id="slider3">';
					while($row = $result_images->fetch_assoc()) {
            echo '<div class="'. $row["folder"] .'" id="details" style="" name="contentFile">';
						echo ' <li><img src="../'.$row["path"].'" alt="' . $row["name"] .'" id="' . $row["name"] .'" class="slide"> </li>';
	          echo '</div>';
          }
					echo '</div>';

          echo '<ul id="slider3-pager">';
          while($row = $result_thumb->fetch_assoc()) {
            echo '<div class="'. $row["folder"] .'" id="detailsThumb" style="" name="contentFile">';
            echo ' <li><a href="#"><img src="../'.$row["path"].'" alt="' . $row["name"] .'" id="' . $row["name"] .'" class="slide" width="100px" height="100px" style="padding:10px;"></a></li>';
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
