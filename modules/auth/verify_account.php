<?php

session_start();

$email = $_GET['email'];
$verification_token = $_GET['token'];

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$user = $query("
	SELECT id
	FROM user
	WHERE email = '$email'
	  AND verification_token = '$verification_token'
")->fetch_assoc();

if ($user) {
	$user_id = $user['id'];
	$query("
		UPDATE user
		SET
			verified = TRUE,
			verification_token = NULL
		WHERE id = $user_id;
	");

	$_SESSION['user_id'] = $user['id'];
	$_SESSION['flash_message'] = Array(
		'message' => 'Your account has been verified!',
		'status' => 'success'
	);

	exit(header('Location: /templates/profile.php'));
}


$_SESSION['flash_message'] = Array(
	'message' => 'Invalid Verification Token!',
	'status' => 'danger'
);

exit(header('Location: /templates/profile.php'));

?>