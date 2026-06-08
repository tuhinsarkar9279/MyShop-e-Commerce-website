<?php

session_start();

include 'connect.php';

if(!isset($_SESSION['user_id'])){

    header("Location: user-login.php");

    exit();

}

$user_id = $_SESSION['user_id'];

$product_id = $_GET['id'];

/* Check Product Already Exists */

$check = mysqli_query(

    $conn,

    "SELECT *

    FROM cart

    WHERE user_id='$user_id'

    AND product_id='$product_id'"

);

if(mysqli_num_rows($check) > 0){

    mysqli_query(

        $conn,

        "UPDATE cart

        SET quantity = quantity + 1

        WHERE user_id='$user_id'

        AND product_id='$product_id'"

    );

}else{

    mysqli_query(

        $conn,

        "INSERT INTO cart(

        user_id,
        product_id,
        quantity

        )

        VALUES(

        '$user_id',
        '$product_id',
        '1'

        )"

    );

}

/* Go Back */
$cart_query = mysqli_query(

    $conn,

    "SELECT COALESCE(SUM(quantity),0) AS total

    FROM cart

    WHERE user_id='$user_id'"

);

$cart_data = mysqli_fetch_assoc($cart_query);

echo $cart_data['total'];


exit();
?>