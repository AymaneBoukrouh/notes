<?php

session_start();

if (!isset($_GET['id'])) $user_id = $_SESSION['user_id'];
else $user_id = $_GET['id'];
$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$user = $query("SELECT * FROM user WHERE id=$user_id;")->fetch_assoc();

?>