<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>sign up</title>
	<?php require "partials/_header.php" ?>
</head>
<body>
	<?php require "partials/_navbar.php" ?>
	<?php 
		if (isset($_SESSION['error'])){
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		}
	?>
	<div class="container">
		<form id="user" action="controller/signupController.php" method="POST">
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="email" name ="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : ""; ?>" required>
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="name">Name</label>
		    <input class="form-control" id="name" name ="name" placeholder="Enter Name" required>
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" id="password" name ="password" placeholder="Enter Password" value="" required>
		  </div>
		  <div class="form-check">
		    <label class="form-check-label">
		      <input type="checkbox" class="form-check-input" name="remember" value="1">
		      Remember Me
		    </label>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>