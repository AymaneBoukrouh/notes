<?php

session_start();

$user = Array(
	'first_name' => $_SESSION['first_name'],
	'last_name' => $_SESSION['last_name'],
	'username' => $_SESSION['username'],
	'email' => $_SESSION['email']
);

header('Content-type: application/json');
echo json_encode($user);

?>