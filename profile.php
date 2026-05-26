<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Profile Page</title>

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


    <!-- Profile Section -->
    <section class="container my-5">

        <div class="row g-4">

            <!-- Left Profile -->
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center">

                        <!-- Profile Image -->
                        <img src="images/user.jpg"
                            class="rounded-circle mb-3"
                            width="120"
                            height="120"
                            style="object-fit:cover;">

                        <!-- User Name -->
                        <h3 class="fw-bold">
                            Tuhin Sarkar
                        </h3>

                        <p class="text-muted">
                            tuhin@example.com
                        </p>

                        <!-- Buttons -->
                        <div class="d-grid gap-2 mt-4">

                            <button class="btn btn-dark">

                                <i class="bi bi-pencil-square"></i>
                                Edit Profile

                            </button>

                            <button class="btn btn-outline-danger">

                                <i class="bi bi-box-arrow-right"></i>
                                Logout

                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Right Content -->
            <div class="col-lg-8">

                <!-- Navigation -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-body">

                        <ul class="nav nav-pills justify-content-center"
                            id="profileTab"
                            role="tablist">

                            <!-- Orders -->
                            <li class="nav-item">

                                <button class="nav-link active"
                                    data-bs-toggle="tab"
                                    data-bs-target="#orders">

                                    Ordered Items

                                </button>

                            </li>

                            <!-- Wishlist -->
                            <li class="nav-item">

                                <button class="nav-link"
                                    data-bs-toggle="tab"
                                    data-bs-target="#wishlist">

                                    Wishlist

                                </button>

                            </li>

                            <!-- Settings -->
                            <li class="nav-item">

                                <button class="nav-link"
                                    data-bs-toggle="tab"
                                    data-bs-target="#settings">

                                    Settings

                                </button>

                            </li>

                        </ul>

                    </div>

                </div>

                <!-- Tab Content -->
                <div class="tab-content">

                    <!-- Ordered Items -->
                    <div class="tab-pane fade show active"
                        id="orders">

                        <!-- Order Card -->
                        <div class="card border-0 shadow-sm mb-4">

                            <div class="row g-0 align-items-center">

                                <!-- Image -->
                                <div class="col-md-3">

                                    <img src="images/laptop.jpg"
                                        class="img-fluid rounded-start"
                                        height="200"
                                        style="object-fit:cover;">

                                </div>

                                <!-- Details -->
                                <div class="col-md-6">

                                    <div class="card-body">

                                        <h5 class="card-title">
                                            Gaming Laptop
                                        </h5>

                                        <p class="text-muted">
                                            Ordered on 25 May 2026
                                        </p>

                                        <h5 class="text-success">
                                            ₹55,000
                                        </h5>

                                        <span class="badge bg-success">
                                            Delivered
                                        </span>

                                    </div>

                                </div>

                                <!-- Action -->
                                <div class="col-md-3 text-center">

                                    <button class="btn btn-dark">

                                        Buy Again

                                    </button>

                                </div>

                            </div>

                        </div>

                        <!-- Order Card -->
                        <div class="card border-0 shadow-sm">

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
                                            Ordered on 10 May 2026
                                        </p>

                                        <h5 class="text-success">
                                            ₹2,499
                                        </h5>

                                        <span class="badge bg-warning text-dark">
                                            Shipping
                                        </span>

                                    </div>

                                </div>

                                <div class="col-md-3 text-center">

                                    <button class="btn btn-dark">

                                        Track Order

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Wishlist -->
                    <div class="tab-pane fade"
                        id="wishlist">

                        <div class="card border-0 shadow-sm">

                            <div class="card-body text-center py-5">

                                <i class="bi bi-heart fs-1 text-danger"></i>

                                <h4 class="mt-3">
                                    Wishlist Items
                                </h4>

                                <p class="text-muted">

                                    Your wishlist products will appear here.

                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- Settings -->
                    <div class="tab-pane fade"
                        id="settings">

                        <div class="card border-0 shadow-sm">

                            <div class="card-body">

                                <h4 class="fw-bold mb-4">
                                    Account Settings
                                </h4>

                                <!-- Form -->
                                <form>

                                    <div class="mb-3">

                                        <label class="form-label">
                                            Full Name
                                        </label>

                                        <input type="text"
                                            class="form-control"
                                            value="Tuhin Sarkar">

                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">
                                            Email Address
                                        </label>

                                        <input type="email"
                                            class="form-control"
                                            value="tuhin@example.com">

                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">
                                            Password
                                        </label>

                                        <input type="password"
                                            class="form-control"
                                            placeholder="Enter new password">

                                    </div>

                                    <button class="btn btn-dark">

                                        Save Changes

                                    </button>

                                </form>

                            </div>

                        </div>

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