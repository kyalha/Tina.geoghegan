<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tinageo";
$_SESSION["login"] = "";
$con=mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_errno($con))
{
  return false;
}
 if(isset($_POST['loginName']) && isset($_POST['loginPwd'])){
     if(!empty($_POST['loginName']) && $_POST['loginName'] != '' && !empty($_POST['loginPwd']) && $_POST['loginPwd'] != ''){
       $check_admin="select * from admin where admin_id = '".  $_POST['loginName'] ."' && password = '" . $_POST['loginPwd']. "';";
       $result_checkAdmin= mysqli_query($con,$check_admin);
       if($result_checkAdmin)
          {
            $_SESSION["login"] = $_POST['loginName'];
            header("Location: admin.php");
						die();
          }
          else {
            $error = "Invalid login or password.";
          }
     }
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
					<button class="submit" onclick="connectAdmin()"> Login </button>
				</div>
			</div>
			<footer>
			</footer>
	</body>
</html>
