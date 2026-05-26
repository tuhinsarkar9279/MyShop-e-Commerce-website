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
                <form class="d-flex mx-auto w-50" role="search">
                    <input class="form-control me-2"
                        type="search"
                        placeholder="Search Products..."
                        aria-label="Search">

                    <button class="btn btn-dark" type="submit">
                        Search
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
                            0
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

    <!-- Cart Section -->
    <section class="container my-5">

        <!-- Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">
                My Cart
            </h2>


        </div>

        <div class="row">

            <!-- Cart Items -->
            <div class="col-lg-8">

                <!-- Cart Item -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="row g-0 align-items-center">

                        <!-- Product Image -->
                        <div class="col-md-3">

                            <img src="images/laptop.jpg"
                                class="img-fluid rounded-start"
                                height="200"
                                style="object-fit:cover;">

                        </div>

                        <!-- Product Details -->
                        <div class="col-md-6">

                            <div class="card-body">

                                <h5 class="card-title">
                                    Gaming Laptop
                                </h5>

                                <p class="text-muted">
                                    Electronics
                                </p>

                                <h5 class="text-success">
                                    ₹55,000
                                </h5>

                                <!-- Quantity -->
                                <div class="d-flex align-items-center mt-3">

                                    <button class="btn btn-outline-dark btn-sm">
                                        -
                                    </button>

                                    <span class="mx-3">
                                        1
                                    </span>

                                    <button class="btn btn-outline-dark btn-sm">
                                        +
                                    </button>

                                </div>

                            </div>

                        </div>

                        <!-- Actions -->
                        <div class="col-md-3 text-center">

                            <button class="btn btn-danger mb-2">

                                <i class="bi bi-trash"></i>
                                Remove

                            </button>

                            <br>

                            <button class="btn btn-dark">

                                Buy Now

                            </button>

                        </div>

                    </div>

                </div>

                <!-- Cart Item -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="row g-0 align-items-center">

                        <div class="col-md-3">

                            <img src="images/shoes.jpg"
                                class="img-fluid rounded-start"
                                height="200"
                                style="object-fit:cover;">

                        </div>

                        <div class="col-md-6">

                            <div class="card-body">

                                <h5 class="card-title">
                                    Sports Shoes
                                </h5>

                                <p class="text-muted">
                                    Shoes
                                </p>

                                <h5 class="text-success">
                                    ₹2,499
                                </h5>

                                <div class="d-flex align-items-center mt-3">

                                    <button class="btn btn-outline-dark btn-sm">
                                        -
                                    </button>

                                    <span class="mx-3">
                                        1
                                    </span>

                                    <button class="btn btn-outline-dark btn-sm">
                                        +
                                    </button>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 text-center">

                            <button class="btn btn-danger mb-2">

                                <i class="bi bi-trash"></i>
                                Remove

                            </button>

                            <br>

                            <button class="btn btn-dark">

                                Buy Now

                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Price Summary -->
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">
                            Price Details
                        </h4>

                        <div class="d-flex justify-content-between mb-3">

                            <span>
                                Price (2 Items)
                            </span>

                            <span>
                                ₹57,499
                            </span>

                        </div>

                        <div class="d-flex justify-content-between mb-3">

                            <span>
                                Delivery Charges
                            </span>

                            <span class="text-success">
                                FREE
                            </span>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between fw-bold fs-5">

                            <span>
                                Total Amount
                            </span>

                            <span class="text-success">
                                ₹57,499
                            </span>

                        </div>

                        <!-- Checkout -->
                        <button class="btn btn-dark w-100 mt-4 py-3">

                            Proceed to Checkout

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </section>
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