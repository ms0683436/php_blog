<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Navbar</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
	      </li>
	    </ul>
	    <ul class="navbar-nav ml-auto">
	    	<?php 
				if (!isset($_SESSION['user_id'])) {
					echo "<li class='nav-item'>
				        	<a class='nav-link' href='login.php'>Sign in</a>
				      	</li>
				      	<li class='nav-item'>
				        	<a class='nav-link' href='sign_up.php'>Sign up</a>
				      	</li>";
				} else {
					echo "<li class='nav-item dropdown'>
						        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
						          Hi ".$_SESSION['user_name']."
						        </a>
						        <div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
						          <a class='dropdown-item' href='posts.php?current_user_page_id=".$_SESSION['user_id']."'>Post</a>
						          <div class='dropdown-divider'></div>
						          <a class='dropdown-item' href='controller/logoutController.php'>Logout</a>
						        </div>
						      </li>";
				}
			?>
		    
	    </ul>
	  </div>
	</nav>