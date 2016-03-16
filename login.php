<?php
require_once 'session.php';
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tinageo";
$con=mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_errno($con))
{
  return false;
}
if (isset($_SESSION["login"])){
	header("Location: admin.php");
}
 ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Christina Geoghegan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<script type="text/javascript" src="js/main.js" language="JavaScript"></script>
		<link rel="stylesheet" href="style/login.css" type="text/css">
	</head>
	<body>
		<header></header>
			<div class="container">
				<div class="form">
					<label for="loginName" style="display:none;">Admin</label>
					<input type="text" name="loginAdmin" id="loginName" placeholder="admin" class="login"></input>
					<label for="loginPwd" style="display:none;">Password</label>
					<input type="password" name="loginPassword" id="loginPwd" placeholder="********" class="password"></input>
					<button class="submit" id="loginButton"> Login </button>
          <p id="error"></p>
				</div>
			</div>
			<footer></footer>
	</body>
</html>
