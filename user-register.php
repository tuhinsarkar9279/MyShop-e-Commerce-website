<?php

include 'connect.php';

if(isset($_POST['register'])){

    $name = $_POST['name'];

    $email = $_POST['email'];

    $password = md5($_POST['password']);

    $image = "";

    if(
        isset($_FILES['image']) &&
        $_FILES['image']['error'] == 0
    ){

        $image = time() . "_" . $_FILES['image']['name'];

        move_uploaded_file(

            $_FILES['image']['tmp_name'],

            "uploads/" . $image

        );

    }

    $check = mysqli_query(

        $conn,

        "SELECT * FROM users

        WHERE email='$email'"

    );

    if(mysqli_num_rows($check) > 0){

        $msg = "Email Already Exists";

    }else{

        $result = mysqli_query(

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
            'buyer',
            '$image'

            )"

        );

        if(!$result){

            die(mysqli_error($conn));

        }

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

                        <form method="POST" enctype="multipart/form-data">

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

                            <input type="file"
                                name="image"
                                class="form-control mb-3">

                            <button type="submit"
                                name="register"
                                class="btn btn-dark w-100 ">

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