<?php

header('Content-type: application/json');

$type = $_POST['type'];
$value = $_POST['value'];

$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
$taken = $query("SELECT $type FROM user WHERE $type='$value';")->fetch_assoc();

echo json_encode($taken);

?>