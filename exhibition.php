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
    <style>
      .main{
          word-wrap: break-word;
          margin-top: 50px;
          margin-left: 20%;
          margin-right: 20%;
          margin-bottom: 50px;
      }
    </style>
	</head>
	<body>
	<header><?php require_once 'navbar.php';?></header>
		<div class="container" id="containerID">
			<aside style="display:none;">
			</aside>

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
		<footer>
			 	<a href="https://www.facebook.com/tinageogheganart/?fref=ts" target="_blank" ><img src="images/icons/fb.png" class="icon element"></a>
				<a href="https://ie.linkedin.com/in/tinageoghegan" target="_blank"><img src="images/icons/linkedin.png" class="icon element"></a>
				<p>Christina Geoghegan - 2016</p>
		</footer>
	</body>
</html>
