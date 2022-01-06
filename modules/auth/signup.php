<?php

session_start();

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];


$re_name = '/^[a-zA-Z ]+$/';
$re_username = '/^[a-zA-Z0-9_]+$/';
$re_email = '/^[a-zA-Z0-9_\-\.]+@([a-zA-Z0-9_\-]+\.)+[a-zA-Z0-9_\-]{2,4}$/';
$re_length_2_32 = '/^.{2,32}$/';
$re_length_2_16 = '/^.{2,16}$/';
$re_length_8_64 = '/^.{8,64}$/';

if (!(
	($password === $confirm_password) &&
	preg_match($re_name, $first_name) &&
	preg_match($re_length_2_32, $first_name) &&
	preg_match($re_name, $last_name) &&
	preg_match($re_length_2_32, $last_name) &&
	preg_match($re_username, $username) &&
	preg_match($re_length_2_16, $username) &&
	preg_match($re_email, $email) &&
	preg_match($re_length_8_64, $password)
)) {
	$_SESSION['flash_message'] = Array(
		'message' => 'An error occured, your account has not been created.',
		'status' => 'danger'
	);

	exit(header('Location: /templates/auth/login.php'));
}


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