<?php
$servername = "localhost";
$dbname = "php_blog";
$username = "root";
$password = "12345678";

// Create connection
$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*
if ($result = $conn->query("SELECT * from user")) {
    $row = $result->fetch_row();
    var_dump($row);
    $result->close();
}
*/
//echo "Connected successfully<br>";
?>