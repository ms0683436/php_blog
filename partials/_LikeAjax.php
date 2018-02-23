<script type="text/javascript">
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip(); 
	});

	function likeFunction(post_id) {
		var isActive = document.getElementById('like'+post_id).getAttribute("aria-pressed");
		var mode = (isActive == 'true') ? 'unlike' : 'like';
		
		var xmlhttp = new XMLHttpRequest();
	    var data = "mode=" + mode + "&post_id=" + post_id;
	    xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	        	var returnData = this.responseText;
	        	//console.log(returnData)
	        	document.getElementById('countlike'+post_id).innerHTML = returnData;
	        }
	    };
	    xmlhttp.open("POST", "controller/likeController.php", true);
	    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	//post must add this
	    xmlhttp.send(data);
	    
	}
</script>
<?php
function countLike($post_id, $conn){
	$sql = "SELECT COUNT(user_id) FROM likeList WHERE post_id = ".$post_id;
	if ($result = $conn->query($sql)) {
		return $result->fetch_row()[0];
	}
}

function isLikeActive($post_id, $user_id, $conn){
	$sql = "SELECT user_id FROM likelist WHERE post_id = $post_id AND user_id = $user_id";
	if ($result = $conn->query($sql)) {
		return $result->fetch_row()[0];
	}
}