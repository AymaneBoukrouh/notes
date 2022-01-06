<?php

$current_date = getdate();
$year = strval($current_date['year']);
$month = str_pad(strval($current_date['mon']), 2, '0', STR_PAD_LEFT);
$day = str_pad(strval($current_date['mday']), 2, '0', STR_PAD_LEFT);
$hours = str_pad(strval($current_date['hours']), 2, '0', STR_PAD_LEFT);
$minutes = str_pad(strval($current_date['minutes']), 2, '0', STR_PAD_LEFT);
$seconds = str_pad(strval($current_date['seconds']), 2, '0', STR_PAD_LEFT);

$title = $_POST['note-title'];
$content = $_POST['note-content'];
$last_edit_datetime = "$year-$month-$day $hours:$minutes:$seconds";

$note_id = $_GET['id'];

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$query("
	UPDATE note
	SET
		title = '$title',
		content = '$content',
		last_edit_datetime = '$last_edit_datetime'

	WHERE id = $note_id;"
);

header('Location: /templates/note.php?id='.$_GET['id']);

?>