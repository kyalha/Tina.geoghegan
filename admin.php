<!DOCTYPE html>
	<head>
		<title>Christina Geoghegan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/index.css" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>
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
				    <li>
				        <a href="/admin" class="underline" id="admin">Admin</a>
				    </li>
				  </ul>

		</nav>
	</header>
		<div class="container">
			<aside>
					<button class="option" onclick="selectPasswordOption()">Change password</button>
					<button class="option" onclick="selectGalleryOption()">Check gallery</button>

			</aside>
			<section class="main" id="main">

				<div class="selectFile">
					<input type="file" id="files" name="files[]" multiple class="selectInput"/>
					<output id="list"></output>
				</div>

				<div id="drop_zone">Drop files here</div>

				<span><?php echo $error; ?></span>
			</section>
		</div>
		<footer>
			 	<a href="/bio"><img src="images/fb.png" class="icon element"></a>
				<a href="/bio"><img src="images/linkedin.png" class="icon element"></a>
				<p>Christina Geoghegan - 2016</p>
		</footer>
	</body>
	<script type="text/javascript" src="js/main.js" language="JavaScript"></script>
</html>
