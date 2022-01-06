<?php

session_start();

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$username = $_POST['username'];
$email = $_POST['email'];


$re_name = '/^[a-zA-Z ]+$/';
$re_username = '/^[a-zA-Z0-9_]+$/';
$re_email = '/^[a-zA-Z0-9_\-\.]+@([a-zA-Z0-9_\-]+\.)+[a-zA-Z0-9_\-]{2,4}$/';
$re_length_2_32 = '/^.{2,32}$/';
$re_length_2_16 = '/^.{2,16}$/';

if (!(
	preg_match($re_name, $first_name) &&
	preg_match($re_length_2_32, $first_name) &&
	preg_match($re_name, $last_name) &&
	preg_match($re_length_2_32, $last_name) &&
	preg_match($re_username, $username) &&
	preg_match($re_length_2_16, $username) &&
	preg_match($re_email, $email)
)) {
	$_SESSION['flash_message'] = Array(
		'message' => 'An error occured, your profile has not been updated.',
		'status' => 'danger'
	);

	exit(header('Location: /templates/profile.php'));
}


$user_id = $_SESSION['user_id'];

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$query("
	UPDATE user
	SET
		first_name = '$first_name',
		last_name = '$last_name',
		username = '$username',
		email = '$email'

	WHERE id = $user_id;
");


$_SESSION['flash_message'] = Array(
	'message' => 'Your profile has been successfully updated!',
	'status' => 'success'
);

header('Location: /templates/profile.php');

?>