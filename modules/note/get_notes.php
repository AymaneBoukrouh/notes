<?php

$current_user = require($_SERVER['DOCUMENT_ROOT'].'/modules/user/current_user.php');
$user_id = $current_user['id'];
$query = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/query.php');
return $query("SELECT * FROM note WHERE user_id=$user_id AND deleted=FALSE;");

?>