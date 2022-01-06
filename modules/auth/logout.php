<?php

session_start();
session_unset();
session_destroy();

exit(header('Location: /templates/auth/login.php'));

?>