<?php

$DB = require_once('../includes/config.php');
$mysqli = new mysqli($DB['HOST'], $DB['USER'], $DB['PASS'], $DB['NAME']);

$note_id = $_GET['id'];
$note = $mysqli->query("SELECT * FROM note WHERE id=$note_id;")->fetch_assoc();

$mysqli->close();

?>