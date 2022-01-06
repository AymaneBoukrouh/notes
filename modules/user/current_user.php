<?php

session_start();

if (isset($_SESSION['user_id'])) $current_user_id = $_SESSION['user_id'];
else return false;

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$current_user = $query("
	SELECT id, first_name, last_name, username, email
	FROM user
	WHERE id=$current_user_id;
")->fetch_assoc();

return Array(
	'id' => $current_user['id'],
	'first_name' => $current_user['first_name'],
	'last_name' => $current_user['last_name'],
	'username' => $current_user['username'],
	'email' => $current_user['email']
);

?>