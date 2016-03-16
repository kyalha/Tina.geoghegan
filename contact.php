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
$select_bio = "select * from multimedia;";
$result_bio = mysqli_query($con,$select_bio);
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
	<header><?php require_once 'navbar.php';?></header>
		<div class="container">
			<aside style="display:none;">
			</aside>

			<section class="main index">
        <form action="" method="post">
          <label for="name" style="display:none;">name</label>
          <input type="text" id="name" placeholder="your name"></input>
          <label for="email" style="display:none;">email</label>
          <input type="text" id="email" placeholder="your email"></input>
          <label for="description" style="display:none;">description</label>
          <input type="text" id="description" placeholder="your description"></input>
          <input type="submit" class="submit" value="Send">
        </form>
			</section>

		</div>
		<footer>
			 	<a href="https://www.facebook.com/tinageogheganart/?fref=ts" target="_blank" ><img src="images/icons/fb.png" class="icon element"></a>
				<a href="https://ie.linkedin.com/in/tinageoghegan" target="_blank"><img src="images/icons/linkedin.png" class="icon element"></a>
				<p>Christina Geoghegan - 2016</p>
		</footer>
	</body>
</html>
