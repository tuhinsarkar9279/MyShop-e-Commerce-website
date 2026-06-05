<?php

session_start();

/* Remove All Seller Session Variables */

session_unset();

/* Destroy Session */

session_destroy();

/* Redirect To Seller Login */

header("Location: seller-login.php");

exit();

?>