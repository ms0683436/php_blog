<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>All Posts</title>
	<?php require "partials/_header.php" ?>
</head>
<body>
	<?php require "partials/_navbar.php" ?>
	<div class="container">
		<div class="row">
			<h1 class="display-3 col-sm-11">Posts</h1>
			<div>
				<a href='create_post.php?current_user_page_id=<?php echo $_GET['current_user_page_id']?>' class='btn btn-success'>New Post</a>
			</div>
		</div>
		<div class="row">
			<?php 
				require "connecter.php";
				$userId_sql = "user_id = ".addslashes($_GET['current_user_page_id']);
				$sql = "SELECT * FROM posts WHERE ".$userId_sql." ORDER BY id DESC";	//search someone all posts
				require "partials/_PostCard.php";	//print post card
			  
			?>
		</div>
		<?php require "partials/_EditPost.php" ?>	<!--	editer card 	-->
	</div>
</body>
</html>