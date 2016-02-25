<!DOCTYPE html>
<html>
<?php include 'controller.php';?>
	<head>
		<title>Christina Geoghegan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/index.css" type="text/css">
		<link href='https://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/main.js" language="JavaScript"></script>
		<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
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
					<button class="option" onclick="selectPasswordOption()">Edit password</button>
					<button class="option" onclick="selectPortfolioOption()">Edit Portfolio</button>
					<button class="option" onclick="selectExhibitionOption()">Edit Exhibition</button>
					<button class="option" onclick="selectBiographyOption()">Check Biography</button>
			</aside>
			<section class="main" id="rightContent">
				<form class='changePassword' id='changePassword'>
					<h1>Edit Password</h1>
					<label for='oldPassword'>Old password</label>
					<input type='password' name='oldPassword' placeholder='********'><br>
					<label for='newPassword'>New password</label>
					<input type='password' name='newPassword' placeholder='********'><br>
					<label for='confirmNew'>Confirm new password</label>
					<input type='password' name='confirmNew' placeholder='********'><br>
					<button type='button'>Change password </button>
				</form>
				<div class='contentPortfolio' id='contentPortfolio' style='display:none'>
					<h1>Edit Portfolio</h1>
					<form class='editFolder' id='editFolder'>
						<p> Folder: </p>
						<select class="selectDirectory" id="selectDirectory" onchange="displayImages()">
							<?php
								$first_folder = "";
								while($res_fol = $result_folders->fetch_row()){
									echo '<option>'. $res_fol[1]. '</option>';
								 } ?>
						</select>
						<button type='button' onclick="addContentSave()">+</button>
						<button type='button' onclick='addContentUpdate()' id='update'>update</button>
						<button type='button' onclick='deleteFolder()' id='delete'>delete</button>
						<div class='contentAddFolder' id='contentAddFolder' style='display:none'>
							<label for="folderNameToSave">Folder name:</label>
							<input type="text" id="folderNameToSave" placeholder="new folder"></input>
							<button type="button" id="saveFolderID" onclick="saveFolder()">Save folder</button>
						</div>
						<div class='contentUpdateFolder' id='contentUpdateFolder' style='display:none'>
							<label for="folderNameToUpdate">Folder name:</label>
							<input type="text" id="folderNameToUpdate" placeholder="new folder"></input>
							<button type="button" id="updateFolderID" onclick="updateFolder()">Update folder</button>
						</div>
					</form>
					<div class='showThumb' id='showThumb' style='display; flex; flex-wrap: nowrap;'>
						<?php
							while($res_ima = $result_images->fetch_row()){
									if($first_folder == $res_ima[1]  ){
										echo '<div class="'. $res_ima[1] .'" id="details" style="display:none">';
										if(!empty($res_ima[2])){
											echo '<input type="checkbox" name="checkFile" value="'.$res_ima[3].'">';
										}
										echo '<img src="'.$res_ima[2].'" alt="' . $res_ima[3] .'" id="' . $res_ima[3] .'" style="width:100px;height:100px;padding-right:10px;">';
										echo '</div>';
									}else {
										echo '<div class="'. $res_ima[1] .'" id="details" style="display:none">';
										if(!empty($res_ima[2])){
											echo '<input type="checkbox" name="checkFile" value="'.$res_ima[3].'">' ;
										}
										echo '<img src="'.$res_ima[2].'" alt="' . $res_ima[3] .'" id="' . $res_ima[3] .'" style="width:100px;height:100px;padding-right:10px;">';
										echo '</div>';
									}

							 } ?>
					</div>
					<form class='editFiles' id='editFiles'>
						<button type='button' onclick="checkAll()">select all</button>
						<button type='button' onclick="uncheckAll()">Uncheck all</button>
						<button type='button'>delete</button>
					</form>
					<div class='handleFiles' id='handleFile'>
						<div class="thumbImages" id='thumb'>
								<div class="selectFile" id='selectFile'>
									<input type="file" id="files" name="files[]" multiple class="selectInput"/>
									<div id="drop_zone">Drop files here</div>
									<output id="list" class='output'></output>
									<button type='button'>Save files</button>
								</div>
						</div>
					</div>
				</div>
				<form class='contentExhibition' id='contentExhibition' style='display:none'>
					<h1>Edit Exhibitiom</h1>
					 <textarea class="ckeditor" id="exhibitionID" rows="5" cols="15"></textarea>
				</form>
				<form class='contentBiography' id='contentBiography' style='display:none'>
					<h1>Edit Biography</h1>
					 <textarea class="ckeditor" id="biographyID" rows="5" cols="15"></textarea>
				</form>
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
