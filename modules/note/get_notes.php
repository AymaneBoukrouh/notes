<?php

session_start();

$user_id = $_SESSION['user_id'];
$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$notes = $query("SELECT * FROM note WHERE user_id=$user_id AND deleted=FALSE;");

$NOTES = 0;
foreach ($notes as $note) $NOTES++;

?>