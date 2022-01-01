<?php

$username = $_POST['username'];

$DB = require_once('../includes/config.php');
$mysqli = new mysqli($DB['HOST'], $DB['USER'], $DB['PASS'], $DB['NAME']);
$username = $mysqli->query("SELECT username FROM user WHERE username='$username';")->fetch_assoc();


header('Content-type: application/json');
if (!$username) echo json_encode(true);
else echo json_encode(false);

?>