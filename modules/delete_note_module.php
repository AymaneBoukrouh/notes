<?php

$DB = require_once('../includes/config.php');
$mysqli = new mysqli($DB['HOST'], $DB['USER'], $DB['PASS'], $DB['NAME']);

$query = "
	UPDATE note
	SET deleted = 1
	WHERE id = ".$_GET['id'].";";

$mysqli->query($query);

$mysqli->commit();
$mysqli->close();


header('Location: /templates/notes.php');

?>