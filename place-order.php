<?php

session_start();

include 'connect.php';

if(!isset($_SESSION['user_id'])){

    header("Location:user-login.php");
    exit();

}

$user_id = $_SESSION['user_id'];

/* Get Address */

$address_query = mysqli_query(

    $conn,

    "SELECT *

    FROM user_address

    WHERE user_id='$user_id'

    LIMIT 1"

);

$address = mysqli_fetch_assoc($address_query);

if(!$address){

    die("Please save delivery address first.");

}

/* Get Checkout Products */

$order_query = mysqli_query(

    $conn,

    "SELECT *

    FROM order_summary

    WHERE user_id='$user_id'"

);

while($row = mysqli_fetch_assoc($order_query)){

    mysqli_query(

        $conn,

        "INSERT INTO orders(

        user_id,
        product_id,
        quantity,

        full_name,
        phone,
        address,
        city,
        state,
        pincode,

        order_status

        )

        VALUES(

        '$user_id',
        '".$row['product_id']."',
        '".$row['quantity']."',

        '".$address['full_name']."',
        '".$address['phone']."',
        '".$address['address']."',
        '".$address['city']."',
        '".$address['state']."',
        '".$address['pincode']."',

        'Pending'

        )"

    );

}

/* Clear Checkout Items */

mysqli_query(

    $conn,

    "DELETE FROM order_summary

    WHERE user_id='$user_id'"

);

header("Location:order-success.php");

exit();

?>