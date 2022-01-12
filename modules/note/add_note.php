<?php

$current_date = getdate();
$year = strval($current_date['year']);
$month = str_pad(strval($current_date['mon']), 2, '0', STR_PAD_LEFT);
$day = str_pad(strval($current_date['mday']), 2, '0', STR_PAD_LEFT);
$hours = str_pad(strval($current_date['hours']), 2, '0', STR_PAD_LEFT);
$minutes = str_pad(strval($current_date['minutes']), 2, '0', STR_PAD_LEFT);
$seconds = str_pad(strval($current_date['seconds']), 2, '0', STR_PAD_LEFT);

$title = htmlentities($_POST['note-title']);
$content = htmlentities($_POST['note-content']);
$creation_datetime = "$year-$month-$day $hours:$minutes:$seconds";

$current_user = require($_SERVER['DOCUMENT_ROOT'].'/modules/user/current_user.php');
$user_id = $current_user['id'];

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$query("
	INSERT INTO note (user_id, title, content, creation_datetime)
	VALUES ($user_id, '$title', '$content', '$creation_datetime');
");

header('Location: /templates/notes.php');

?>