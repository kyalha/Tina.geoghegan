<!DOCTYPE html>
<html>
<?php include 'controller.php';?>
	<head>
		<title>Christina Geoghegan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href='https://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/main.js" language="JavaScript"></script>
		 <script src="ckeditor/ckeditor.js"></script>
		 <style>
		 body, html {
		  height: 100%;
			width:100%;
		  overflow:hidden;
			padding: 0;
			margin: 0;
		}
		.container {
			width: 100%;
			height: 100%;
			background-color: #3399ff;
		}
		form{
			width: 500px;
			height: 300px;
			background-color: white;
			position: fixed; /* or absolute */
		  top: 50%;
		  left: 50%;
			margin-top: -150px;
			margin-left: -250px;
			border-radius: 10px;
			font-size: : 24px;
		}
		input{
			width:200px;
			height: 50px;
			margin-left: -100px;
			margin-top:-25px;
			position: fixed;
			border-radius: 10px;
		}
 .login {
			left:50%;
			top:40%;
		}
		.password {
			left:50%;
			top:60%;
		}
		 </style>
	</head>
	<body>
		<header></header>
			<div class="container">
				<form action="" method="post">
					<label for="loginName" style="display:none;">Folder name:</label>
					<input type="text" id="loginName" placeholder="admin" class="login"></input>
					<label for="loginPwd" style="display:none;">Password</label>
					<input type="password" id="loginPwd" placeholder="********" class="password"></input>
				</form>
			</div>
			<footer>
			</footer>
	</body>
</html>
