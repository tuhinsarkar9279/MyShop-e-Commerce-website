


<?php

session_start();

include 'connect.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];

    $password = md5($_POST['password']);

    $query = mysqli_query(

        $conn,

        "SELECT * FROM users

        WHERE email='$email'

        AND password='$password'

        AND role='seller'"

    );

    if(mysqli_num_rows($query)>0){

        $row = mysqli_fetch_assoc($query);

        $_SESSION['seller_id'] = $row['id'];

        $_SESSION['seller_name'] = $row['name'];

        header(
            "Location: sadmin.php"
        );

        exit();

    }else{

        echo "<div class='alert alert-danger'>
        Invalid Login Details
        </div>";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<title>Seller Login</title>

</head>

<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-body">

                    <h3 class="text-center mb-4">

                        Seller Login

                    </h3>

                    <form method="POST">

                        <input type="email"

                            name="email"

                            class="form-control mb-3"

                            placeholder="Email"

                            required>

                        <input type="password"

                            name="password"

                            class="form-control mb-3"

                            placeholder="Password"

                            required>

                        <button

                            type="submit"

                            name="login"

                            class="btn btn-dark w-100">

                            Login

                        </button>

                    </form>

                    <p class="text-center mt-3">

                        New Seller?

                        <a href="seller-register.php">

                            Register

                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>