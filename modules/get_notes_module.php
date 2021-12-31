<?php

$DB = require_once('../includes/config.php');
$mysqli = new mysqli($DB['HOST'], $DB['USER'], $DB['PASS'], $DB['NAME']);

$notes = $mysqli->query('SELECT * FROM note WHERE deleted = FALSE;');

$NOTES = 0;
foreach ($notes as $note) $NOTES++;

$mysqli->close();

?>