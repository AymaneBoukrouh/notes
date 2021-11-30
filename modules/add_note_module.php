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
$creation_datetime = "$year-$month-$day $hours:$minutes:$seconds";


$config = require_once('../includes/config.php');
$HOST = $config['HOST'];
$USERNAME = $config['USERNAME'];
$PASSWORD = $config['PASSWORD'];
$DB_NAME = $config['DB_NAME'];

$mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DB_NAME);

$query = "
	INSERT INTO note (title, content, creation_datetime)
	VALUES ('$title', '$content', '$creation_datetime');
";

$mysqli->query($query);

$mysqli->commit();
$mysqli->close();


header('Location: /templates/notes.php');

?>