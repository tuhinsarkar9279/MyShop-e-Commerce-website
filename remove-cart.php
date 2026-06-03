<?php

session_start();

include 'connect.php';

if(!isset($_SESSION['user_id'])){

    header("Location: user-login.php");
    exit();

}

$user_id = $_SESSION['user_id'];

$cart_id = $_GET['id'];

mysqli_query(

    $conn,

    "DELETE FROM cart

    WHERE id='$cart_id'

    AND user_id='$user_id'"

);

header("Location: cart.php");

exit();

?>