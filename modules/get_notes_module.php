<?php

$mysqli = new mysqli('localhost', 'aymane', 'pass1234', 'php_notes');
$notes = $mysqli->query('SELECT * FROM note WHERE deleted = FALSE;');

$NOTES = 0;
foreach ($notes as $note) $NOTES++;

$mysqli->close();

?>