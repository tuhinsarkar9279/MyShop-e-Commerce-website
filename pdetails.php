<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Product Details</title>

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

    <!-- Product Details Section -->
    <section class="container my-5">

        <div class="row g-5">

            <!-- Product Image -->
            <div class="col-lg-5">

                <div class="card border-0 shadow-sm">

                    <img src="images/laptop.jpg"
                        class="img-fluid rounded"
                        height="500"
                        style="object-fit:cover;">

                </div>

            </div>

            <!-- Product Details -->
            <div class="col-lg-7">

                <!-- Category -->
                <span class="badge bg-dark mb-3">

                    Electronics

                </span>

                <!-- Product Name -->
                <h1 class="fw-bold mb-3">

                    Gaming Laptop

                </h1>

                <!-- Rating -->
                <div class="text-warning fs-5 mb-3">

                    ★★★★☆
                    <span class="text-muted fs-6">
                        (4.5 Ratings)
                    </span>

                </div>

                <!-- Price -->
                <h2 class="text-success fw-bold mb-4">

                    ₹55,000

                </h2>

                <!-- Description -->
                <p class="text-muted fs-5">

                    Powerful gaming laptop with high-speed processor,
                    RTX graphics card, 16GB RAM, and ultra-fast SSD
                    storage for smooth gaming and performance.

                </p>

                <!-- Features -->
                <div class="mt-4">

                    <h5 class="fw-bold mb-3">

                        Product Features

                    </h5>

                    <ul class="list-group">

                        <li class="list-group-item">
                            Intel Core i7 Processor
                        </li>

                        <li class="list-group-item">
                            16GB RAM
                        </li>

                        <li class="list-group-item">
                            512GB SSD Storage
                        </li>

                        <li class="list-group-item">
                            RTX Graphics Card
                        </li>

                    </ul>

                </div>

                <!-- Quantity -->
                <div class="mt-4">

                    <h5 class="fw-bold mb-3">

                        Quantity

                    </h5>

                    <div class="d-flex align-items-center">

                        <button class="btn btn-outline-dark">

                            -

                        </button>

                        <span class="mx-4 fs-5">

                            1

                        </span>

                        <button class="btn btn-outline-dark">

                            +

                        </button>

                    </div>

                </div>

                <!-- Buttons -->
                <div class="mt-5 d-flex flex-wrap gap-3">

                    <!-- Add to Cart -->
                    <button class="btn btn-dark btn-lg px-5">

                        <i class="bi bi-cart"></i>
                        Add to Cart

                    </button>

                    <!-- Buy Now -->
                    <button class="btn btn-success btn-lg px-5">

                        Buy Now

                    </button>

                    <!-- Wishlist -->
                    <button class="btn btn-outline-danger btn-lg">

                        <i class="bi bi-heart"></i>

                    </button>

                </div>

            </div>

        </div>

    </section>

    <!-- Related Products -->
    <section class="container mb-5">

        <h3 class="fw-bold mb-4">

            Related Products

        </h3>

        <div class="row g-4">

            <!-- Product -->
            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm h-100">

                    <img src="images/headphone.jpg"
                        class="card-img-top"
                        height="220"
                        style="object-fit:cover;">

                    <div class="card-body">

                        <h5>
                            Headphone
                        </h5>

                        <p class="text-success fw-bold">
                            ₹3,999
                        </p>

                        <button class="btn btn-dark w-100">

                            View Product

                        </button>

                    </div>

                </div>

            </div>

            <!-- Product -->
            <div class="col-lg-3 col-md-6">

                <div class="card border-0 shadow-sm h-100">

                    <img src="images/mouse.jpg"
                        class="card-img-top"
                        height="220"
                        style="object-fit:cover;">

                    <div class="card-body">

                        <h5>
                            Gaming Mouse
                        </h5>

                        <p class="text-success fw-bold">
                            ₹1,499
                        </p>

                        <button class="btn btn-dark w-100">

                            View Product

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