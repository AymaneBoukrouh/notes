<?php

$config = require_once('../includes/config.php');
$HOST = $config['HOST'];
$USERNAME = $config['USERNAME'];
$PASSWORD = $config['PASSWORD'];
$DB_NAME = $config['DB_NAME'];

$mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DB_NAME);

$note_id = $_GET['id'];
$note = $mysqli->query("SELECT * FROM note WHERE id=$note_id;")->fetch_assoc();

$mysqli->close();

?>