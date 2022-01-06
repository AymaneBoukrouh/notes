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


$verification_token = bin2hex(random_bytes(64));
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$query("
	INSERT INTO user (first_name, last_name, username, email, password, verification_token)
	VALUES ('$first_name', '$last_name', '$username', '$email', '$hashed_password', '$verification_token');
");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require($_SERVER['DOCUMENT_ROOT'].'/modules/phpmailer/src/PHPMailer.php');
require($_SERVER['DOCUMENT_ROOT'].'/modules/phpmailer/src/SMTP.php');
require($_SERVER['DOCUMENT_ROOT'].'/modules/phpmailer/src/Exception.php');

$mail = new PHPMailer(true);
$auth = require($_SERVER['DOCUMENT_ROOT'].'/modules/phpmailer/auth.php');

try {
	$mail->Host = $auth['HOST'];
	$mail->SMTPAuth = true;
	$mail->Username = $auth['USER'];
	$mail->Password = $auth['PASS'];
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
	$mail->Port = $auth['PORT'];

	$mail->setFrom($auth['FROM'], 'PHP Notes');
	$mail->addAddress($email);

	$mail->Subject = 'Account Verification';
	$mail->Body = 'Welcome to PHP-Notes! Go to the link below to verify your account.\n\nhttps://notes.aymaneboukrouh.com/modules/auth/verify_account.php?token='.$verification_token;

	$mail->send();

	$_SESSION['flash_message'] = Array(
		'message' => 'Your account has been successfully created! A verification email has been sent to '.$email,
		'status' => 'success'
	);
} catch (Exception $e) {
	$_SESSION['flash_message'] = Array(
		'message' => 'An error occured, your account has not been created.',
		'status' => 'danger'
	);
}

exit(header('Location: /templates/auth/login.php'));

?>