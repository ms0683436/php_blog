<?php 
require "connecter.php";
$title = addslashes($_POST['title']);
$body = addslashes($_POST['body']);

$sql = "INSERT INTO post (title, body, created_at, updated_at) VALUES ('".$title."', '".$body."', CURRENT_TIME(), CURRENT_TIME())";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();