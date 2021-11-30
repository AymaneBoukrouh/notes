<?php

$mysqli = new mysqli('localhost', 'aymane', 'pass1234', 'php_notes');

$note_id = $_GET['id'];
$note = $mysqli->query("SELECT * FROM note WHERE id=$note_id;")->fetch_assoc();

$mysqli->close();

?>