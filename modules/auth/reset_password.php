<?php

session_start();

$email = $_GET['email'];
$token = $_GET['token'];

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$user = $query("
    SELECT id, reset_password_time_generated
    FROM user
    WHERE email = '$email'
      AND reset_password_token = '$token';
")->fetch_assoc();

if (!$user) {
    $_SESSION['flash_message'] = Array(
		'message' => 'Invalid Reset Password Token.',
		'status' => 'danger'
	);

	exit(header('Location: /templates/auth/login.php'));
} else {
    $reset_password_time_generated = DateTime::createFromFormat('Y-m-d H:i:s', $user['reset_password_time_generated']);
    $current_date = DateTime::createFromFormat('Y-m-d H:i:s', date('Y-m-d H:i:s'));
    $date_diff = date_diff($current_date, $reset_password_time_generated);

    $years = $date_diff->format('y');
    $months = $date_diff->format('m');
    $days = $date_diff->format('d');

    if ($years || $months || $days) {
        $_SESSION['flash_message'] = Array(
            'message' => 'Reset Password Token Expired.',
            'status' => 'danger'
        );

        exit(header('Location: /templates/auth/login.php'));
    }
}

if (isset($_POST['submit'])) {
    $new_password = $_POST['new-password'];
    $confirm_password = $_POST['confirm-password'];

    $re_length_8_64 = '/^.{8,64}$/';

    if (!(
        ($new_password === $confirm_password) &&
        preg_match($re_length_8_64, $new_password)
    )) {
        $_SESSION['flash_message'] = Array(
            'message' => 'An error occured, your password has not been updated.',
            'status' => 'danger'
        );
    
        exit(header('Location: /templates/auth/login.php'));
    }

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $user_id = $user['id'];
    $query("
        UPDATE user
        SET
            password = '$hashed_password',
            reset_password_token = NULL,
            reset_password_time_generated = NULL
        WHERE id = $user_id;
    ");


    $_SESSION['flash_message'] = Array(
        'message' => 'Your password has been successfully updated.',
        'status' => 'success'
    );

    exit(header('Location: /templates/auth/login.php'));
}

?>