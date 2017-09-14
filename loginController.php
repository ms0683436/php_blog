<?php session_start([
    'cookie_lifetime' => 30,
]);
require "connecter.php";

$sql = "SELECT name FROM user WHERE ";
$email_sql = "email = '".addslashes($_POST['email'])."'";
$password_sql = "password = '".addslashes($_POST['password'])."'";
$user_sql = $sql.$email_sql." and ".$password_sql;
$result = $conn->query($user_sql);
if ($row = $result->fetch_row()){
	$_SESSION['user'] = $row[0];
	if (isset($_POST['remember'])){
		setcookie('email', $_POST['email']);
		setcookie('password', $_POST['password']);
	} else{
		//cookie 刪不掉
		unset($_COOKIE['email']);
		unset($_COOKIE['password']);
		setcookie('email', '', time() - 3600, '/'); // empty value and old timestamp
		setcookie('password', '', time() - 3600, '/'); // empty value and old timestamp
	}
	$result->close();
	header("Location: index.php");
	//header("Location: index.php");
} else {
	$_SESSION['error'] = '帳密錯誤';
	$result->close();
	header("Location: login.php");
}
