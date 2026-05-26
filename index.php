<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
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



    <nav class="navbar mt-0 p-0 navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="" id="navbarNav">
                    <ul class="navbar-nav d-flex justify-content-between">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Product Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Checkout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>



    <div class="det mx-2">
        <!-- Bootstrap Carousel -->
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">

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
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="assets\img\post1.png"
                        class="d-block w-100"
                        height="500px"
                        alt="Banner 1">
                </div>

                <div class="carousel-item">
                    <img src="assets\img\post2.png"
                        class="d-block w-100"
                        height="500px"
                        alt="Banner 2">
                </div>

                <div class="carousel-item">
                    <img src="assets\img\post3.png"
                        class="d-block w-100"
                        height="500px"
                        alt="Banner 3">
                </div>

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
    <div class="container">

        <div class="pro">
            <div class="card shadow-sm mt-4 border-0" style="width: 18rem;">

                <!-- Product Image -->
                <img src="https://picsum.photos/id/239/100/200"
                    class="card-img-top"
                    alt="Product Image"
                    height="250px"
                    style="object-fit: cover;">

                <div class="card-body">

                    <!-- Product Name -->
                    <h5 class="card-title">
                        Wireless Headphone
                    </h5>

                    <!-- Product Price -->
                    <h6 class="text-success fw-bold">
                        ₹1,499
                    </h6>

                    <!-- Product Rating -->
                    <div class="mb-3 text-warning">
                        ★★★★☆
                        <small class="text-dark">(4.5)</small>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">

                        <a href="#"
                            class="btn btn-dark">
                            Add to Cart
                        </a>

                        <a href="#"
                            class="btn align-items-center justify-content-center btn-outline-danger">
                            <ion-icon class=" fs-4 mt-2" name="heart-outline"></ion-icon>
                        </a>

                    </div>

                </div>
            </div>
            <div class="tabb">
                <!-- Heading -->

                <!-- Category Tabs -->
                <ul class="nav nav-pills mb-4 justify-content-center flex-wrap">

                    <li class="nav-item m-1">
                        <button class="nav-link active"
                            data-bs-toggle="tab"
                            data-bs-target="#electronics">
                            Electronics
                        </button>
                    </li>

                    <li class="nav-item m-1">
                        <button class="nav-link"
                            data-bs-toggle="tab"
                            data-bs-target="#fashion">
                            Fashion
                        </button>
                    </li>

                    <li class="nav-item m-1">
                        <button class="nav-link"
                            data-bs-toggle="tab"
                            data-bs-target="#shoes">
                            Shoes
                        </button>
                    </li>

                    <li class="nav-item m-1">
                        <button class="nav-link"
                            data-bs-toggle="tab"
                            data-bs-target="#beauty">
                            Beauty
                        </button>
                    </li>

                    <li class="nav-item m-1">
                        <button class="nav-link"
                            data-bs-toggle="tab"
                            data-bs-target="#furniture">
                            Furniture
                        </button>
                    </li>

                </ul>

                <!-- Tab Content -->
                <div class="tab-content">

                    <!-- Electronics -->
                    <div class="tab-pane fade show active" id="electronics">

                        <div class="row g-4">

                            <!-- Product -->
                            <div class="col-md-3">

                                <div class="card shadow-sm border-0 h-100">

                                    <img src="images/laptop.jpg"
                                        class="card-img-top"
                                        height="220px"
                                        style="object-fit: cover;">

                                    <div class="card-body">

                                        <h5>Laptop</h5>

                                        <p class="fw-bold text-success">
                                            ₹45,000
                                        </p>

                                        <div class="text-warning mb-3">
                                            ★★★★☆
                                        </div>
                                        <div class="procw d-flex justify-content-between">
                                            <button class="btn btn-dark">
                                                Add to Cart
                                            </button>
                                            <a href="#"
                                                class="btn align-items-center justify-content-center btn-outline-danger">
                                                <ion-icon class=" fs-4 mt-2" name="heart-outline"></ion-icon>
                                            </a>
                                        </div>


                                    </div>

                                </div>

                            </div>

                            <!-- Product -->
                            <div class="col-md-3">

                                <div class="card shadow-sm border-0 h-100">

                                    <img src="images/headphone.jpg"
                                        class="card-img-top"
                                        height="220px"
                                        style="object-fit: cover;">

                                    <div class="card-body">

                                        <h5>Headphone</h5>

                                        <p class="fw-bold text-success">
                                            ₹2,999
                                        </p>

                                        <div class="text-warning mb-3">
                                            ★★★★★
                                        </div>

                                        <div class="procw d-flex justify-content-between">
                                            <button class="btn btn-dark">
                                                Add to Cart
                                            </button>
                                            <a href="#"
                                                class="btn align-items-center justify-content-center btn-outline-danger">
                                                <ion-icon class=" fs-4 mt-2" name="heart-outline"></ion-icon>
                                            </a>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Fashion -->
                    <div class="tab-pane fade" id="fashion">

                        <div class="row g-4">

                            <div class="col-md-3">

                                <div class="card shadow-sm border-0 h-100">

                                    <img src="images/shirt.jpg"
                                        class="card-img-top"
                                        height="220px"
                                        style="object-fit: cover;">

                                    <div class="card-body">

                                        <h5>T-Shirt</h5>

                                        <p class="fw-bold text-success">
                                            ₹799
                                        </p>

                                        <div class="text-warning mb-3">
                                            ★★★★☆
                                        </div>

                                        <button class="btn btn-dark w-100">
                                            Add to Cart
                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Shoes -->
                    <div class="tab-pane fade" id="shoes">

                        <div class="row g-4">

                            <div class="col-md-3">

                                <div class="card shadow-sm border-0 h-100">

                                    <img src="images/shoes.jpg"
                                        class="card-img-top"
                                        height="220px"
                                        style="object-fit: cover;">

                                    <div class="card-body">

                                        <h5>Sports Shoes</h5>

                                        <p class="fw-bold text-success">
                                            ₹2,499
                                        </p>

                                        <div class="text-warning mb-3">
                                            ★★★★★
                                        </div>

                                        <button class="btn btn-dark w-100">
                                            Add to Cart
                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Beauty -->
                    <div class="tab-pane fade" id="beauty">

                        <div class="row g-4">

                            <div class="col-md-3">

                                <div class="card shadow-sm border-0 h-100">

                                    <img src="images/perfume.jpg"
                                        class="card-img-top"
                                        height="220px"
                                        style="object-fit: cover;">

                                    <div class="card-body">

                                        <h5>Perfume</h5>

                                        <p class="fw-bold text-success">
                                            ₹1,299
                                        </p>

                                        <div class="text-warning mb-3">
                                            ★★★★☆
                                        </div>

                                        <button class="btn btn-dark w-100">
                                            Add to Cart
                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Furniture -->
                    <div class="tab-pane fade" id="furniture">

                        <div class="row g-4">

                            <div class="col-md-3">

                                <div class="card shadow-sm border-0 h-100">

                                    <img src="images/chair.jpg"
                                        class="card-img-top"
                                        height="220px"
                                        style="object-fit: cover;">

                                    <div class="card-body">

                                        <h5>Chair</h5>

                                        <p class="fw-bold text-success">
                                            ₹3,999
                                        </p>

                                        <div class="text-warning mb-3">
                                            ★★★★★
                                        </div>

                                        <button class="btn btn-dark w-100">
                                            Add to Cart
                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Bottom Button -->
                <div class="text-center mt-5">

                    <a href="products.php"
                        class="btn btn-outline-dark px-5">
                        View More Products
                    </a>

                </div>

            </div>
        </div>
        <!-- Offer Section -->
        <section class="container-fluid py-5 mt-3" style="background:#0b2a4a;">

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

                        <a href="#"
                            class="btn btn-outline-light btn-lg px-5 py-3 mb-3 fw-bold">

                            View All Items

                        </a>

                    </div>

                </div>

            </div>

        </section>





        <div class="tes">



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

                    <!-- Feedback Card 1 -->
                    <div class="col-md-4">

                        <div class="card shadow-sm border-0 h-100 p-3">

                            <div class="d-flex align-items-center mb-3">

                                <img src="images/user1.jpg"
                                    class="rounded-circle"
                                    width="60"
                                    height="60"
                                    style="object-fit: cover;">

                                <div class="ms-3">

                                    <h5 class="mb-0">
                                        Rahul Sharma
                                    </h5>

                                    <small class="text-muted">
                                        Verified Buyer
                                    </small>

                                </div>

                            </div>

                            <!-- Rating -->
                            <div class="text-warning mb-3">
                                ★★★★★
                            </div>

                            <!-- Feedback -->
                            <p class="text-muted">

                                Amazing shopping experience.
                                Product quality is excellent and
                                delivery was very fast.

                            </p>

                        </div>

                    </div>

                    <!-- Feedback Card 2 -->
                    <div class="col-md-4">

                        <div class="card shadow-sm border-0 h-100 p-3">

                            <div class="d-flex align-items-center mb-3">

                                <img src="images/user2.jpg"
                                    class="rounded-circle"
                                    width="60"
                                    height="60"
                                    style="object-fit: cover;">

                                <div class="ms-3">

                                    <h5 class="mb-0">
                                        Priya Das
                                    </h5>

                                    <small class="text-muted">
                                        Verified Buyer
                                    </small>

                                </div>

                            </div>

                            <!-- Rating -->
                            <div class="text-warning mb-3">
                                ★★★★☆
                            </div>

                            <!-- Feedback -->
                            <p class="text-muted">

                                The website is very easy to use.
                                I loved the product collection and offers.

                            </p>

                        </div>

                    </div>

                    <!-- Feedback Card 3 -->
                    <div class="col-md-4">

                        <div class="card shadow-sm border-0 h-100 p-3">

                            <div class="d-flex align-items-center mb-3">

                                <img src="images/user3.jpg"
                                    class="rounded-circle"
                                    width="60"
                                    height="60"
                                    style="object-fit: cover;">

                                <div class="ms-3">

                                    <h5 class="mb-0">
                                        Aman Gupta
                                    </h5>

                                    <small class="text-muted">
                                        Verified Buyer
                                    </small>

                                </div>

                            </div>

                            <!-- Rating -->
                            <div class="text-warning mb-3">
                                ★★★★★
                            </div>

                            <!-- Feedback -->
                            <p class="text-muted">

                                Fast delivery and great customer support.
                                Highly recommended for online shopping.

                            </p>

                        </div>

                    </div>

                </div>

            </section>
        </div>







        <!-- FAQ Section -->
        <section class="container my-5">

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
        <div class="d-flex justify-content-center align-items-center gap-2">

            <!-- Login Button -->
            <a href="login.html"
                class="btn btn-dark">

                Login

            </a>

            <!-- Register Button -->
            <a href="register.html"
                class="btn btn-outline-dark">

                Register

            </a>

        </div>

    </div>
    <!-- Footer Section -->
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




    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>