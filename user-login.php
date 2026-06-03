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

        AND role='buyer'"

    );

    if(mysqli_num_rows($query)>0){

        $row = mysqli_fetch_assoc($query);

        $_SESSION['user_id'] = $row['id'];

        $_SESSION['user_name'] = $row['name'];

        $_SESSION['user_email'] = $row['email'];

        $_SESSION['role'] = $row['role'];

        header("Location: index.php");

        exit();

    }

}
?>

<!DOCTYPE html>
<html>

<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <title>User Login</title>

</head>

<body>

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card shadow">

                    <div class="card-body">

                        <h3 class="text-center mb-4">

                            User Login

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

                            <button type="submit"
                                name="login"
                                class="btn btn-dark w-100">

                                Login

                            </button>

                        </form>

                        <p class="text-center mt-3">

                            New User?

                            <a href="user-register.php">

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