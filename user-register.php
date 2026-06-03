<?php

include 'connect.php';

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $check = mysqli_query(
        $conn,
        "SELECT * FROM users
        WHERE email='$email'"
    );

    if (mysqli_num_rows($check) > 0) {

        $msg = "Email Already Exists";
    } else {

        mysqli_query(

            $conn,

            "INSERT INTO users(

            name,
            email,
            password,
            role

            )

            VALUES(

            '$name',
            '$email',
            '$password',
            'buyer'

            )"

        );

        header("Location: user-login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <title>User Register</title>

</head>

<body>

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card shadow">

                    <div class="card-body">

                        <h3 class="text-center mb-4">

                            User Registration

                        </h3>

                        <form method="POST">

                            <input type="text"
                                name="name"
                                class="form-control mb-3"
                                placeholder="Full Name"
                                required>

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

                            <button type="submit"
                                name="register"
                                class="btn btn-dark w-100">

                                Register

                            </button>

                        </form>

                        <p class="text-center mt-3">

                            Already Have Account?

                            <a href="user-login.php">

                                Login

                            </a>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>