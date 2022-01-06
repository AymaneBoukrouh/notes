<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/modules/auth/login_required.php');

header('Content-type: application/json');

$current_user = require($_SERVER['DOCUMENT_ROOT'].'/modules/user/current_user.php');
echo json_encode($current_user);

?>