<?php
session_start();
include 'connect.php';

/* Fetch Banner Images */
$query = "SELECT * FROM banners";

$result = mysqli_query($conn, $query);

?>
<?php

$search = $_GET['search'] ?? '';

if (!empty($search)) {

    $query = mysqli_query(

        $conn,

        "SELECT *

        FROM products

        WHERE product_name LIKE '%$search%'

        OR category LIKE '%$search%'

        ORDER BY id DESC"

    );
} else {

    $query = mysqli_query(

        $conn,

        "SELECT *

        FROM products

        ORDER BY id DESC"

    );
}

?>
<?php

if (mysqli_num_rows($query) == 0) {

    echo "

    <div class='col-12'>

        <div class='alert alert-warning text-center'>

            No Products Found

        </div>

    </div>

    ";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="query.css?v=<?php echo time(); ?>">
    <link rel="stylesheet"
        href="https://unpkg.com/aos@2.3.4/dist/aos.css">
</head>

<body>
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

            <div class="container-fluid p-0 align-items-center d-flex">

                <!-- Logo -->
                <a class=" " href="index.php">
                    <img style="width: 6.25em;" src="assets/img/logo.png" alt="logo">

                </a>

                <!-- Mobile Toggle -->


                <!-- Navbar Content -->


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
                        class=" position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent"
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
                        <span
                            id="cart-count"
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">

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



    <div class="det mx-2 ">
        <!-- Bootstrap Carousel -->
        <div id="carouselExample" class="carousel slide simg" data-aos="zoom-in" data-bs-ride="carousel">

            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExample"
                    data-bs-slide-to="0" class="active"></button>

                <button type="button" data-bs-target="#carouselExample"
                    data-bs-slide-to="1"></button>

                <button type="button" data-bs-target="#carouselExample"
                    data-bs-slide-to="2"></button>
            </div>

            <!-- Images -->
            <div id="carouselExample"
                class="carousel slide"
                data-bs-ride="carousel">

                <!-- Indicators -->
                <div class="carousel-indicators">

                    <?php

                    $active = true;
                    $count = 0;

                    $indicatorQuery =
                        mysqli_query(
                            $conn,
                            "SELECT * FROM banners"
                        );

                    while ($row =
                        mysqli_fetch_assoc($indicatorQuery)
                    ) {

                    ?>

                        <button type="button"
                            data-bs-target="#carouselExample"
                            data-bs-slide-to="<?php echo $count; ?>"

                            class="<?php
                                    if ($active) {
                                        echo 'active';
                                    }
                                    ?>">

                        </button>

                    <?php

                        $active = false;
                        $count++;
                    } ?>

                </div>

                <!-- Carousel Images -->
                <div class="carousel-inner carousel slide slid" data-bs-ride="carousel" data-bs-interval="3000">

                    <?php

                    $active = true;

                    while ($row =
                        mysqli_fetch_assoc($result)
                    ) {

                    ?>

                        <div class="carousel-item
            <?php
                        if ($active) {
                            echo 'active';
                        }
            ?>">

                            <img src="uploads/<?php
                                                echo $row['image']; ?>"

                                class="d-block w-100"

                                height="500px"



                                alt="Banner">

                        </div>

                    <?php

                        $active = false;
                    } ?>

                </div>

                <!-- Previous Button -->
                <button class="carousel-control-prev"
                    type="button"
                    data-bs-target="#carouselExample"
                    data-bs-slide="prev">

                    <span class="carousel-control-prev-icon"></span>

                </button>

                <!-- Next Button -->
                <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#carouselExample"
                    data-bs-slide="next">

                    <span class="carousel-control-next-icon"></span>

                </button>

            </div>

            <!-- Previous Button -->
            <button class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExample"
                data-bs-slide="prev">

                <span class="carousel-control-prev-icon"></span>
            </button>

            <!-- Next Button -->
            <button class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExample"
                data-bs-slide="next">

                <span class="carousel-control-next-icon"></span>
            </button>

        </div>
    </div>
    <div class="container " data-aos="fade-up">
        <h2 class="fw-bold mt-5 mb-4 text-center">Top Selling Products</h2>

        <div class="pro">
            <div class="row">


                <?php

                $query = mysqli_query(

                    $conn,

                    "SELECT

    products.*,

    COUNT(orders.product_id) AS total_sales

    FROM products

    LEFT JOIN orders

    ON products.id = orders.product_id

    WHERE products.status='approved'

    GROUP BY products.id

    ORDER BY total_sales DESC

    LIMIT 4"

                );

                while ($row = mysqli_fetch_assoc($query)) {

                ?>

                    <div class="col-md-3">

                        <div class="card shadow-sm mt-4 border-0 h-100">

                            <!-- Product Image -->

                            <img src="uploads/<?php echo $row['product_image']; ?>"

                                class="card-img-top"

                                height="250"

                                style="object-fit:cover;">

                            <div class="card-body">

                                <!-- Product Name -->

                                <h5 class="card-title">

                                    <?php echo $row['product_name']; ?>

                                </h5>

                                <!-- Product Price -->

                                <h6 class="text-success fw-bold">

                                    ₹<?php echo $row['product_price']; ?>

                                </h6>

                                <!-- Total Sales -->

                                <small class="text-muted">

                                    Sold:
                                    <?php echo $row['total_sales']; ?>

                                    times

                                </small>

                                <div class="d-flex justify-content-between mt-3">

                                    <form action="add-cart.php" method="GET">

                                        <input
                                            type="hidden"
                                            name="id"
                                            value="<?php echo $row['id']; ?>">

                                        <button
                                            type="button"
                                            class="btn btn-dark add-cart-btn"
                                            data-id="<?php echo $row['id']; ?>">

                                            Add To Cart

                                        </button>

                                    </form>

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




            <div class="tabb mt-5" data-aos="fade-up">
                <!-- Heading -->

                <!-- Category Tabs -->
                <ul class="nav nav-pills mb-4 justify-content-center flex-wrap">

                    <?php

                    $first = true;

                    $cat_query = mysqli_query(
                        $conn,
                        "SELECT * FROM categories"
                    );

                    while ($cat = mysqli_fetch_assoc($cat_query)) {

                    ?>

                        <li class="nav-item m-1">

                            <button class="nav-link <?php if ($first) echo 'active'; ?>"
                                data-bs-toggle="tab"
                                data-bs-target="#cat<?php echo $cat['id']; ?>">

                                <?php echo $cat['category_name']; ?>

                            </button>

                        </li>

                    <?php

                        $first = false;
                    }

                    ?>

                </ul>

                <!-- Tab Content -->
                <div class="tab-content">

                    <?php

                    $first = true;

                    $cat_query = mysqli_query(
                        $conn,
                        "SELECT * FROM categories"
                    );

                    while ($cat = mysqli_fetch_assoc($cat_query)) {

                    ?>

                        <div class="tab-pane fade <?php if ($first) echo 'show active'; ?>"
                            id="cat<?php echo $cat['id']; ?>">

                            <div class="row g-4">

                                <?php

                                $products = mysqli_query(
                                    $conn,

                                    "SELECT * FROM products
                                  WHERE category_id='" . $cat['id'] . "'
                                   AND status='approved'
                                  LIMIT 5"
                                );

                                while ($row = mysqli_fetch_assoc($products)) {

                                ?>

                                    <div class="col-lg-3 col-md-6">

                                        <div class="card shadow-sm border-0 h-100">

                                            <img src="uploads/<?php echo $row['product_image']; ?>"
                                                class="card-img-top"
                                                height="220"
                                                style="object-fit:cover;">

                                            <div class="card-body">

                                                <h5>
                                                    <?php echo $row['product_name']; ?>
                                                </h5>

                                                <p class="fw-bold text-success">
                                                    ₹<?php echo $row['product_price']; ?>
                                                </p>

                                                <div class="d-flex justify-content-between">

                                                    <form action="add-cart.php" method="GET">

                                                        <input
                                                            type="hidden"
                                                            name="id"
                                                            value="<?php echo $row['id']; ?>">

                                                        <button
                                                            type="button"
                                                            class="btn btn-dark add-cart-btn"
                                                            data-id="<?php echo $row['id']; ?>">

                                                            Add To Cart

                                                        </button>

                                                    </form>

                                                    <a href="add-wishlist.php?id=<?php echo $row['id']; ?>"
                                                        class="btn btn-outline-danger">

                                                        <i class="bi bi-heart"></i>

                                                    </a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                <?php } ?>

                            </div>

                        </div>

                    <?php

                        $first = false;
                    }

                    ?>

                </div>

                <!-- Bottom Button -->
                <div class="text-center mt-5">

                    <a href="allproducts.php"
                        class="btn btn-outline-dark px-5">
                        View More Products
                    </a>

                </div>

            </div>
        </div>
        <!-- Offer Section -->
        <section class="container-fluid py-5 mt-3" data-aos="fade-up" style="background:#0b2a4a;">

            <div class="container">

                <div class="row align-items-center rounded-4 p-4"
                    style="background:#203a5c; border:1px solid #3f5674;">

                    <!-- Left Content -->
                    <div class="col-lg-7 mb-4 mb-lg-0">

                        <!-- Badge -->
                        <span class="badge rounded-pill px-3 py-2 mb-3"
                            style="background:#124d63; color:#00e0c6; font-size:15px;">

                            ⚡ Flash Sale – Up to 60% Off

                        </span>

                        <!-- Heading -->
                        <h1 class="fw-bold text-white mb-3">
                            Exclusive Offers Just for You
                        </h1>

                        <!-- Description -->
                        <p class="text-light fs-5">

                            Don’t miss these limited-time deals.
                            Grab your favorite products at amazing prices.

                        </p>

                    </div>

                    <!-- Buttons -->
                    <div class="col-lg-5 text-center">

                        <a href="#"
                            class="btn btn-lg px-5 py-3 me-3 mb-3 text-white fw-bold"
                            style="background:#00b89c; border:none;">

                            Claim Offer →

                        </a>

                        <a href="allproducts.php"
                            class="btn btn-outline-light btn-lg px-5 py-3 mb-3 fw-bold">

                            View All Items

                        </a>

                    </div>

                </div>

            </div>

        </section>





        <div class="tes" data-aos="fade-up">



            <!-- Feedback Section -->
            <section class="container my-5">

                <!-- Heading -->
                <div class="text-center mb-5">

                    <h2 class="fw-bold">
                        Customer Feedback
                    </h2>

                    <p class="text-muted">
                        What our buyers say about us
                    </p>

                </div>

                <div class="row g-4">

                    <?php

                    $query = mysqli_query(

                        $conn,

                        "SELECT *

                     FROM feedback

                     ORDER BY id DESC

                     LIMIT 6"

                    );

                    while ($row = mysqli_fetch_assoc($query)) {

                    ?>

                        <div class="col-md-4">

                            <div class="card shadow border-0 h-100 p-3">

                                <div class="d-flex align-items-center mb-3">

                                    <img src="uploads/<?php echo $row['image']; ?>"

                                        class="rounded-circle"

                                        width="60"

                                        height="60"

                                        style="object-fit:cover;">

                                    <div class="ms-3">

                                        <h5 class="mb-0">

                                            <?php echo $row['customer_name']; ?>

                                        </h5>

                                        <small class="text-muted">

                                            Verified Buyer

                                        </small>

                                    </div>

                                </div>

                                <div class="text-warning mb-3">

                                    <?php

                                    for ($i = 1; $i <= 5; $i++) {

                                        echo ($i <= $row['rating'])
                                            ? '★'
                                            : '☆';
                                    }

                                    ?>

                                </div>

                                <p class="text-muted">

                                    <?php echo $row['message']; ?>

                                </p>

                            </div>

                        </div>

                    <?php } ?>

                </div>

            </section>
        </div>







        <!-- FAQ Section -->
        <section class="container my-5" data-aos="fade-up">

            <!-- Heading -->
            <div class="text-center mb-5">

                <h2 class="fw-bold">
                    Frequently Asked Questions
                </h2>

                <p class="text-muted">
                    Find answers to common questions
                </p>

            </div>

            <div class="accordion" id="faqAccordion">

                <!-- FAQ 1 -->
                <div class="accordion-item mb-3 shadow-sm border-0">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed fw-bold"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq1">

                            How can I place an order?

                        </button>

                    </h2>

                    <div id="faq1"
                        class="accordion-collapse collapse"
                        data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            Browse products, add them to cart,
                            and proceed to checkout.

                        </div>

                    </div>

                </div>

                <!-- FAQ 2 -->
                <div class="accordion-item mb-3 shadow-sm border-0">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed fw-bold"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq2">

                            What payment methods are available?

                        </button>

                    </h2>

                    <div id="faq2"
                        class="accordion-collapse collapse"
                        data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            We support UPI, Debit Card,
                            Credit Card, and Cash on Delivery.

                        </div>

                    </div>

                </div>

                <!-- FAQ 3 -->
                <div class="accordion-item mb-3 shadow-sm border-0">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed fw-bold"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#faq3">

                            Can I return products?

                        </button>

                    </h2>

                    <div id="faq3"
                        class="accordion-collapse collapse"
                        data-bs-parent="#faqAccordion">

                        <div class="accordion-body">

                            Yes, products can be returned
                            within 7 days after delivery.

                        </div>

                    </div>

                </div>

            </div>

        </section>
        <!-- Login Register Buttons -->


    </div>
    <!-- Footer Section -->
    <footer class="bg-dark text-light pt-5 mt-5 pb-3" data-aos="fade-up">

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


    <div class="modal fade" id="cartSuccessModal" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-body text-center p-4">

                    <i class="bi bi-check-circle-fill text-success"
                        style="font-size:60px;"></i>

                    <h4 class="mt-3">
                        Product Added Successfully
                    </h4>

                    <button
                        class="btn btn-dark mt-3"
                        data-bs-dismiss="modal">

                        OK

                    </button>

                </div>

            </div>

        </div>

    </div>


   <script>

document.querySelectorAll('.add-cart-btn').forEach(btn => {

    btn.addEventListener('click', function(){

        let product_id = this.dataset.id;

        fetch('add-cart.php?id=' + product_id)

        .then(response => response.text())

        .then(count => {

            document.getElementById('cart-count').innerText = count;

            let modal = new bootstrap.Modal(

                document.getElementById('cartSuccessModal')

            );

            modal.show();

        });

    });

});

</script>




    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>