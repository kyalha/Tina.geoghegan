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
$select_images = "select * from image;";
$result_images = mysqli_query($con,$select_images);
?>
	<head>
		<title>Christina Geoghegan</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="style/index.css" type="text/css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="js/slideshow.js"></script>
	</head>
	<body class="homepage">
	<header><?php require_once 'navbar.php';?></header>
		<div class="container">
			<aside style="display:none;"></aside>
			<section class="main index">
				<?php
        $firstTime = true;
				echo '<div class="rslides" style="max-height:700px;">';
        echo '<ul>';
				while($row = $result_images->fetch_assoc()) {
            echo ' <li><img src="'.$row["path"].'" alt="' . $row["name"] .'" class="image" style="left:0; right:0; margin: auto;position:absolute;display:block; opacity:0; max-width:100%; max-height:600px;"> </li>';
        }
        echo '</ul>';
				echo '</div>';
				 ?>
			</section>

		</div>
    <?php require_once 'footer.php';?>
	</body>
</html>
