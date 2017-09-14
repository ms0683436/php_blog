<?php 
session_start([
    'cookie_lifetime' => 30,
]);

if (!isset($_SESSION['user'])) {
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
		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
		    <h1 class="display-3">Fluid jumbotron</h1>
		    <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
		  </div>
		</div>
	</div>
</body>
</html>