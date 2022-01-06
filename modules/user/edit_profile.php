<?php

session_start();

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$username = $_POST['username'];
$email = $_POST['email'];

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