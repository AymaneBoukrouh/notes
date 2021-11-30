<?php

$config = require_once('../includes/config.php');
$HOST = $config['HOST'];
$USERNAME = $config['USERNAME'];
$PASSWORD = $config['PASSWORD'];
$DB_NAME = $config['DB_NAME'];

$mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DB_NAME);

$query = "
	UPDATE note
	SET deleted = 1
	WHERE id = ".$_GET['id'].";";

$mysqli->query($query);

$mysqli->commit();
$mysqli->close();


header('Location: /templates/notes.php');

?>