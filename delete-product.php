<?php

session_start();

include 'connect.php';

if(!isset($_SESSION['seller_id'])){

    header("Location: seller-login.php");
    exit();

}

$seller_id = $_SESSION['seller_id'];

if(isset($_GET['id'])){

    $id = $_GET['id'];

    /* Check Product Belongs To Seller */

    $fetch = mysqli_query(

        $conn,

        "SELECT * FROM products

        WHERE id='$id'

        AND seller_id='$seller_id'"

    );

    if(mysqli_num_rows($fetch) > 0){

        $data = mysqli_fetch_assoc($fetch);

        /* Delete Image */

        if(
            !empty($data['product_image'])
            &&
            file_exists(
                "uploads/".$data['product_image']
            )
        ){

            unlink(
                "uploads/".$data['product_image']
            );

        }

        /* Delete Product */

        mysqli_query(

            $conn,

            "DELETE FROM products

            WHERE id='$id'

            AND seller_id='$seller_id'"

        );

    }

}

header("Location: add-products.php");
exit();

?>