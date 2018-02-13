<script>	//#todo   user ajax to search comment
	$(document).ready(function(){
		document.getElementById("comment").onclick = function() {showHint('a')};
	});
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").value = this.responseText;
            }
        };
        xmlhttp.open("GET", "partials/test.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<?php
if($result = $conn->query($sql)){
	while($row = $result->fetch_row()){
		//var_dump($row);
		echo "<div class='card w-75'>
			    <div class='card-body'>
			        <h5 class='card-title'>$row[2]</h5>
			        <small class='text-muted'>Last updated $row[5]</small>
			        <p class='card-text'>$row[3]</p>
			    </div>
			    <div class='card-footer'>
			  	<p>
			  		<button type='button' class='btn btn-outline-success' data-toggle='button' aria-pressed='true' autocomplete='off'>
					  Like<span class='badge badge-light'>4</span>
					</button>
				  	<button class='btn btn-outline-primary' id='comment' type='button' data-toggle='collapse' data-target='#$row[0]' aria-expanded='false' aria-controls='collapseExample'>
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
			  	<div class='collapse' id='$row[0]'>
				  	<div class='input-group mb-3'>
					  <div class='input-group-prepend'>
					    <span class='input-group-text' id='basic-addon1'>123</span>
					  </div>
					  <input type='text' id='txtHint' class='form-control' placeholder='Username' aria-label='Username' aria-describedby='basic-addon1'>
					</div>
					<div>
					  <a class='btn btn-outline-secondary' href='#' role='button'>Name</a>
					  <small class='text-muted'>Last updated 3 mins ago</small>
					  <div class='card card-body'>
					    content
					  </div>
					</div>
				</div>
			    </div>
			</div>";
	}
}