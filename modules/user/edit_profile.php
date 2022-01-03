<?php

session_start();

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$username = $_POST['username'];
$email = $_POST['email'];


$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$query("
	UPDATE user
	SET
		first_name = '$first_name',
		last_name = '$last_name',
		username = '$username',
		email = '$email'

	WHERE id=".$_SESSION['user_id'].";
");


$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;

header('Location: /templates/profile.php?id='.$_SESSION['user_id']);

?>