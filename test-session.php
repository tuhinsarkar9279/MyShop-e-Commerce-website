<?php

session_start();

if(isset($_SESSION['user_id'])){

    echo "User Logged In";

    echo "<br>";

    echo $_SESSION['user_name'];

}else{

    echo "User Not Logged In";

}

?>