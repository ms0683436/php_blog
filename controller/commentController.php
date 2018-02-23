<?php session_start();
function AllComment($post_id, $conn){
	$sql = "SELECT users.id, users.name, comment.comment, comment.update_at FROM users JOIN comment ON users.id = comment.user_id WHERE comment.post_id = ".$post_id;
	if($result = $conn->query($sql)){
		echo json_encode($result->fetch_all());
	}
}

require "../connecter.php";
$mode = $_REQUEST['mode'];
$post_id = $_REQUEST['post_id'];
if ($mode == "showAllComment") {
	AllComment($post_id, $conn);
}

if ($mode == "leaveMessage") {
	$comment = addslashes($_REQUEST['comment']);
	$sql = "INSERT INTO comment (post_id, user_id, comment, update_at) VALUES ('$post_id', '".$_SESSION['user_id']."', '$comment', CURRENT_TIME())";

	if ($conn->query($sql) === TRUE) {
	    //$conn->close();
	    AllComment($post_id, $conn);
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}