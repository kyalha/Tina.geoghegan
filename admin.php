<!DOCTYPE html>
<html>
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
					<button class="option" onclick="selectPortfolioOption()">Edit Portfolio</button>
					<button class="option" onclick="selectExhibitionOption()">Edit Exhibition</button>
					<button class="option" onclick="selectBiographyOption()">Edit Biography</button>
			</aside>
			<section class="main" id="rightContent">
				<div class='contentPortfolio' id='contentPortfolio' style='display:inline'>
					<h1>Edit Portfolio</h1>
					<form class='editFolder' id='editFolder'>
						<label for="selectDirectory">Folder:</label>
						<select class="selectDirectory" name="selectDirectory" id="selectDirectory" onchange="displayImages()">
							<option value="Choose a folder" id="optionToRemove">Choose a folder</option>
							<?php
								while($res_fol = $result_folders->fetch_row()){
									echo '<option value="'.$res_fol[1] .'">'. $res_fol[1]. '</option>';
								 } ?>
						</select>
						<button type='button' onclick="addContentSave()">+</button>
						<button type='button' onclick='addContentUpdate()' id='update'>update</button>
						<button type='button' id='delete' onclick="if(confirm('Are you sure you want to delete this folder and all files contained within?')){deleteFolder()}">delete</button>
						<div class='contentAddFolder' id='contentAddFolder' style='display:none'>
							<label for="folderNameToSave">Folder name:</label>
							<input type="text" id="folderNameToSave" placeholder="new folder"></input>
							<button type="button" id="saveFolderID" onclick="saveFolder()">Save folder</button>
						</div>
						<div class='contentUpdateFolder' id='contentUpdateFolder' style='display:none'>
							<label for="folderNameToUpdate">New folder name:</label>
							<input type="text" id="newFolderToUpdate" placeholder="new folder"></input>
							<button type="button" id="updateFolderID" onclick="updateFolder()">Update folder</button>
						</div>
					</form>
					<div class='showThumb' id='showThumb' style='display; flex; flex-wrap: nowrap;'>
						<?php
							$index = 0;
							while($res_ima = $result_images->fetch_row()){
										echo '<div class="'. $res_ima[1] .'" id="details" style="display:none;width:150px;" name="contentFile">';
										if(!empty($res_ima[2])){
											echo '<input src="'.$res_ima[2]. '"type="checkbox" name="checkFile" value="'.$res_ima[3].'">';
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
						<button type='button' onclick="checkAll()">select all</button>
						<button type='button' onclick="uncheckAll()">Unselect all</button>
						<button type='button' onclick="saveInfoFile()">Save</button>
						<button type='button' onclick="if(confirm('Are you sure you want to delete all these files?')){removeFiles()}">delete</button>
					</form>
					<div class='handleFiles' id='handleFile'>
						<div class="thumbImages" id='thumb'>
								<div class="selectFile" id='selectFile'>
									<input type="file" name="fileToUploadName" id="fileToUpload" onclick="displayfileInfo()">
									<output id="list" class='output'></output>
									<div id="addingFileInfo" style="display:none;">
										<label for="title">Tile:</label>
										<input type="text" id="title" placeholder="title"></input>
										<label for="fileDescription">Description:</label>
										<input id="fileDescription" placeholder="description..."></textarea>
									</div>
									<button type='button' onclick="saveFiles()">Save files</button>
								</div>
						</div>
					</div>
				</div>
				<form class='contentExhibition' id='contentExhibition' style='display:none'>
					<h1>Edit Exhibition</h1>
					 <textarea class="ckeditor" id="exhibitionID" rows="5" cols="15"></textarea>
					 <button type="button" id="updateExhibitionID" onclick="updateExhibition()">Update Exhibition</button>
				</form>
				<form class='contentBiography' id='contentBiography' style='display:none'>
					<h1>Edit Biography</h1>
					 <textarea class="ckeditor" id="biographyID" rows="5" cols="15"></textarea>
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
