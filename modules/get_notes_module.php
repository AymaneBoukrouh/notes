<?php

$config = require_once('../includes/config.php');
$HOST = $config['HOST'];
$USERNAME = $config['USERNAME'];
$PASSWORD = $config['PASSWORD'];
$DB_NAME = $config['DB_NAME'];

$mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DB_NAME);

$notes = $mysqli->query('SELECT * FROM note WHERE deleted = FALSE;');

$NOTES = 0;
foreach ($notes as $note) $NOTES++;

$mysqli->close();

?>