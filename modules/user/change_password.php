<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/modules/auth/login_required.php');

$user_id = $_SESSION['user_id'];

$current_password = $_POST['current-password'];
$new_password = $_POST['new-password'];
$confirm_password = $_POST['confirm-password'];


if (!(
    ($new_password === $confirm_password) &&
    preg_match('/^.{8,64}$/', $new_password)
)) {
    $_SESSION['flash_message'] = Array(
        'message' => 'An error occured, your password has not been updated..',
        'status' => 'danger'
    );

    exit(header('Location: /templates/profile.php'));
}


$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$hashed_password = $query("SELECT password FROM user WHERE id=$user_id;")->fetch_assoc()['password'];

if (!password_verify($current_password, $hashed_password)) {
    $_SESSION['flash_message'] = Array(
        'message' => 'You entered the wrong password. Please try again!',
        'status' => 'danger'
    );

    exit(header('Location: /templates/change_password.php'));
}


$hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
$query("UPDATE user SET password='$hashed_new_password' WHERE id=$user_id;");

$_SESSION['flash_message'] = Array(
	'message' => 'Your password has been successfully updated!',
	'status' => 'success'
);

exit(header('Location: /templates/profile.php'));

?>