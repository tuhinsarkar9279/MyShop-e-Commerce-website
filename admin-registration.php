<?php

include 'connect.php';

if(isset($_POST['register'])){

    $name = $_POST['name'];

    $email = $_POST['email'];

    $password = md5($_POST['password']);

    $image = "";

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

        $image = time() . "_" . $_FILES['image']['name'];

        move_uploaded_file(

            $_FILES['image']['tmp_name'],

            "uploads/" . $image

        );

    }

    $check = mysqli_query(

        $conn,

        "SELECT *

        FROM users

        WHERE email='$email'"

    );

    if(mysqli_num_rows($check) > 0){

        $msg = "Email Already Exists";

    }else{

        mysqli_query(

            $conn,

            "INSERT INTO users(

            name,
            email,
            password,
            role,
            image

            )

            VALUES(

            '$name',
            '$email',
            '$password',
            'admin',
            '$image'

            )"

        );

        header("Location: admin-login.php");

        exit();

    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Admin Registration</title>

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

                        Admin Registration

                    </h3>

                    <?php

                    if(isset($msg)){

                        echo "<div class='alert alert-danger'>$msg</div>";

                    }

                    ?>

                    <form method="POST"
                        enctype="multipart/form-data">

                        <input type="text"

                            name="name"

                            class="form-control mb-3"

                            placeholder="Admin Name"

                            required>

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

                        <input type="file"

                            name="image"

                            class="form-control mb-3"

                            required>

                        <button

                            type="submit"

                            name="register"

                            class="btn btn-dark w-100">

                            Register

                        </button>

                    </form>

                    <p class="text-center mt-3">

                        Already have an account?

                        <a href="admin-login.php">

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