<?php

session_start();

include 'connect.php';

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string(

        $conn,

        $_POST['email']

    );

    $password = md5($_POST['password']);

    $query = mysqli_query(

        $conn,

        "SELECT *

        FROM users

        WHERE email='$email'

        AND password='$password'

        AND role='delivery'"

    );

    if(mysqli_num_rows($query) > 0){

        $row = mysqli_fetch_assoc($query);

        $_SESSION['delivery_id'] = $row['id'];

        $_SESSION['delivery_name'] = $row['name'];

        $_SESSION['delivery_email'] = $row['email'];

        $_SESSION['delivery_image'] = $row['image'];

        header("Location: dadmin.php");

        exit();

    }else{

        $msg = "Invalid Email or Password";

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Delivery Agent Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card shadow border-0">

                    <div class="card-body p-4">

                        <h3 class="text-center mb-4">

                            Delivery Agent Login

                        </h3>

                        <?php

                        if(isset($msg)){

                        ?>

                        <div class="alert alert-danger">

                            <?php echo $msg; ?>

                        </div>

                        <?php } ?>

                        <form method="POST">

                            <div class="mb-3">

                                <label class="form-label">

                                    Email Address

                                </label>

                                <input type="email"

                                    name="email"

                                    class="form-control"

                                    required>

                            </div>

                            <div class="mb-3">

                                <label class="form-label">

                                    Password

                                </label>

                                <input type="password"

                                    name="password"

                                    class="form-control"

                                    required>

                            </div>

                            <button

                                type="submit"

                                name="login"

                                class="btn btn-dark w-100">

                                Login

                            </button>

                        </form>

                        <div class="text-center mt-3">

                            Don't have an account?

                            <a href="delivery-register.php">

                                Register

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>