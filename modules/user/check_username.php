<?php

$username = $_POST['username'];

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$username = $query("SELECT username FROM user WHERE username='$username';")->fetch_assoc();


header('Content-type: application/json');
if (!$username) echo json_encode(true);
else echo json_encode(false);

?>