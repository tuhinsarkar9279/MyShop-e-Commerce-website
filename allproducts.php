<?php

session_start();

include 'connect.php';

/* Fetch Banner Images */
$query = "SELECT * FROM banners";

$result = mysqli_query($conn, $query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

</head>

<body>
    <?php

$cart_count = 0;

if(isset($_SESSION['user_id'])){

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

    <!-- Filter & Sort Section -->
    <div class="container mb-4">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="row g-3 align-items-end">

                    <!-- Category Filter -->
                    <div class="col-lg-6 col-md-6">

                        <label class="form-label fw-bold">

                            <i class="bi bi-grid"></i>
                            Category

                        </label>

                        <select class="form-select"
                            id="categoryFilter">

                            <option value="all">

                                All Categories

                            </option>

                            <?php

                            $cat_query = mysqli_query(
                                $conn,
                                "SELECT * FROM categories"
                            );

                            while ($cat = mysqli_fetch_assoc($cat_query)) {

                            ?>

                                <option value="<?php
                                                echo strtolower(
                                                    $cat['category_name']
                                                );
                                                ?>">

                                    <?php
                                    echo $cat['category_name'];
                                    ?>

                                </option>

                            <?php } ?>

                        </select>

                    </div>

                    <!-- Sort By -->
                    <div class="col-lg-6 col-md-6">

                        <label class="form-label fw-bold">

                            <i class="bi bi-funnel"></i>
                            Sort By

                        </label>

                        <select class="form-select"
                            id="sortProducts">

                            <option value="default">

                                Default

                            </option>

                            <option value="low">

                                Price: Low to High

                            </option>

                            <option value="high">

                                Price: High to Low

                            </option>

                            <option value="new">

                                Newest Products

                            </option>

                            <option value="old">

                                Oldest Products

                            </option>

                        </select>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Products -->
    <section class="container mb-5">

        <div class="row g-4" id="productContainer">

            <?php

            $query = mysqli_query(

                $conn,

                "SELECT products.*,
            categories.category_name

            FROM products

            LEFT JOIN categories

            ON products.category_id =
            categories.id

            WHERE products.status='approved'

            ORDER BY products.id DESC"

            );

            while ($row = mysqli_fetch_assoc($query)) {

            ?>

                <div class="col-lg-3 col-md-6 product-card"

                    data-category="<?php
                                    echo strtolower(
                                        $row['category_name']
                                    );
                                    ?>"

                    data-price="<?php
                                echo $row['product_price'];
                                ?>">

                    <div class="card border-0 shadow-sm h-100">

                        <!-- Product Image -->
                        <img src="uploads/<?php
                                            echo $row['product_image'];
                                            ?>"

                            class="card-img-top"

                            height="250"

                            style="object-fit:cover;">

                        <div class="card-body">

                            <!-- Product Name -->
                            <h5>

                                <?php
                                echo $row['product_name'];
                                ?>

                            </h5>

                            <!-- Category -->
                            <p class="text-muted small mb-2">

                                <?php
                                echo $row['category_name'];
                                ?>

                            </p>

                            <!-- Price -->
                            <p class="fw-bold text-success">

                                ₹<?php
                                    echo $row['product_price'];
                                    ?>

                            </p>

                            <!-- Rating -->
                            <div class="text-warning mb-3">

                                ★★★★☆

                            </div>

                            <!-- Buttons -->
                            <div class="d-flex gap-2">

                                <!-- Add To Cart -->
                                <form action="add-cart.php" method="GET">

                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?php echo $row['id']; ?>">

                                    <button
                                        type="submit"
                                        class="btn btn-dark">

                                        Add to Cart

                                    </button>

                                </form>

                                <!-- Wishlist -->
                                <a href="add-wishlist.php?id=<?php echo $row['id']; ?>"

                                    class="btn btn-outline-danger">

                                    <ion-icon class="fs-5 mt-1"
                                        name="heart-outline"></ion-icon>

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            <?php } ?>

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

    <script src="allscript.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>