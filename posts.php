<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>All Posts</title>
	<?php require "partials/_header.php" ?>
</head>
<body>
	<?php require "partials/_navbar.php" ?>
	<div class="container">
		<div class="row">
			<h1 class="display-3 col-sm-11">All Posts</h1>
			<div>
				<a href='create_post.php' class='btn btn-success'>New Post</a>
			</div>
		</div>
		<div class="row">
			<?php 
				require "connecter.php";

				$sql = "SELECT * FROM posts ORDER BY id DESC";
				if($result = $conn->query($sql)){
					while($row = $result->fetch_row()){
						//var_dump($row);
						echo "<div class='col-sm-4'>
							    <div class='card'>
							      <div class='card-body'>
							        <h4 class='card-title'>$row[2]</h4>
							        <p class='card-text'>$row[3]</p>
							        <p class='card-text'><small class='text-muted'>Last updated $row[5]</small></p>
							        ";
						echo isset($_SESSION['user_id']) ? 
									"<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' data-id='$row[0]' data-title='$row[2]' data-body='$row[3]'>Edit</button>
							        <a href='controller/postController.php?mode=delete&id=$row[0]' class='btn btn-danger'>Delete</a>" : ""."
							      </div>
							    </div>
							  </div>";	//CSRF problem
					}
				}
			  
			?>
		</div>
		<script type="text/javascript">
			
			$(document).ready(function(){

				$('#exampleModal').on('show.bs.modal', function (event) {
				  var button = $(event.relatedTarget) // Button that triggered the modal
				  var id = button.data('id')
				  var title = button.data('title') // Extract info from data-* attributes
				  var body = button.data('body')
				  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				  var modal = $(this)
				  modal.find('input').val(id)
				  modal.find('.modal-body input').val(title)
				  modal.find('.modal-body textarea').val(body)
				});
			});
		</script>

		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit post</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <form action="controller/postController.php" method="POST">
		      	  <input type="text" name="id" hidden>
			      <div class="modal-body">
			          <div class="form-group">
			            <label for="recipient-name" class="form-control-label">Title:</label>
			            <input type="text" class="form-control" id="recipient-name" name="title">
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="form-control-label">Body:</label>
			            <textarea class="form-control" id="message-text" name="body"></textarea>
			          </div>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" name="mode" value="save">Save</button>
			      </div>
		      </form>
		    </div>
		  </div>
		</div>
	</div>
</body>
</html>