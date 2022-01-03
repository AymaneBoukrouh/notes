<?php

$user_id = $_GET['id'];
$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$user = $query("SELECT * FROM user WHERE id=$user_id;")->fetch_assoc();

?>