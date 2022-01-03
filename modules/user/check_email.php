<?php

$email = $_POST['email'];

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$email = $query("SELECT email FROM user WHERE email='$email';")->fetch_assoc();


header('Content-type: application/json');
if (!$email) echo json_encode(true);
else echo json_encode(false);

?>