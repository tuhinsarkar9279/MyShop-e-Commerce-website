<?php

session_start();

unset($_SESSION['delivery_id']);
unset($_SESSION['delivery_name']);
unset($_SESSION['delivery_email']);
unset($_SESSION['delivery_image']);

header("Location: delivery-login.php");

exit();

?>