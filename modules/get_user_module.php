<?php

$DB = require_once('../includes/config.php');
$mysqli = new mysqli($DB['HOST'], $DB['USER'], $DB['PASS'], $DB['NAME']);

$user_id = $_GET['id'];
$user = $mysqli->query("SELECT * FROM user WHERE id=$user_id;")->fetch_assoc();

$mysqli->close();

?>