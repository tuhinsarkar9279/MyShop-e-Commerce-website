<?php

session_start();

/* Remove All Session Variables */

session_unset();

/* Destroy Session */

session_destroy();

/* Redirect To Admin Login */

header("Location: admin-login.php");

exit();

?>