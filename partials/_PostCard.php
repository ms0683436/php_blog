<?php require "_CommentAjax.php" ?>	<!--	call comment ajax function 	-->
<?php require "_LikeAjax.php" ?>	<!--	call comment ajax function 	-->
<?php
if($result = $conn->query($sql)){
	while($row = $result->fetch_row()){
		//var_dump($row);
		$countLike = countLike($row[0], $conn);		//count like
		$isLikeActive = "";
		$isLikePressed = "false";
		if(isset($_SESSION['user_id'])){
			$isLikeActive = isLikeActive($row[0], $_SESSION['user_id'], $conn);		//like button active
			if($isLikeActive){
				$isLikeActive = "active";
				$isLikePressed = "true";
			}
		}
		echo "<div class='card w-75'>
			    <div class='card-body'>
			        <h5 class='card-title'>$row[2]</h5>
			        <small class='text-muted'>Last updated $row[5]</small>
			        <p class='card-text'>$row[3]</p>
			    </div>
			    <div class='card-footer'>
			  	<p>
			  		<button type='button' class='btn btn-outline-success";
		echo isset($_SESSION['user_id']) ? " $isLikeActive' id='like$row[0]' onclick='likeFunction($row[0])' data-toggle='button' aria-pressed='$isLikePressed'" : " disabled' data-toggle='tooltip' title='you have to login!'";
		echo 		">
					  Like<span class='badge badge-light' id='countlike$row[0]'>$countLike</span>
					</button>
				  	<button onclick='showComment($row[0])' type='button' class='btn btn-outline-primary' data-toggle='collapse' data-target='#$row[0]' aria-expanded='false' aria-controls='collapseExample'>
				    Comment
				  	</button>";
		//CSRF problem
		if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $row[1]) {
			echo 	"<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' data-id='$row[0]' data-title='$row[2]' data-body='$row[3]'>Edit</button>
			        <a href='controller/postController.php?mode=delete&id=$row[0]&current_user_page_id=";
			echo isset($_GET['current_user_page_id']) ? $_GET['current_user_page_id'] : "index";
			echo     "' class='btn btn-danger'>Delete</a>";
		}
		echo   "</p>
			  	<div class='collapse' id='$row[0]'>";
		if (isset($_SESSION['user_id'])) {
			echo 	"<div class='input-group mb-3'>
					  <div class='input-group-prepend'>
					    <span class='input-group-text' id='basic-addon1'>123</span>
					  </div>
					  <input type='text' id='comment_content$row[0]' class='form-control' placeholder='Username' aria-label='Username' aria-describedby='basic-addon1'>
					  <div class='input-group-append'>
					    <button onclick='leaveComment($row[0])' class='btn btn-outline-secondary' type='button'>send</button>
					  </div>
					</div>";
		}else{
			echo "<p>you have to login to leave message</p>";
		}
			echo 	"<div id='comment$row[0]'>
					</div>
				</div>
			    </div>
			</div>";
	}
}