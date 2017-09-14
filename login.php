<?php session_start([
				    'cookie_lifetime' => 30,
				]); ?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
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
		<form action="loginController.php" method="POST">
		  <div class="form-group">
		    <label for="email">Email address</label>
		    <input type="email" class="form-control" id="email" name ="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $_COOKIE["email"];?>">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" id="password" name ="password" placeholder="Password" value="<?php echo $_COOKIE["password"];?>">
		  </div>
		  <div class="form-check">
		    <label class="form-check-label">
		      <input type="checkbox" class="form-check-input" name="remember" value="1" checked>
		      Remember Me
		    </label>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>
</html>