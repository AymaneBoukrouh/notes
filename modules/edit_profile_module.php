<?php

session_start();

$first_name = $_POST['first-name'];
$last_name = $_POST['last-name'];
$username = $_POST['username'];
$email = $_POST['email'];


$DB = require_once('../includes/config.php');
$mysqli = new mysqli($DB['HOST'], $DB['USER'], $DB['PASS'], $DB['NAME']);

$query = "
	UPDATE user
	SET
		first_name = '$first_name',
		last_name = '$last_name',
		username = '$username',
		email = '$email'

	WHERE id=".$_SESSION['user_id'].";
";

$mysqli->multi_query($query);

$mysqli->commit();
$mysqli->close();


$_SESSION['first_name'] = $first_name;
$_SESSION['last_name'] = $last_name;
$_SESSION['username'] = $username;
$_SESSION['email'] = $email;
header('Location: /templates/profile.php?id='.$_SESSION['user_id']);

?>