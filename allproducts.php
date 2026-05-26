<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>
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



    <div class="container">
        <!-- Top Filter Section -->
        <section class="bg-white shadow-sm py-4 mb-5">

            <div class="container">

                <div class="row g-3">

                    <!-- Category -->
                    <div class="col-lg-4">

                        <select class="form-select" id="categoryFilter">

                            <option value="all">
                                All Categories
                            </option>

                            <option value="electronics">
                                Electronics
                            </option>

                            <option value="fashion">
                                Fashion
                            </option>

                            <option value="shoes">
                                Shoes
                            </option>

                            <option value="beauty">
                                Beauty
                            </option>

                        </select>

                    </div>

                    <!-- Sort -->
                    <div class="col-lg-4">

                        <select class="form-select" id="sortProducts">

                            <option value="default">
                                Sort By
                            </option>

                            <option value="low">
                                Price Low to High
                            </option>

                            <option value="high">
                                Price High to Low
                            </option>

                        </select>

                    </div>

                    <!-- Filter Button -->
                    <div class="col-lg-4">

                        <button class="btn btn-dark w-100"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#filterCanvas">

                            <i class="bi bi-funnel"></i>
                            Filters

                        </button>

                    </div>

                </div>

            </div>

        </section>

        <!-- Products -->
        <section class="container mb-5">

            <div class="row g-4" id="productContainer">

                <!-- Product 1 -->
                <div class="col-lg-3 col-md-6 product-card"
                    data-category="electronics"
                    data-price="55000">

                    <div class="card border-0 shadow-sm h-100">

                        <img src="images/laptop.jpg"
                            class="card-img-top"
                            height="250"
                            style="object-fit:cover;">

                        <div class="card-body">

                            <h5>Gaming Laptop</h5>

                            <p class="fw-bold text-success">
                                ₹55,000
                            </p>

                            <div class="text-warning mb-3">
                                ★★★★☆
                            </div>

                            <div class="d-flex gap-2">

                                <button class="btn btn-dark w-100">

                                    <i class="bi bi-cart"></i>
                                    Cart

                                </button>

                                <button class="btn btn-outline-danger">

                                    <i class="bi bi-heart"></i>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Product 2 -->
                <div class="col-lg-3 col-md-6 product-card"
                    data-category="fashion"
                    data-price="799">

                    <div class="card border-0 shadow-sm h-100">

                        <img src="images/shirt.jpg"
                            class="card-img-top"
                            height="250"
                            style="object-fit:cover;">

                        <div class="card-body">

                            <h5>T-Shirt</h5>

                            <p class="fw-bold text-success">
                                ₹799
                            </p>

                            <div class="text-warning mb-3">
                                ★★★★★
                            </div>

                            <div class="d-flex gap-2">

                                <button class="btn btn-dark w-100">

                                    <i class="bi bi-cart"></i>
                                    Cart

                                </button>

                                <button class="btn btn-outline-danger">

                                    <i class="bi bi-heart"></i>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Product 3 -->
                <div class="col-lg-3 col-md-6 product-card"
                    data-category="shoes"
                    data-price="2499">

                    <div class="card border-0 shadow-sm h-100">

                        <img src="images/shoes.jpg"
                            class="card-img-top"
                            height="250"
                            style="object-fit:cover;">

                        <div class="card-body">

                            <h5>Sports Shoes</h5>

                            <p class="fw-bold text-success">
                                ₹2,499
                            </p>

                            <div class="text-warning mb-3">
                                ★★★★☆
                            </div>

                            <div class="d-flex gap-2">

                                <button class="btn btn-dark w-100">

                                    <i class="bi bi-cart"></i>
                                    Cart

                                </button>

                                <button class="btn btn-outline-danger">

                                    <i class="bi bi-heart"></i>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Product 4 -->
                <div class="col-lg-3 col-md-6 product-card"
                    data-category="beauty"
                    data-price="1299">

                    <div class="card border-0 shadow-sm h-100">

                        <img src="images/perfume.jpg"
                            class="card-img-top"
                            height="250"
                            style="object-fit:cover;">

                        <div class="card-body">

                            <h5>Perfume</h5>

                            <p class="fw-bold text-success">
                                ₹1,299
                            </p>

                            <div class="text-warning mb-3">
                                ★★★★★
                            </div>

                            <div class="d-flex gap-2">

                                <button class="btn btn-dark w-100">

                                    <i class="bi bi-cart"></i>
                                    Cart

                                </button>

                                <button class="btn btn-outline-danger">

                                    <i class="bi bi-heart"></i>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- Filter Sidebar -->
        <div class="offcanvas offcanvas-end"
            tabindex="-1"
            id="filterCanvas">

            <div class="offcanvas-header">

                <h5>Filters</h5>

                <button type="button"
                    class="btn-close"
                    data-bs-dismiss="offcanvas">
                </button>

            </div>

            <div class="offcanvas-body">

                <h6 class="fw-bold mb-3">
                    Price Range
                </h6>

                <input type="range" class="form-range">

                <h6 class="fw-bold mt-4 mb-3">
                    Rating
                </h6>

                <div class="form-check">

                    <input class="form-check-input"
                        type="checkbox">

                    <label class="form-check-label">
                        4★ & Above
                    </label>

                </div>

                <div class="form-check">

                    <input class="form-check-input"
                        type="checkbox">

                    <label class="form-check-label">
                        3★ & Above
                    </label>

                </div>

                <button class="btn btn-dark w-100 mt-4">

                    Apply Filters

                </button>

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

    <script src="allscript.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>