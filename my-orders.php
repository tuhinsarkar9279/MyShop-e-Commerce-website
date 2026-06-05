<?php

session_start();

include 'connect.php';

if (!isset($_SESSION['user_id'])) {

    header("Location:user-login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>My Orders</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

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


    <div class="container my-5">


        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">

                My Orders

            </h2>

            <a href="index.php"
                class="btn btn-dark">

                Continue Shopping

            </a>

        </div>

        <?php

        $query = mysqli_query(

            $conn,

            "SELECT

    orders.*,

    products.product_name,

    products.product_price,

    products.product_image

    FROM orders

    INNER JOIN products

    ON orders.product_id = products.id

    WHERE orders.user_id='$user_id'

    ORDER BY orders.id DESC"

        );

        if (mysqli_num_rows($query) > 0) {

            while ($row = mysqli_fetch_assoc($query)) {

        ?>

                <div class="card shadow-sm border-0 mb-4">

                    <div class="card-body">

                        <div class="row align-items-center">

                            <!-- Product Image -->

                            <div class="col-md-2">

                                <img src="uploads/<?php echo $row['product_image']; ?>"

                                    class="img-fluid rounded"

                                    style="height:120px;object-fit:cover;">

                            </div>

                            <!-- Product Details -->

                            <div class="col-md-4">

                                <h5>

                                    <?php echo $row['product_name']; ?>

                                </h5>

                                <p class="text-success fw-bold">

                                    ₹<?php echo $row['product_price']; ?>

                                </p>

                            </div>

                            <!-- Quantity -->

                            <div class="col-md-2">

                                <strong>Qty:</strong>

                                <?php echo $row['quantity']; ?>

                            </div>

                            <!-- Status -->

                            <div class="col-md-2">

                                <strong>Status</strong>

                                <br>

                                <?php

                                if ($row['order_status'] == "Delivered") {

                                    echo "<span class='badge bg-success'>Delivered</span>";
                                } elseif ($row['order_status'] == "Shipped") {

                                    echo "<span class='badge bg-primary'>Shipped</span>";
                                } elseif ($row['order_status'] == "Processing") {

                                    echo "<span class='badge bg-warning text-dark'>Processing</span>";
                                } else {

                                    echo "<span class='badge bg-secondary'>Pending</span>";
                                }

                                ?>

                            </div>

                            <!-- Order Date -->

                            <div class="col-md-2">

                                <small class="text-muted">

                                    <?php echo date(
                                        'd M Y',
                                        strtotime($row['order_date'])
                                    ); ?>

                                </small>

                            </div>

                        </div>

                        <hr>

                        <div>

                            <strong>Delivery Address:</strong>

                            <br>

                            <?php echo $row['full_name']; ?>

                            <br>

                            <?php echo $row['phone']; ?>

                            <br>

                            <?php echo $row['address']; ?>,

                            <?php echo $row['city']; ?>,

                            <?php echo $row['state']; ?>

                            -

                            <?php echo $row['pincode']; ?>

                        </div>

                    </div>

                </div>

            <?php

            }
        } else {

            ?>

            <div class="alert alert-info">

                No Orders Found.

            </div>

        <?php } ?>


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

</body>

</html>