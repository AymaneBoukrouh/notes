<?php

return function ($query) {
	$auth = require($_SERVER['DOCUMENT_ROOT'].'/modules/db/auth.php');
	$mysqli = new mysqli(
		$auth['HOST'],
		$auth['USER'],
		$auth['PASS'],
		$auth['NAME']
	);

	$result = $mysqli->query($query);
	$mysqli->commit();
	$mysqli->close();

	return $result;
};

?>