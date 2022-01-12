<?php

session_start();

$username_or_email = $_POST['username-or-email'];

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$user = $query("
	SELECT email
	FROM user
	WHERE username = '$username_or_email'
	   OR email = '$username_or_email';
")->fetch_assoc();

if (!$user) {
	$_SESSION['flash_message'] = Array(
		'message' => 'Account does not exist.',
		'status' => 'danger'
	);

	exit(header('Location: /templates/auth/reset_password_request.php'));
}

$email = $user['email'];
$reset_password_token = bin2hex(random_bytes(64));
$reset_password_time_generated = date('Y-m-d H:i:s');

$query("
	UPDATE user
	SET
		reset_password_token = '$reset_password_token',
		reset_password_time_generated = '$reset_password_time_generated'
	WHERE email = '$email';
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

	$mail->setFrom($auth['FROM'], 'Notes');
	$mail->addAddress($email);

	$mail->Subject = 'Reset Password';
	$mail->Body = "Hello! Click on the below link to reset your password (valid for 24 hours)\n\nhttps://notes.aymaneboukrouh.com/templates/auth/reset_password.php?email=$email&token=$reset_password_token";

	$mail->send();

	$_SESSION['flash_message'] = Array(
		'message' => 'A link to reset your password has been sent to your email.',
		'status' => 'success'
	);
} catch (Exception $e) {
	$_SESSION['flash_message'] = Array(
		'message' => 'An error occured, could not send password reset email.',
		'status' => 'danger'
	);
}

exit(header('Location: /templates/auth/login.php'))

?>