<?php

session_start();

/* Check Delivery Agent Login */

if(!isset($_SESSION['delivery_id'])){

    header("Location: delivery-login.php");

    exit();

}

/* Session Variables */

$delivery_id = $_SESSION['delivery_id'];

$delivery_name = $_SESSION['delivery_name'] ?? '';

$delivery_email = $_SESSION['delivery_email'] ?? '';

$delivery_image = $_SESSION['delivery_image'] ?? '';

?>