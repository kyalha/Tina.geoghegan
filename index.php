<!DOCTYPE html>
<html>
<?php include 'controller.php'; ?>
	<head>
		<title>Christina Geoghegan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/index.css" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>
		<script src="js/main.js"></script>
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
								/*
								while($res_image = $result_images->fetch_row()){
									echo '<img src="'.$res_image[1] .'">'. $res_image[1]. '</option>';
								 } 
								*/
								 ?>
			</section>

		</div>
		<footer>
			 	<a href="/bio"><img src="images/fb.png" class="icon element"></a>
				<a href="/bio"><img src="images/linkedin.png" class="icon element"></a>
				<p>Christina Geoghegan - 2016</p>
		</footer>
	</body>
</html>
