<?php

session_start();

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$query("
	INSERT INTO user (first_name, last_name, username, email, password)
	VALUES ('$first_name', '$last_name', '$username', '$email', '$hashed_password');
");


$_SESSION['flash_message'] = Array(
	'message' => 'Your account has been successfully created!',
	'status' => 'success'
);

header('Location: /templates/auth/login.php');

?>