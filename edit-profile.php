<?php

session_start();

include 'connect.php';

if (!isset($_SESSION['user_id'])) {

    header("Location:user-login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

/* Update Profile */

if (isset($_POST['update'])) {

    $name = $_POST['name'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $image = $_FILES['image']['name'];

    if (!empty($image)) {

        move_uploaded_file(

            $_FILES['image']['tmp_name'],

            "uploads/" . $image

        );

        $image_query = ", image='$image'";
    } else {

        $image_query = "";
    }

    if (!empty($password)) {

        $password = md5($password);

        $password_query = ", password='$password'";
    } else {

        $password_query = "";
    }

    mysqli_query(

        $conn,

        "UPDATE users

        SET

        name='$name',
        email='$email'

        $password_query

        $image_query

        WHERE id='$user_id'"

    );

    header("Location: profile.php");

    exit();
}

/* Get User Data */

$query = mysqli_query(

    $conn,

    "SELECT *

    FROM users

    WHERE id='$user_id'"

);

$user = mysqli_fetch_assoc($query);

?>




<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Cart Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

</head>



<body class="bg-light">
    <nav class="navbar border-bottom navbar-expand-lg bg-body-tertiary mt-1 shadow-sm nav1">
        <div class="container">

            <div class="container-fluid align-items-center d-flex">

                <!-- Logo -->
                <a class="navbar-brand fw-bold" href="index.php">
                    <img style="width: 25%;" src="assets/img/logo.png" alt="logo">

                </a>

                <!-- Mobile Toggle -->
                

                <!-- Navbar Content -->
                <div class="collapse navbar-collapse justify-content-between"
                    id="navbarSupportedContent">

                    <!-- Search Bar -->
                  <form class="d-flex mx-auto position-relative"
                    method="GET"
                    action="search.php">

                    <input
                        class="form-control pe-5"
                        type="search"
                        name="search"
                        placeholder="Search Products..."
                        required>

                    <button
                        class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent"
                        type="submit">

                        <i class="bi bi-search fs-5"></i>

                    </button>

                </form>

                    <!-- Right Side Icons -->
                    <div class="d-flex align-items-center gap-3">

                        <!-- Wishlist -->
                        <a href="wishlist.php"
                            class="text-decoration-none text-dark">

                            <i class="bi bi-heart fs-4"></i>
                        </a>

                        <!-- Cart -->
                        <a href="cart.php"
                            class="text-decoration-none text-dark position-relative">

                            <i class="bi bi-cart3 fs-4"></i>

                            <!-- Cart Count -->

                        </a>

                        <!-- Profile -->
                        <a href="profile.php"
                            class="text-decoration-none text-dark">

                            <i class="bi bi-person-circle fs-4"></i>
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </nav>

    <nav class="navbar mt-0 p-0 navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="container barr">

                <div class="">
                    <ul class="navv p-0 d-flex justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php"><b>Home</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php"><b>About</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="allproducts.php"><b>Category</b></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><b>Cart</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="osummary.php"><b>Checkout</b></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <!-- Cart Section -->
    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-body">

                <h3 class="mb-4">

                    Edit Profile

                </h3>

                <form method="POST"
                    enctype="multipart/form-data">

                    <div class="mb-3">

                        <label>Name</label>

                        <input type="text"

                            name="name"

                            class="form-control"

                            value="<?php echo $user['name']; ?>"

                            required>

                    </div>

                    <div class="mb-3">

                        <label>Email</label>

                        <input type="email"

                            name="email"

                            class="form-control"

                            value="<?php echo $user['email']; ?>"

                            required>

                    </div>

                    <div class="mb-3">

                        <label>New Password</label>

                        <input type="password"

                            name="password"

                            class="form-control"

                            placeholder="Leave blank to keep old password">

                    </div>

                    <div class="mb-3">

                        <label>Profile Image</label>

                        <input type="file"

                            name="image"

                            class="form-control">

                    </div>

                    <button

                        type="submit"

                        name="update"

                        class="btn btn-dark">

                        Update Profile

                    </button>

                </form>

            </div>

        </div>

    </div>
    <footer class="bg-dark text-light pt-5 mt-5 pb-3">

        <div class="container">

            <div class="row">

                <!-- Company Info -->
                <div class="col-lg-4 col-md-6 mb-4">

                    <h3 class="fw-bold mb-3">
                        MyShop
                    </h3>

                    <p class="text-light">

                        Your one-stop online shopping destination
                        for electronics, fashion, shoes,
                        beauty products, and more.

                    </p>

                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-4">

                    <h5 class="fw-bold mb-3">
                        Quick Links
                    </h5>

                    <ul class="list-unstyled">

                        <li class="mb-2">
                            <a href="index.html"
                                class="text-decoration-none text-light">
                                Home
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="products.html"
                                class="text-decoration-none text-light">
                                Products
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="about.html"
                                class="text-decoration-none text-light">
                                About
                            </a>
                        </li>

                        <li class="mb-2">
                            <a href="contact.html"
                                class="text-decoration-none text-light">
                                Contact
                            </a>
                        </li>

                    </ul>

                </div>

                <!-- Categories -->
                <div class="col-lg-3 col-md-6 mb-4">

                    <h5 class="fw-bold mb-3">
                        Categories
                    </h5>

                    <ul class="list-unstyled">

                        <li class="mb-2">Electronics</li>
                        <li class="mb-2">Fashion</li>
                        <li class="mb-2">Shoes</li>
                        <li class="mb-2">Beauty</li>
                        <li class="mb-2">Furniture</li>

                    </ul>

                </div>

                <!-- Contact -->
                <div class="col-lg-3 col-md-6 mb-4">

                    <h5 class="fw-bold mb-3">
                        Contact Us
                    </h5>

                    <p class="mb-2">
                        📍 Agartala, Tripura
                    </p>

                    <p class="mb-2">
                        📞 +91 9876543210
                    </p>

                    <p class="mb-2">
                        ✉ support@myshop.com
                    </p>

                    <!-- Social Icons -->
                    <div class="mt-3 d-flex gap-3">

                        <a href="#"
                            class="text-light text-decoration-none">

                            <i class="bi bi-facebook fs-5"></i>

                        </a>

                        <a href="#"
                            class="text-light text-decoration-none">

                            <i class="bi bi-instagram fs-5"></i>

                        </a>

                        <a href="#"
                            class="text-light text-decoration-none">

                            <i class="bi bi-twitter-x fs-5"></i>

                        </a>

                        <a href="#"
                            class="text-light text-decoration-none">

                            <i class="bi bi-youtube fs-5"></i>

                        </a>

                    </div>

                </div>

            </div>

            <!-- Bottom Footer -->
            <hr class="border-light">

            <div class="text-center">

                <p class="mb-0">

                    © 2026 MyShop. All Rights Reserved.

                </p>

            </div>

        </div>

    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>