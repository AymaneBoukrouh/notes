<?php

session_start();

$DB = require_once('../includes/config.php');
$mysqli = new mysqli($DB['HOST'], $DB['USER'], $DB['PASS'], $DB['NAME']);

$user_id = $_SESSION['user_id'];
$notes = $mysqli->query("SELECT * FROM note WHERE user_id=$user_id AND deleted=FALSE;");

$NOTES = 0;
foreach ($notes as $note) $NOTES++;

$mysqli->close();

?>