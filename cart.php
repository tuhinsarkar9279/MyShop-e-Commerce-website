<?php

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: user-login.php");

    exit();
}

include 'connect.php';

$user_id = $_SESSION['user_id'];

?>
<?php

include 'connect.php';

$user_id = $_SESSION['user_id'];

$total_price = 0;

/* Cart Query */

$query = mysqli_query(

    $conn,

    "SELECT

    cart.id AS cart_id,

    cart.quantity,

    products.*

    FROM cart

    JOIN products

    ON cart.product_id = products.id

    WHERE cart.user_id='$user_id'"

);

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


    <!-- Cart Section -->
    <section class="container my-5">

        <!-- Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2 class="fw-bold">
                My Cart
            </h2>


        </div>
        <?php

        $total_price = 0;

        $query = mysqli_query(

            $conn,

            "SELECT

                       cart.id AS cart_id,

                       cart.quantity,

                       products.product_name,

                       products.product_price,

                       products.product_image

                       FROM cart

                       INNER JOIN products

                       ON cart.product_id = products.id

                       WHERE cart.user_id='$user_id'"

        );

        while ($row = mysqli_fetch_assoc($query)) {

            $subtotal =
                $row['product_price']
                *
                $row['quantity'];

            $total_price += $subtotal;

        ?>

            <div class="card shadow-sm mb-3">

                <div class="card-body">

                    <div class="row align-items-center">

                        <!-- Product Image -->
                        <div class="col-md-3">

                            <img src="uploads/<?php echo $row['product_image']; ?>"

                                class="img-fluid rounded"

                                height="120">

                        </div>

                        <!-- Product Name -->
                        <div class="col-md-3">

                            <h5>

                                <?php echo $row['product_name']; ?>

                            </h5>

                        </div>

                        <!-- Price -->
                        <div class="col-md-2">

                            ₹<?php echo $row['product_price']; ?>

                        </div>

                        <!-- Quantity -->
                        <div class="col-md-2">

                            <div class="d-flex align-items-center">

                                <a href="update-cart.php?action=minus&id=<?php echo $row['cart_id']; ?>"

                                    class="btn btn-outline-dark btn-sm">

                                    -

                                </a>

                                <span class="mx-3 fw-bold">

                                    <?php echo $row['quantity']; ?>

                                </span>

                                <a href="update-cart.php?action=plus&id=<?php echo $row['cart_id']; ?>"

                                    class="btn btn-outline-dark btn-sm">

                                    +

                                </a>

                            </div>

                        </div>

                        <!-- Remove -->
                        <div class="col-md-2">

                            <a href="remove-cart.php?id=<?php echo $row['cart_id']; ?>"

                                class="btn btn-danger btn-sm"

                                onclick="return confirm('Remove this item?')">

                                Remove

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        <?php } ?>

        <!-- Total Price -->

        <div class="card shadow-sm mt-4">

            <div class="card-body">

                <h4>

                    Total Amount:

                    <span class="text-success">

                        ₹<?php echo $total_price; ?>

                    </span>

                </h4>

                <a href="checkout.php"
                    class="btn btn-dark">
                    Proceed To Checkout
                </a>

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