<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('phpmailer/src/PHPMailer.php');
require('phpmailer/src/SMTP.php');
require('phpmailer/src/Exception.php');

$mail = new PHPMailer(true);


try {
	$mail->Host = 'localhost';
	$mail->SMTPAuth = true;
	$mail->Username = 'noreply';
	$mail->Password = 'noreply@pass1234';
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
	$mail->Port = 25;

	$mail->setFrom('noreply@notes.aymaneboukrouh.com', 'noreply');
	$mail->addAddress('boukrouhaymane@gmail.com');

	$mail->Subject = 'Without vendor or language';
	$mail->Body = 'Sent using PHPMailer.';

	$mail->send();
	echo 'Message sent.';
} catch (Exception $e) {
	echo $mail->ErrorInfo;
}

?>