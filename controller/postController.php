<?php session_start();
require "../connecter.php";
$mode = $_REQUEST['mode'];

$title = isset($_POST['title']) ? addslashes($_POST['title']) : "";
$body = isset($_POST['body']) ? addslashes($_POST['body']) : "";
if ($mode == 'new'){
	$sql = "INSERT INTO posts (user_id, title, body, created_at, updated_at) VALUES ('".$_SESSION['user_id']."', '".$title."', '".$body."', CURRENT_TIME(), CURRENT_TIME())";

	if ($conn->query($sql) === TRUE) {
	    $conn->close();
	    header("Location: ../posts.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
} else if ($mode == 'save') {
	$id = $_POST['id'];
	$sql = "UPDATE posts
			SET title = '".$title."', body = '".$body."', updated_at = CURRENT_TIME()
			WHERE id = ".$id;
	if ($conn->query($sql) === TRUE) {
	    $conn->close();
	    header("Location: ../posts.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
} else if ($mode == 'delete') {
	$id = $_REQUEST['id'];
	$sql = "DELETE FROM posts
			WHERE id = $id";
	if ($conn->query($sql) === TRUE) {
	    $conn->close();
	    header("Location: ../posts.php");
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
$conn->close();