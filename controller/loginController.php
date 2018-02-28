<?php session_start();
require "../connecter.php";

$sql = "SELECT id, name, password FROM users WHERE ";
$email_sql = "email = '".addslashes($_POST['email'])."'";
$password_sql = "password = '".addslashes($_POST['password'])."'";
$user_sql = $sql.$email_sql;
$result = $conn->query($user_sql);
if ($row = $result->fetch_row()){
	if (password_verify(addslashes($_POST['password']), $row[2])) {
		$_SESSION['user_name'] = $row[1];
		$_SESSION['user_id'] = $row[0];
		if (isset($_POST['remember'])){
			setcookie('email', $_POST['email'], time()+3600);
			setcookie('password', $_POST['password'], time()+3600);
			var_dump($_COOKIE);
		} else{
			//cookie 刪不掉
			unset($_COOKIE['email']);
			unset($_COOKIE['password']);
			setcookie('email', '', time() - 3600, '/'); // empty value and old timestamp
			setcookie('password', '', time() - 3600, '/'); // empty value and old timestamp
		}
		$result->close();
		header("Location: ../index.php");
	} else {
		$_SESSION['error'] = '密碼錯誤';
		$result->close();
		header("Location: ../login.php");
	}
} else {
	$_SESSION['error'] = '查無此email';
	$result->close();
	header("Location: ../login.php");
}
