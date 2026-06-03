<?php

session_start();

include 'connect.php';

$user_id = $_SESSION['user_id'];

/* Get Cart Items */

$query = mysqli_query(

    $conn,

    "SELECT * FROM cart

    WHERE user_id='$user_id'"

);

while($row = mysqli_fetch_assoc($query)){

    mysqli_query(

        $conn,

        "INSERT INTO order_summary(

        user_id,
        product_id,
        quantity

        )

        VALUES(

        '$user_id',
        '".$row['product_id']."',
        '".$row['quantity']."'

        )"

    );

}

/* Remove Cart Items */

mysqli_query(

    $conn,

    "DELETE FROM cart

    WHERE user_id='$user_id'"

);

header("Location: osummary.php");

exit();

?>