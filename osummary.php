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

    <title>Order Summary</title>

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

            <div class="container-fluid p-0 align-items-center d-flex">

                <!-- Logo -->
                <a class=" " href="index.php">
                    <img style="width: 6.25em;" src="assets/img/logo.png" alt="logo">

                </a>

                <!-- Mobile Toggle -->


                <!-- Navbar Content -->


                <!-- Search Bar -->
                <form class="d-flex mx-auto position-relative" role="search">

                    <!-- Search Input -->
                    <input class="form-control pe-5"
                        type="search"
                        placeholder="Search Products..."
                        aria-label="Search">

                    <!-- Search Icon Button -->
                    <button class="btn position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent"
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


    <!-- Order Summary -->
    <section class="container my-5">

        <!-- Heading -->
        <div class="mb-5">

            <h2 class="fw-bold">
                Order Summary
            </h2>

            <p class="text-muted">
                Review your items and complete your order
            </p>

        </div>

        <div class="row g-5">

            <!-- Left Side -->
            <div class="col-lg-8">

                <!-- Ordered Products -->
<?php

$query = mysqli_query(

    $conn,

    "SELECT

    order_summary.*,

    products.*

    FROM order_summary

    JOIN products

    ON order_summary.product_id = products.id

    WHERE order_summary.user_id='$user_id'

    ORDER BY order_summary.id DESC"

);

while($row = mysqli_fetch_assoc($query)){

?>

<div class="row align-items-center mb-4">

    <div class="col-md-3">

        <img src="uploads/<?php echo $row['product_image']; ?>"

        class="img-fluid rounded">

    </div>

    <div class="col-md-6">

        <h5>

            <?php echo $row['product_name']; ?>

        </h5>

        <h5 class="text-success">

            ₹<?php echo $row['product_price']; ?>

        </h5>

    </div>

    <div class="col-md-3">

        Qty:

        <?php echo $row['quantity']; ?>

    </div>

</div>

<hr>

<?php } ?>
                <!-- Address -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">

                            Delivery Address

                        </h4>

                        <form>

                            <div class="row">

                                <!-- Name -->
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Full Name
                                    </label>

                                    <input type="text"
                                        class="form-control"
                                        placeholder="Enter full name">

                                </div>

                                <!-- Phone -->
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Phone Number
                                    </label>

                                    <input type="tel"
                                        class="form-control"
                                        placeholder="Enter phone number">

                                </div>

                                <!-- Address -->
                                <div class="col-12 mb-3">

                                    <label class="form-label">
                                        Full Address
                                    </label>

                                    <textarea class="form-control"
                                        rows="4"
                                        placeholder="Enter full address"></textarea>

                                </div>

                                <!-- City -->
                                <div class="col-md-4 mb-3">

                                    <label class="form-label">
                                        City
                                    </label>

                                    <input type="text"
                                        class="form-control">

                                </div>

                                <!-- State -->
                                <div class="col-md-4 mb-3">

                                    <label class="form-label">
                                        State
                                    </label>

                                    <input type="text"
                                        class="form-control">

                                </div>

                                <!-- PIN -->
                                <div class="col-md-4 mb-3">

                                    <label class="form-label">
                                        PIN Code
                                    </label>

                                    <input type="number"
                                        class="form-control">

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

                <!-- Payment Options -->
                <div class="card border-0 shadow-sm">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">

                            Payment Method

                        </h4>

                        <!-- COD -->
                        <div class="form-check mb-3">

                            <input class="form-check-input"
                                type="radio"
                                name="payment"
                                checked>

                            <label class="form-check-label">

                                Cash on Delivery

                            </label>

                        </div>

                        <!-- UPI -->
                        <div class="form-check mb-3">

                            <input class="form-check-input"
                                type="radio"
                                name="payment">

                            <label class="form-check-label">

                                UPI Payment

                            </label>

                        </div>

                        <!-- Card -->
                        <div class="form-check mb-3">

                            <input class="form-check-input"
                                type="radio"
                                name="payment">

                            <label class="form-check-label">

                                Debit / Credit Card

                            </label>

                        </div>

                        <!-- Net Banking -->
                        <div class="form-check">

                            <input class="form-check-input"
                                type="radio"
                                name="payment">

                            <label class="form-check-label">

                                Net Banking

                            </label>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Right Side -->
            <div class="col-lg-4">

                <!-- Price Summary -->
                <?php

                $price_query = mysqli_query(

                    $conn,

                    "SELECT

                     order_summary.quantity,

                     products.product_price

                     FROM order_summary

                     INNER JOIN products

                     ON order_summary.product_id = products.id

                     WHERE order_summary.user_id='$user_id'"

                                 );

                $total_items = 0;

                $total_price = 0;

                while ($item = mysqli_fetch_assoc($price_query)) {

                    $total_items += $item['quantity'];

                    $total_price +=
                        $item['product_price']
                        *
                        $item['quantity'];
                }

                $discount = 1000; // Change if needed

                $final_amount = $total_price - $discount;

                if ($final_amount < 0) {

                    $final_amount = 0;
                }

                ?>

                <div class="card border-0 shadow-sm sticky-top"
                    style="top:20px;">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">

                            Price Details

                        </h4>

                        <!-- Product Price -->
                        <div class="d-flex justify-content-between mb-3">

                            <span>

                                Price (<?php echo $total_items; ?> Items)

                            </span>

                            <span>

                                ₹<?php echo $total_price; ?>

                            </span>

                        </div>

                        <!-- Delivery -->
                        <div class="d-flex justify-content-between mb-3">

                            <span>

                                Delivery Charges

                            </span>

                            <span class="text-success">

                                FREE

                            </span>

                        </div>

                        <!-- Discount -->
                        <div class="d-flex justify-content-between mb-3">

                            <span>

                                Discount

                            </span>

                            <span class="text-danger">

                                - ₹<?php echo $discount; ?>

                            </span>

                        </div>

                        <hr>

                        <!-- Total -->
                        <div class="d-flex justify-content-between fw-bold fs-5">

                            <span>

                                Total Amount

                            </span>

                            <span class="text-success">

                                ₹<?php echo $final_amount; ?>

                            </span>

                        </div>

                        <!-- Button -->
                        <button class="btn btn-dark w-100 mt-4 py-3">

                            Place Order

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