<?php

session_start();

include 'connect.php';

if(isset($_POST['login'])){

    $email = $_POST['email'];

    $password = md5($_POST['password']);

    $query = mysqli_query(

        $conn,

        "SELECT *

        FROM users

        WHERE email='$email'

        AND password='$password'

        AND role='admin'"

    );

    if(mysqli_num_rows($query) > 0){

        $row = mysqli_fetch_assoc($query);

        $_SESSION['admin_id'] = $row['id'];

        $_SESSION['admin_name'] = $row['name'];

        $_SESSION['admin_email'] = $row['email'];

        $_SESSION['admin_image'] = $row['image'];

        header("Location: admin.php");

        exit();

    }else{

        $msg = "Invalid Email or Password";

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-body">

                    <h3 class="text-center mb-4">

                        Admin Login

                    </h3>

                    <?php

                    if(isset($msg)){

                        echo "<div class='alert alert-danger'>$msg</div>";

                    }

                    ?>

                    <form method="POST">

                        <input type="email"

                            name="email"

                            class="form-control mb-3"

                            placeholder="Admin Email"

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

                        Don't have an account?

                        <a href="admin-registration.php">

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