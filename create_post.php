<?php session_start();
if (!isset($_SESSION['user_id'])) {
	$_SESSION['error'] = '請先登入';
	header("Location: login.php");
}
?>
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
		<input type="text" class="form-control" id="current_user_page_id" name ="current_user_page_id" value="<?php echo $_GET['current_user_page_id']?>" hidden="true">
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