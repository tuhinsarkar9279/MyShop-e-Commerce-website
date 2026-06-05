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
            'delivery',
            '$image'

            )"

        );

        header("Location: delivery-login.php");

        exit();

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Delivery Agent Registration</title>

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

                        Delivery Agent Registration

                    </h3>

                    <?php

                    if(isset($msg)){

                    ?>

                    <div class="alert alert-danger">

                        <?php echo $msg; ?>

                    </div>

                    <?php } ?>

                    <form method="POST"
                        enctype="multipart/form-data">

                        <div class="mb-3">

                            <label class="form-label">

                                Full Name

                            </label>

                            <input type="text"

                                name="name"

                                class="form-control"

                                required>

                        </div>

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

                        <div class="mb-3">

                            <label class="form-label">

                                Profile Image

                            </label>

                            <input type="file"

                                name="image"

                                class="form-control">

                        </div>

                        <button

                            type="submit"

                            name="register"

                            class="btn btn-dark w-100">

                            Register

                        </button>

                    </form>

                    <p class="text-center mt-3">

                        Already have an account?

                        <a href="delivery-login.php">

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