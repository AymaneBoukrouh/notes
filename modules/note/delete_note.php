<?php

$note_id = $_GET['id'];

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$query("
	UPDATE note
	SET deleted = 1
	WHERE id = $note_id;"
);

header('Location: /templates/notes.php');

?>