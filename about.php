<?php
session_start();
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>About Us</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

</head>

<body class="bg-light">
    <?php

    $cart_count = 0;

    if (isset($_SESSION['user_id'])) {

        $user_id = $_SESSION['user_id'];

        $cart_query = mysqli_query(

            $conn,

            "SELECT COALESCE(SUM(quantity),0) AS total

        FROM cart

        WHERE user_id='$user_id'"

        );

        $cart_data = mysqli_fetch_assoc($cart_query);

        $cart_count = $cart_data['total'];
    }

    ?>
    <nav class="navbar border-bottom navbar-expand-lg bg-body-tertiary mt-1 shadow-sm nav1">
        <div class="container">

            <div class="container-fluid align-items-center d-flex">

                <!-- Logo -->
                <a class="navbar-brand fw-bold" href="index.php">
                    <img style="width: 25%;" src="assets/img/logo.png" alt="logo">

                </a>

                <!-- Mobile Toggle -->
                <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>
                </button>

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
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

                                <?php echo $cart_count; ?>

                            </span>

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


    <!-- Hero Section -->
    <section class="bg-dark text-white py-5">

        <div class="container">

            <div class="row align-items-center">

                <!-- Left -->
                <div class="col-lg-6">

                    <h1 class="fw-bold display-4 mb-4">

                        About Our Company

                    </h1>

                    <p class="fs-5 text-light">

                        Welcome to MyShop —
                        your trusted online shopping destination
                        for electronics, fashion, beauty,
                        furniture, and more.

                    </p>

                    <button class="btn btn-light btn-lg mt-3">

                        Explore Products

                    </button>

                </div>

                <!-- Right -->
                <div class="col-lg-6 text-center">

                    <img src="images/about.png"
                        class="img-fluid"
                        width="500">

                </div>

            </div>

        </div>

    </section>

    <!-- About Section -->
    <section class="container py-5">

        <div class="row align-items-center g-5">

            <!-- Image -->
            <div class="col-lg-6">

                <img src="images/company.jpg"
                    class="img-fluid rounded shadow">

            </div>

            <!-- Content -->
            <div class="col-lg-6">

                <h2 class="fw-bold mb-4">

                    Who We Are

                </h2>

                <p class="text-muted fs-5">

                    MyShop is a modern e-commerce platform
                    dedicated to providing customers with
                    quality products at affordable prices.

                    We connect buyers and sellers through
                    a secure and user-friendly online shopping experience.

                </p>

                <p class="text-muted fs-5">

                    Our mission is to make shopping easy,
                    fast, and reliable for everyone.

                </p>

            </div>

        </div>

    </section>

    <!-- Features -->
    <section class="bg-white py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="fw-bold">

                    Why Choose Us

                </h2>

                <p class="text-muted">

                    Best services for our customers

                </p>

            </div>

            <div class="row g-4">

                <!-- Feature -->
                <div class="col-lg-4">

                    <div class="card border-0 shadow-sm h-100 text-center p-4">

                        <i class="bi bi-truck fs-1 text-primary mb-3"></i>

                        <h4 class="fw-bold">

                            Fast Delivery

                        </h4>

                        <p class="text-muted">

                            Quick and secure delivery
                            at your doorstep.

                        </p>

                    </div>

                </div>

                <!-- Feature -->
                <div class="col-lg-4">

                    <div class="card border-0 shadow-sm h-100 text-center p-4">

                        <i class="bi bi-shield-check fs-1 text-success mb-3"></i>

                        <h4 class="fw-bold">

                            Secure Payment

                        </h4>

                        <p class="text-muted">

                            Safe and trusted payment methods
                            for all customers.

                        </p>

                    </div>

                </div>

                <!-- Feature -->
                <div class="col-lg-4">

                    <div class="card border-0 shadow-sm h-100 text-center p-4">

                        <i class="bi bi-headset fs-1 text-danger mb-3"></i>

                        <h4 class="fw-bold">

                            24/7 Support

                        </h4>

                        <p class="text-muted">

                            Dedicated support team
                            available anytime.

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Team Section -->
    <section class="container py-5">

        <div class="text-center mb-5">

            <h2 class="fw-bold">

                Meet Our Team

            </h2>

            <p class="text-muted">

                Passionate people behind MyShop

            </p>

        </div>

        <div class="row g-4">

            <!-- Team Member -->
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm text-center p-4">

                    <img src="images/team1.jpg"
                        class="rounded-circle mx-auto mb-3"
                        width="120"
                        height="120"
                        style="object-fit:cover;">

                    <h4 class="fw-bold">

                        Tuhin Sarkar

                    </h4>

                    <p class="text-muted">

                        Founder & Developer

                    </p>

                </div>

            </div>

            <!-- Team Member -->
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm text-center p-4">

                    <img src="images/team2.jpg"
                        class="rounded-circle mx-auto mb-3"
                        width="120"
                        height="120"
                        style="object-fit:cover;">

                    <h4 class="fw-bold">

                        Rahul Das

                    </h4>

                    <p class="text-muted">

                        Marketing Manager

                    </p>

                </div>

            </div>

            <!-- Team Member -->
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm text-center p-4">

                    <img src="images/team3.jpg"
                        class="rounded-circle mx-auto mb-3"
                        width="120"
                        height="120"
                        style="object-fit:cover;">

                    <h4 class="fw-bold">

                        Pritam Gosh

                    </h4>

                    <p class="text-muted">

                        Customer Support

                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- Footer -->

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