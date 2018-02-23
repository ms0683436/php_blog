<?php session_start();
function countLike($post_id, $conn){
	$sql = "SELECT COUNT(user_id) FROM likelist WHERE post_id = $post_id";
	if ($result = $conn->query($sql)) {
		return $result->fetch_row()[0];
	}
}

require "../connecter.php";

$mode = $_REQUEST['mode'];
$post_id = $_REQUEST['post_id'];

if ($mode == "like") {
	$sql = "INSERT INTO likelist(user_id, post_id) VALUES ('".$_SESSION['user_id']."', '$post_id')";

	if ($conn->query($sql) === TRUE) {
	    //$conn->close();
	    echo countLike($post_id, $conn);
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
if ($mode == "unlike") {
	$sql = "DELETE FROM likelist WHERE post_id = $post_id AND user_id = ".$_SESSION['user_id'];

	if ($conn->query($sql) === TRUE) {
	    //$conn->close();
	    echo countLike($post_id, $conn);
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}