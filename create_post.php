<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Post</title>
	<?php require "partials/_header.php" ?>
</head>
<body>
	<?php require "partials/_navbar.php" ?>
	<div class="container">
		<form action="controller/postController.php" method="POST">
		  <div class="form-group">
		    <label for="title">Title</label>
		    <input type="text" class="form-control" id="title" name ="title" placeholder="Enter Title">
		  </div>
		  <div class="form-group">
		    <label for="body">Post Body</label>
		    <textarea class="form-control" id="body" name="body" rows="5" placeholder="say something"></textarea>
		  </div>
		  <button type="submit" class="btn btn-primary" name="mode" value="new">Submit</button>
		</form>
	</div>
</body>
</html>