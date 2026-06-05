<?php

session_start();

include 'connect.php';

if (!isset($_SESSION['user_id'])) {

    header("Location:user-login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

?>
<?php



include 'connect.php';

$user_id = $_SESSION['user_id'];

/* Update Profile */

if (isset($_POST['save_profile'])) {

    $name = $_POST['name'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    if (!empty($password)) {

        mysqli_query(

            $conn,

            "UPDATE users

            SET

            name='$name',
            email='$email',
            password='$password'

            WHERE id='$user_id'"

        );
    } else {

        mysqli_query(

            $conn,

            "UPDATE users

            SET

            name='$name',
            email='$email'

            WHERE id='$user_id'"

        );
    }

    header("Location: profile.php");

    exit();
}

/* Get User Data */

$user_query = mysqli_query(

    $conn,

    "SELECT *

    FROM users

    WHERE id='$user_id'"

);

$user = mysqli_fetch_assoc($user_query);

?>
<?php

$user_id = $_SESSION['user_id'];

$user_query = mysqli_query(

    $conn,

    "SELECT *

    FROM users

    WHERE id='$user_id'"

);

$user = mysqli_fetch_assoc($user_query);

?>
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



    <!-- Profile Section -->
    <section class="container my-5">

        <div class="row g-4">

            <!-- Left Profile -->
            <div class="col-lg-4">

                <div class="card border-0 shadow-sm">

                    <div class="card-body text-center">

                        <!-- Profile Image -->

                        <?php

                        if (!empty($user['image'])) {

                        ?>

                            <img src="uploads/<?php echo $user['image']; ?>"

                                class="rounded-circle mb-3"

                                width="120"

                                height="120"

                                style="object-fit:cover;">

                        <?php

                        } else {

                        ?>

                            <img src="images/user.jpg"

                                class="rounded-circle mb-3"

                                width="120"

                                height="120"

                                style="object-fit:cover;">

                        <?php } ?>

                        <!-- User Name -->

                        <h3 class="fw-bold">

                            <?php echo $user['name']; ?>

                        </h3>

                        <!-- Email -->

                        <p class="text-muted">

                            <?php echo $user['email']; ?>

                        </p>

                        <!-- Buttons -->

                        <div class="d-grid gap-2 mt-4">

                            <a href="edit-profile.php"

                                class="btn btn-dark">

                                <i class="bi bi-pencil-square"></i>

                                Edit Profile

                            </a>

                            <a href="logout.php"

                                class="btn btn-outline-danger"

                                onclick="return confirm('Are you sure you want to logout?')">

                                <i class="bi bi-box-arrow-right"></i>

                                Logout

                            </a>

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

                                <div class="card border-0 shadow-sm mb-4">

                                    <div class="row g-0 align-items-center">

                                        <!-- Product Image -->

                                        <div class="col-md-3">

                                            <img src="uploads/<?php echo $row['product_image']; ?>"

                                                class="img-fluid rounded-start"

                                                height="200"

                                                style="object-fit:cover;">

                                        </div>

                                        <!-- Product Details -->

                                        <div class="col-md-6">

                                            <div class="card-body">

                                                <h5 class="card-title">

                                                    <?php echo $row['product_name']; ?>

                                                </h5>

                                                <p class="text-muted">

                                                    Ordered on

                                                    <?php echo date("d M Y", strtotime($row['order_date'])); ?>

                                                </p>

                                                <p>

                                                    Quantity :

                                                    <?php echo $row['quantity']; ?>

                                                </p>

                                                <h5 class="text-success">

                                                    ₹<?php echo $row['product_price']; ?>

                                                </h5>

                                            </div>

                                        </div>

                                        <!-- Status & Action -->

                                        <div class="col-md-3 text-center">

                                            <?php

                                            if ($row['delivery_status'] == "Delivered") {

                                                echo "<span class='badge bg-success fs-6'>
        Delivered
        </span>";

                                                echo "<br><br>";

                                            ?>

                                                <a href="add-cart.php?id=<?php echo $row['product_id']; ?>"

                                                    class="btn btn-dark">

                                                    Buy Again

                                                </a>

                                            <?php

                                            } elseif ($row['delivery_status'] == "Cancelled") {

                                                echo "<span class='badge bg-danger fs-6'>
        Cancelled
        </span>";

                                                echo "<br><small class='text-danger fw-bold mt-2 d-block'>";

                                                echo $row['cancel_reason'];

                                                echo "</small>";

                                                if (!empty($row['cancel_note'])) {

                                                    echo "<small class='text-muted d-block'>";

                                                    echo $row['cancel_note'];

                                                    echo "</small>";
                                                }
                                            } elseif ($row['delivery_status'] == "Out For Delivery") {

                                                echo "<span class='badge bg-primary fs-6'>
        Out For Delivery
        </span>";
                                            } elseif ($row['seller_status'] == "Approved") {

                                                echo "<span class='badge bg-info fs-6'>
        Shipped
        </span>";
                                            } else {

                                                echo "<span class='badge bg-secondary fs-6'>
        Pending
        </span>";
                                            }

                                            ?>

                                        </div>

                                    </div>

                                </div>

                            <?php

                            }
                        } else {

                            ?>

                            <div class="alert alert-info text-center">

                                No Orders Found

                            </div>

                        <?php } ?>

                    </div>

                    <!-- Wishlist -->
                    <div class="tab-pane fade"
                        id="wishlist">

                        <?php

                        $wishlist_query = mysqli_query(

                            $conn,

                            "SELECT

    wishlist.id AS wishlist_id,

    products.*

    FROM wishlist

    INNER JOIN products

    ON wishlist.product_id = products.id

    WHERE wishlist.user_id='$user_id'

    ORDER BY wishlist.id DESC"

                        );

                        if (mysqli_num_rows($wishlist_query) > 0) {

                        ?>

                            <div class="row">

                                <?php

                                while ($row = mysqli_fetch_assoc($wishlist_query)) {

                                ?>

                                    <div class="col-md-4 mb-4">

                                        <div class="card border-0 shadow-sm h-100">

                                            <!-- Product Image -->

                                            <img src="uploads/<?php echo $row['product_image']; ?>"

                                                class="card-img-top"

                                                height="250"

                                                style="object-fit:cover;">

                                            <div class="card-body text-center">

                                                <h5>

                                                    <?php echo $row['product_name']; ?>

                                                </h5>

                                                <h6 class="text-success">

                                                    ₹<?php echo $row['product_price']; ?>

                                                </h6>

                                                <div class="mt-3">

                                                    <!-- Add To Cart -->

                                                    <a href="add-cart.php?id=<?php echo $row['id']; ?>"

                                                        class="btn btn-dark">

                                                        <i class="bi bi-cart-plus"></i>

                                                        Add To Cart

                                                    </a>

                                                    <!-- Remove Wishlist -->

                                                    <a href="remove-wishlist.php?id=<?php echo $row['wishlist_id']; ?>"

                                                        class="btn btn-danger"

                                                        onclick="return confirm('Remove from wishlist?')">

                                                        <i class="bi bi-trash"></i>

                                                    </a>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                <?php } ?>

                            </div>

                        <?php } else { ?>

                            <div class="card border-0 shadow-sm">

                                <div class="card-body text-center py-5">

                                    <i class="bi bi-heart fs-1 text-danger"></i>

                                    <h4 class="mt-3">

                                        Wishlist Items

                                    </h4>

                                    <p class="text-muted">

                                        No products in your wishlist.

                                    </p>

                                </div>

                            </div>

                        <?php } ?>

                    </div>

                    <!-- Settings -->
                    <div class="tab-pane fade"
                        id="settings">

                        <div class="card border-0 shadow-sm">

                            <div class="card-body">

                                <h4 class="fw-bold mb-4">

                                    Account Settings

                                </h4>

                                <form method="POST">

                                    <div class="mb-3">

                                        <label class="form-label">

                                            Full Name

                                        </label>

                                        <input type="text"

                                            name="name"

                                            class="form-control"

                                            value="<?php echo $user['name']; ?>"

                                            required>

                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">

                                            Email Address

                                        </label>

                                        <input type="email"

                                            name="email"

                                            class="form-control"

                                            value="<?php echo $user['email']; ?>"

                                            required>

                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">

                                            New Password

                                        </label>

                                        <input type="password"

                                            name="password"

                                            class="form-control"

                                            placeholder="Leave blank to keep current password">

                                    </div>

                                    <button

                                        type="submit"

                                        name="save_profile"

                                        class="btn btn-dark">

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