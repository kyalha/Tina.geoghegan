<!DOCTYPE html>
<html>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tinageo";
$con=mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_errno($con))
{
  return false;
}
$select_bio = "select * from multimedia;";
$result_bio = mysqli_query($con,$select_bio);
?>
	<head>
		<title>Christina Geoghegan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/index.css" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	</head>
	<body>
	<header><?php require_once 'navbar.php';?></header>
		<div class="container" id="containerID">
			<aside style="display:none;"></aside>
			<section class="main index">
        <form action="" method="post" align="center" id="contactID">
          <p>Do not hesitate to contact me!</p>
          <div class="block">
            <label for="name">Your name</label>
            <input type="text" id="name" placeholder="your name"></input>
          </div>
          <div class="block">
          <label for="email">Your email</label>
          <input type="text" id="email" placeholder="your email"></input>
          </div>
          <div class="block" id="textArea">
          <label for="description">Message</label>
          <textarea form="contactID" id="description" placeholder=" your message"></textarea>
          </div>
          <div class="block">
            <label for="selectSubject">Subject</label>
            <select name="selection" id="selectSubject">
              <option value="Job Inquiry">Job Inquiry</option>
              <option value="General Question">General Question</option>
            </select>
          </div>
          <div class="block">
          <input type="submit" class="submit" value="Send">
          </div>
        </form>
			</section>

		</div>
    <?php require_once 'footer.php';?>
	</body>
</html>
