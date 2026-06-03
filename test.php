<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "myshop"
);

if($conn){

    echo "Database Connected Successfully";

}else{

    echo mysqli_connect_error();

}

?>