<?php
require "../connecter.php";

$mode = $_REQUEST['mode'];
$post_id = $_REQUEST['post_id'];
if ($mode == "showAllComment") {
	$sql = "SELECT users.id, users.name, comment.comment, comment.update_at FROM users JOIN comment ON users.id = comment.user_id WHERE comment.post_id = ".$post_id;
	if($result = $conn->query($sql)){
		echo json_encode($result->fetch_all());
	}
}