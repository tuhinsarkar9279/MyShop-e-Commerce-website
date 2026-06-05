<?php

session_start();

/* Destroy All Sessions */

session_unset();

session_destroy();

/* Redirect To Login */

header("Location: user-login.php");

exit();

?>