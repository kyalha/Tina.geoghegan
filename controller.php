<?php
$error='';

	if (isset($_POST['changePassword'])) {
		if (empty($_POST['oldPassword']) || empty($_POST['newPassword'] ||
					empty($_POST("confirmNew")) )) {
			$error = "invalid password";
		}else if($_POST['newPassword'] != $_POST['confirmNew']){
			$error = "New password inserted is not the same.";
		}else if($_POST['newPassword'] != $_POST['oldPassword']){
			$error = "Your password is similar to the new one.";
		}
	else{
		//================= identifications for database =================
		$servername = "localhost";
		$username = "root";
		$password = "mysqlitt12345";
		$dbname = "appointment_db";
		//================= Create connection =================
		$link = mysqli_connect($servername, $username, $password, $dbname);
		/* ===========   To protect MySQL injection for Security purpose ==================*/
		$value_user = stripslashes($value_user);
		$value_password = stripslashes($value_password);
		$value_user = mysqli_real_escape_string($link,$value_user);
		$value_password = mysqli_real_escape_string($link,$value_password);

		/* ===========   SQL query to fetch information of registerd users and finds user match.==================*/
		$sql="select * from admin where username='$value_user' AND password='$value_password'";

		$query = mysqli_query($link,$sql);
		$error = mysqli_num_rows($query);

		/* ===========   if the user exists in the database, we redirect the user to connected.php==================*/
			if (mysqli_num_rows($query) == 1) {
				$_SESSION['username']= $value_user;  // Initializing Session with value of PHP Variable
				//header("location: connected.php"); // Redirecting To Other Page
			} else {
				$error = "Wrong administrator name or password";
			}
		mysqli_close($link); // Closing Connection
		}
	}
	else if (isset($_POST['login'])) {
		if (empty($_POST['admin']) || empty($_POST['password'])) {
			$error = "invalid admin id or password";
		}
	else{
		//================= identifications for database =================
		$servername = "localhost";
		$username = "root";
		$password = "mysqlitt12345";
		$dbname = "appointment_db";
		//================= Create connection =================
		$link = mysqli_connect($servername, $admin, $password, $dbname);
		/* ===========   To protect MySQL injection for Security purpose ==================*/
		$admin = stripslashes($admin);
		$value_password = stripslashes($value_password);
		$admin = mysqli_real_escape_string($link,$admin);
		$value_password = mysqli_real_escape_string($link,$value_password);

		/* ===========   SQL query to fetch information of registerd users and finds user match.==================*/
		$sql="select * from admin where username='$admin' AND password='$value_password'";

		$query = mysqli_query($link,$sql);
		$error = mysqli_num_rows($query);

		/* ===========   if the user exists in the database, we redirect the user to connected.php==================*/
			if (mysqli_num_rows($query) == 1) {
				$_SESSION['username']= $value_user;  // Initializing Session with value of PHP Variable
				//header("location: connected.php"); // Redirecting To Other Page
			} else {
				$error = "Wrong administrator name or password";
			}

		mysqli_close($link); // Closing Connection
		}
	}

?>
