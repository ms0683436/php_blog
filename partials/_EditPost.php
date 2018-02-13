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
		  modal.find('.input').val(id)
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
      	  <input class="input" type="text" name="id" hidden>
      	  <input type="text" name="current_user_page_id" value="<?php echo isset($_GET['current_user_page_id']) ? $_GET['current_user_page_id'] : "index"?>" hidden>
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