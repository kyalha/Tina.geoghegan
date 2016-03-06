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
?>
	<head>
		<title>Christina Geoghegan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/index.css" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<!--<link href='https://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>-->
		<script src="js/user.js"></script>
		<script src="ResponsiveSlides.js-master/responsiveslides.min.js"></script>
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
				        <a href="/print" class="underline" id="portfolio">Portfolio</a>
				    </li>
				    <li>
				        <a href="/web" class="underline" id="exhibition">Exhibition</a>
				    </li>
				    <li>
				        <a href="/bio" class="underline" id="biography">Biography</a>
				    </li>
				    <li>
				        <a href="/contact" class="underline" id="contact">Contact</a>
				    </li>
				  </ul>

		</nav>
	</header>
		<div class="container">
			<aside style="display:none;">
			</aside>

			<section class="main">
				<?php
				echo '<div class="rslides">';
				while($row = $result_images->fetch_assoc()) {
					echo ' <li><img src="'.$row["path"].'" alt="' . $row["name"] .'" id="' . $row["name"] .'" class="slide"> </li>';
				}
				echo '</div>';
				 ?>
			</section>

		</div>
		<footer>
			 	<a href="https://www.facebook.com/tinageogheganart/?fref=ts" target="_blank" ><img src="images/icons/fb.png" class="icon element"></a>
				<a href="https://ie.linkedin.com/in/tinageoghegan" target="_blank"><img src="images/icons/linkedin.png" class="icon element"></a>
				<p>Christina Geoghegan - 2016</p>
		</footer>
	</body>
</html>
