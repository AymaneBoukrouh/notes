<?php

$mysqli = new mysqli('localhost', 'aymane', 'pass1234', 'php_notes');

$query = "
	UPDATE note
	SET deleted = 1
	WHERE id = ".$_GET['id'].";";

$mysqli->query($query);

$mysqli->commit();
$mysqli->close();


header('Location: /templates/notes.php');

?>