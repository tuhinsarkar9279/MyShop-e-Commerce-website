<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "myshop";

$conn = @mysqli_connect(
    $servername,
    $username,
    $password,
    $database
);

if (!$conn) {
    die("MySQL Error: " . mysqli_connect_error());
}

//echo "Connected Successfully";

?>