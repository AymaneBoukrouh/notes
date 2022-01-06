<?php

$note_id = $_GET['id'];

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
return $query("SELECT * FROM note WHERE id=$note_id;")->fetch_assoc();

?>