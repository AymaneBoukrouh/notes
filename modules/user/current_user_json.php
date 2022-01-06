<?php

header('Content-type: application/json');

$current_user = require($_SERVER['DOCUMENT_ROOT'].'/modules/user/current_user.php');
echo json_encode($current_user);

?>