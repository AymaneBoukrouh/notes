<?php

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$query("
	UPDATE note
	SET deleted = 1
	WHERE id = ".$_GET['id'].";"
);

header('Location: /templates/notes.php');

?>