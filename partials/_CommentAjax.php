<script>	
function showComment(post_id) {		//user ajax to search comment
	//issue click other comment button the first comment will disappear
	var isShow = document.getElementById(post_id);
	
	if (isShow.className == 'collapse') {
	    var xmlhttp = new XMLHttpRequest();
	    var data = "mode=showAllComment&post_id=" + post_id;
	    xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	        	var returnData = JSON.parse(this.responseText);
	        	returnData.forEach(function(element) {
				  	
			  		//console.log(element);
			  		var pobj = document.getElementById('comment'+post_id);
			  		var node = document.createElement("a");
			  		node.className = 'btn btn-outline-secondary btn-sm';
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
	}else{
		document.getElementById('comment'+post_id).innerHTML = '';	//second click will clear comment div
	}
}

function leaveComment(post_id) {
	console.log(post_id)
	var comment = document.getElementById('comment_content'+post_id).value;
	console.log(comment)
	if (comment) {
		var xmlhttp = new XMLHttpRequest();
	    var data = "mode=leaveMessage&post_id=" + post_id + "&comment=" + comment;
	    xmlhttp.onreadystatechange = function() {
	        if (this.readyState == 4 && this.status == 200) {
	        	document.getElementById('comment'+post_id).innerHTML = '';	// clear comment div
	 			var returnData = JSON.parse(this.responseText);
	        	returnData.forEach(function(element) {
				  	
			  		//console.log(element);
			  		var pobj = document.getElementById('comment'+post_id);
			  		var node = document.createElement("a");
			  		node.className = 'btn btn-outline-secondary btn-sm';
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
		    		document.getElementById('comment_content'+post_id).value = '';	// clear comment input
				});
	        }
	    };
	    xmlhttp.open("POST", "controller/commentController.php", true);
	    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");	//post must add this
	    xmlhttp.send(data);
	}
}
</script>