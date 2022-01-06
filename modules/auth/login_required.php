<?php

$current_user = require($_SERVER['DOCUMENT_ROOT'].'/modules/user/current_user.php');
if (!$current_user) {
	$_SESSION['flash_message'] = Array(
		'message' => 'Please log in to access this page.',
		'status' => 'danger'
	);

	exit(header('Location: /templates/auth/login.php'));
}

?>