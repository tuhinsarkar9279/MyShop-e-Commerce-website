<?php

if(session_status() == PHP_SESSION_NONE){

    session_start();

}

if(!isset($_SESSION['admin_id'])){

    header("Location: admin-login.php");

    exit();

}

$admin_id = $_SESSION['admin_id'];

$admin_name = $_SESSION['admin_name'] ?? '';

$admin_email = $_SESSION['admin_email'] ?? '';

$admin_image = $_SESSION['admin_image'] ?? '';

?>