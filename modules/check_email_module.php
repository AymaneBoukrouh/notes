<?php

$email = $_POST['email'];

$DB = require_once('../includes/config.php');
$mysqli = new mysqli($DB['HOST'], $DB['USER'], $DB['PASS'], $DB['NAME']);
$email = $mysqli->query("SELECT email FROM user WHERE email='$email';")->fetch_assoc();


header('Content-type: application/json');
if (!$email) echo json_encode(true);
else echo json_encode(false);

?>