<?php
require "../connecter.php";
$email = addslashes($_POST['email']);
$name = addslashes($_POST['name']);
$password = password_hash(addslashes($_POST['password']), PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password, updated_at) VALUES ('$name', '$email', '$password', CURRENT_TIME())";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location: ../login.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}