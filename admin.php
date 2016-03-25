<?php
require_once 'session.php';

if (!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}else {
	include 'controller.php';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Christina Geoghegan</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="style/index.css" type="text/css">
	<link rel="stylesheet" href="style/admin.css" type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/main.js" language="JavaScript"></script>
	<script src="ckeditor/ckeditor.js"></script>
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
					<a href="biography.php" class="underline" id="biography">Biography</a>
				</li>
				<li>
					<a href="exhibition.php" class="underline" id="exhibition">Exhibition</a>
				</li>
				<li>
					<a href="contact.php" class="underline" id="contact">Contact</a>
				</li>
				<li>
					<a href="admin.php" class="underline" id="admin">Admin</a>
				</li>
			</ul>
		</nav>
	</header>
	<div class="container" id="containerID">
		<aside>
			<button class="option" type="button" id="selectPortfolioOption">Portfolio</button>
			<button class="option" type="button" id="selectExhibitionOption">Exhibition</button>
			<button class="option" type="button" id="selectBiographyOption">Biography</button>
			<button class="option" type="button" id="disconnectButton">Disconnect</button>
		</aside>
		<section class="main" id="rightContent">
			<div class='contentPortfolio' id='contentPortfolio' style='display:inline'>
				<h1>Edit Portfolio</h1>
				<form class='editFolder' id='editFolder'>
					<label for="selectDirectory">Folder:</label>
					<select class="selectDirectory" name="selectDirectory" id="selectDirectory">
						<option value="Choose a folder" id="optionToRemove">Choose a folder</option>
						<?php
						while($res_fol = $result_folders->fetch_row()){
							echo '<option value="'.$res_fol[1] .'">'. $res_fol[1]. '</option>';
						} ?>
					</select>
					<button type='button' id="addContentSave">+</button>
					<button type='button' id='addContentUpdate' id='update'>update</button>
					<button type='button' id='delete' onclick="if(confirm('Are you sure you want to delete this folder and all files contained within?')){deleteFolder()}">delete</button>
					<div class='contentAddFolder' id='contentAddFolder' style='display:none'>
						<label for="folderNameToSave">Folder name:</label>
						<input type="text" id="folderNameToSave" placeholder="new folder"></input>
						<button type="button" id="saveFolderID" id="saveFolder">Save folder</button>
					</div>
					<div class='contentUpdateFolder' id='contentUpdateFolder' style='display:none'>
						<label for="folderNameToUpdate">New folder name:</label>
						<input type="text" id="newFolderToUpdate" placeholder="new folder"></input>
						<button type="button" id="updateFolderID" id="updateFolder">Update folder</button>
					</div>
				</form>
				<div class='showThumb' id='showThumb'>
					<div id="noImages"></div>
					<?php
					$index = 0;
					while($res_ima = $result_images->fetch_row()){
						echo '<div class="'. $res_ima[1] .'" id="details" style="display:none;width:150px;margin:10px;" name="contentFile">';
						if(!empty($res_ima[2])){
							echo '<input src="'.$res_ima[2]. '"type="checkbox" name="checkFile" value="'.$res_ima[3].'" id="'.$res_ima[1] .'">';
						}
						echo '<img src="'.$res_ima[2].'" alt="' . $res_ima[3] .'" id="' . $res_ima[0] .'" style="width:100px;height:100px;padding-right:10px;">';
						echo '<input type="text" name="fileNameInfo" id ="imageName'.$index.'" placeholder="' .$res_ima[3] .'"/>';
						echo '<input type="text" name="fileDescriptionInfo" id="descriptionName'.$index.'" placeholder="' .$res_ima[4] .'"/>';
						echo '</div>';
						$index++;
					} ?>
				</div>
				<form class='editFiles' id='editFiles'>
					<p>Notice: You can edit only one file at once.</p>
					<button type='button' id="checkAll">select all</button>
					<button type='button' id="uncheckAll">Unselect all</button>
					<button type='button' id="saveInfoFile">Save</button>
					<button type='button' id="removeFilesID" onclick="if(confirm('Are you sure you want to delete all these files?')){removeFiles()}">delete</button>
				</form>
				<div class='handleFiles' id='handleFile'>
					<div class="thumbImages" id='thumb'>
						<div class="selectFile" id='selectFile'>
							<label for="fileToUpload">Add a file</label>
							<input type="file" name="fileToUploadName" id="fileToUpload">
							<output id="list" class='output'></output>
							<div id="addingFileInfo" style="display:none;">
								<div class="block">
									<label for="title">Tile:</label>
									<input type="text" id="title" placeholder="title"></input>
								</div>
								<div class="block">
									<label for="fileDescription">Description:</label>
									<input id="fileDescription" placeholder="description..."></textarea>
								</div>
								<div class="blockButton">
									<button type='button' id="saveFiles">Save files</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form class='contentExhibition' id='contentExhibition' style='display:none;'>
				<h1>Edit Exhibition</h1>
				<textarea class="ckeditor" id="exhibitionID" rows="5" cols="15">
					<?php
					while($res_exhib= $result_exhib->fetch_row()){
						echo $res_exhib[1];
					} ?>
				</textarea>
				<button type="button" id="updateExhibitionID" onclick="updateExhibition()">Update Exhibition</button>
			</form>
			<form class='contentBiography' id='contentBiography' style='display:none;'>
				<h1>Edit Biography</h1>
				<textarea class="ckeditor" id="biographyID" rows="5" cols="15">
					<?php
					while($res_bio= $result_bio->fetch_row()){
						echo $res_bio[1];
					} ?>
				</textarea>
				<button type="button" id="updateBiographyID" onclick="updateBiography()">Update Biography</button>
			</form>
			<span><?php echo $error; ?></span>
		</section>
	</div>
	<footer>
		<a href="/bio"><img src="images/icons/fb.png" class="icon element"></a>
		<a href="/bio"><img src="images/icons/linkedin.png" class="icon element"></a>
		<p>Christina Geoghegan - 2016</p>
	</footer>
</body>
</html>
