<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
	$_SESSION['error'] = '沒有權限';
	header("Location: login.php");
}

?>
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
		<div class="card w-75">
		  <div class="card-body">
		    <h5 class="card-title">Card title</h5>
		    <small class="text-muted">Last updated 3 mins ago</small>
		    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
		  </div>
		  <div class="card-footer">
		  	<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
		    Comment
		  </button>
		  	<div class="collapse" id="collapseExample">
		  	<input type="text" class="form-control" id="recipient-name" name="title" value="">
			  <div class="card card-body">
			    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
			  </div>
			</div>
	      </div>
		</div>
	</div>
</body>
</html>