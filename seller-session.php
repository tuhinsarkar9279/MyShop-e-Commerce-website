<?php

session_start();

if(!isset($_SESSION['seller_id'])){

    header("Location: seller-login.php");
    exit();

}

$seller_id = $_SESSION['seller_id'];

$seller_name = $_SESSION['seller_name'] ?? '';

$seller_email = $_SESSION['seller_email'] ?? '';

$seller_image = $_SESSION['seller_image'] ?? '';

?>