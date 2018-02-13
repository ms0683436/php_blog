<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<?php require "partials/_header.php" ?>
</head>
<body>
	<?php require "partials/_navbar.php" ?>
	<div class="container">
		<?php 
			require "connecter.php";

			$sql = "SELECT * FROM posts ORDER BY id DESC";	//search all posts
			require "partials/_PostCard.php";	//print post card
		?>
	</div>
	<?php require "partials/_EditPost.php" ?>	<!--	editer card 	-->
</body>
</html>