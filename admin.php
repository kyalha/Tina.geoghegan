<!DOCTYPE html>
<?php include 'controller.php';?>
	<head>
		<title>Christina Geoghegan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/index.css" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/main.js" language="JavaScript"></script>
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
			<section class="main" id="rightContent">
				<form class='changePassword' style='display:none;' id='changePassword'>
					<label for='oldPassword'>Old password</label>
					<input type='password' name='oldPassword' placeholder='********'><br>
					<label for='newPassword'>New password</label>
					<input type='password' name='newPassword' placeholder='********'><br>
					<label for='confirmNew'>Confirm new password</label>
					<input type='password' name='confirmNew' placeholder='********'><br>
					<button type='button'>Change password </button>
				</form>
				<div class='general_view' id='general_view'>Folder:<select class="selectDirectory" id="selectDirectory" onchange="displayImages()">
						<?php
							$first_folder = "";
							while($res_fol = $result_folders->fetch_row()){
								echo '<option>'. $res_fol[1]. '</option>';
							 } ?>
					</select>
					<div class='showThumb' id='showThumb' style='display; flex; flex-wrap: nowrap;'>
						<?php
							while($res_ima = $result_images->fetch_row()){
									if($first_folder == $res_ima[1]  ){
										echo '<div class="'. $res_ima[1] .'" id="details" style="display:none">';
										echo '<img src="'.$res_ima[2].'" alt="' . $res_ima[3] .'" style="width:100px;height:100px;padding-right:10px;">';
										if(!empty($res_ima[2])){
											echo '<p class="name">' .'name: '.$res_ima[3].'</p>';
											echo '<p class="description">'. $res_ima[4] .'</p>';
										}
										echo '</div>';
									}else {
										echo '<div class="'. $res_ima[1] .'" id="details" style="display:none">';
										echo '<img src="'.$res_ima[2].'" alt="' . $res_ima[3] .'" style="width:100px;height:100px;padding-right:10px;">';
										if(!empty($res_ima[2])){
											echo '<p class="name">' .'name: '.$res_ima[3].'</p>';
											echo '<p class="description">'. $res_ima[4] .'</p>';
										}
										echo '</div>';
									}

							 } ?>
					</div>
				</div>
				<div class='handleFiles' id='handleFile'>
					<div class="thumbImages" id='thumb'>
							<div class="selectFile" id='selectFile'>
								<input type="file" id="files" name="files[]" multiple class="selectInput"/>
								<div id="drop_zone">Drop files here</div>
								<output id="list" class='output'></output>
								<button type='button'>add Files </button>
							</div>
					</div>
				</div>
				<span><?php echo $error; ?></span>
			</section>
		</div>
		<footer>
			 	<a href="/bio"><img src="images/fb.png" class="icon element"></a>
				<a href="/bio"><img src="images/linkedin.png" class="icon element"></a>
				<p>Christina Geoghegan - 2016</p>
		</footer>
	</body>
</html>
