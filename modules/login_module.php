<?php

session_start();

$username_or_email = $_POST['username-or-email'];
$password = $_POST['password'];


$DB = require_once('../includes/config.php');
$mysqli = new mysqli($DB['HOST'], $DB['USER'], $DB['PASS'], $DB['NAME']);

$query = "
	SELECT *
	FROM user
	WHERE username='$username_or_email' OR email='$username_or_email'; 
";

$user = $mysqli->query($query)->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
	$_SESSION['user_id'] = $user['id'];
	$_SESSION['first_name'] = $user['first_name'];
	$_SESSION['last_name'] = $user['last_name'];
	$_SESSION['username'] = $user['username'];
	$_SESSION['email'] = $user['email'];
	exit(header('Location: /templates/notes.php'));
}


$_SESSION['flash_message'] = Array(
	'message' => 'Invalid username or password.',
	'status' => 'danger'
);

header('Location: /templates/login.php');

// flash invalid

?>