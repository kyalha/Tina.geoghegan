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
$select_exhib = "select * from multimedia;";
$result_exhib = mysqli_query($con,$select_exhib);
?>
	<head>
		<title>Christina Geoghegan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/index.css" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	</head>
	<body class="textContent">
	<header><?php require_once 'navbar.php';?></header>
		<div class="container" id="containerID">
			<aside style="display:none;"></aside>
			<section class="main index">
				<?php
        $array= "";
        while ($row = mysqli_fetch_array($result_exhib, MYSQL_NUM)) {
          if($row[0] == "exhibition"){
            printf($row[1]);
          }
      }
				 ?>
			</section>

		</div>
    <?php require_once 'footer.php';?>
	</body>
</html>
