<script>	//user ajax to search comment
function showComment(post_id) {	//issue second click should not call this function
	console.log(post_id)
    var xmlhttp = new XMLHttpRequest();
    var data = "mode=showAllComment&post_id=" + post_id;
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        	var returnData = JSON.parse(this.responseText);
        	returnData.forEach(function(element) {
			  	
		  		//console.log(element);
		  		var pobj = document.getElementById('comment');
		  		var node = document.createElement("a");
		  		node.className = 'btn btn-outline-secondary';
		  		node.innerHTML = element[1];
		  		var route = "posts.php?current_user_page_id=" + element[0];
		  		node.setAttribute("href", route);
		  		pobj.appendChild(node);

		  		var updateTime = document.createElement("small");
		  		updateTime.className = 'text-muted';
		  		updateTime.innerHTML = 'Last updated at ' + element[3];
				pobj.appendChild(updateTime);

				var content = document.createElement("div");
		  		content.className = 'card card-body';
		  		content.innerHTML = element[2];
	    		pobj.appendChild(content);

			});
        }
    };
    xmlhttp.open("POST", "controller/commentController.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	//post must add this
    xmlhttp.send(data);
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
			  	<div class='collapse' id='$row[0]'>
				  	<div class='input-group mb-3'>
					  <div class='input-group-prepend'>
					    <span class='input-group-text' id='basic-addon1'>123</span>
					  </div>
					  <input type='text' class='form-control' placeholder='Username' aria-label='Username' aria-describedby='basic-addon1'>
					</div>
					<div id='comment'>
					</div>
				</div>
			    </div>
			</div>";
	}
}