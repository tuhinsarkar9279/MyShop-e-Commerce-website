<?php

include 'seller-session.php';

include 'connect.php';

?>


<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Seller Admin Panel</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

    <div class="container-fluid">

        <div class="row">

            <!-- Sidebar -->
            <div class="col-lg-2 bg-dark min-vh-100 p-0">

                <div class="p-4 text-center border-bottom border-secondary">

                    <h3 class="text-white fw-bold">
                        Seller Panel
                    </h3>

                </div>

                <!-- Menu -->
                <ul class="nav flex-column p-3">

                    <li class="nav-item mb-2">

                        <a href="sadmin.php"
                            class="nav-link text-white active bg-primary">

                            <i class="bi bi-speedometer2"></i>
                            Dashboard

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="add-products.php"
                            class="nav-link text-white">

                            <i class="bi bi-plus-circle"></i>
                            Add Product

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="seller-manage-product.php"
                            class="nav-link text-white">

                            <i class="bi bi-box-seam"></i>
                            Manage Products

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="seller-orders.php"
                            class="nav-link text-white">

                            <i class="bi bi-bag-check"></i>
                            Orders

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="seller-order-items.php"
                            class="nav-link text-white">

                            <i class="bi bi-graph-up-arrow"></i>
                            Sales Report

                        </a>

                    </li>

                    <a href="seller-logout.php"

                        class="btn btn-danger"

                        onclick="return confirm('Are you sure you want to logout?')">

                        <i class="bi bi-box-arrow-right"></i>

                        Logout

                    </a>

                </ul>

            </div>

            <!-- Main Content -->
            <div class="col-lg-10">

                <!-- Top Navbar -->
                <nav class="navbar navbar-light bg-white shadow-sm px-4 py-3">

                    <h4 class="fw-bold mb-0">
                        Seller Dashboard
                    </h4>

                    <div class="d-flex align-items-center">

                        <span class="me-3 fw-semibold">

                            Welcome,

                            <?php echo $seller_name; ?>

                        </span>

                        <?php if (!empty($seller_image)) { ?>

                            <img src="uploads/<?php echo $seller_image; ?>"

                                class="rounded-circle"

                                width="45"

                                height="45"

                                style="object-fit:cover;">

                        <?php } else { ?>

                            <img src="images/user.jpg"

                                class="rounded-circle"

                                width="45"

                                height="45"

                                style="object-fit:cover;">

                        <?php } ?>

                    </div>

                </nav>

                <!-- Dashboard Content -->
                <div class="container py-4">

                    <!-- Cards -->
                    <?php

                    $seller_id = $_SESSION['seller_id'];

                    /* Total Products */

                    $product_query = mysqli_query(

                        $conn,

                        "SELECT COUNT(*) AS total_products

    FROM products

    WHERE seller_id='$seller_id'"

                    );

                    $product_data = mysqli_fetch_assoc($product_query);

                    /* Total Orders */

                    $order_query = mysqli_query(

                        $conn,

                        "SELECT COUNT(*) AS total_orders

    FROM orders

    INNER JOIN products

    ON orders.product_id = products.id

    WHERE products.seller_id='$seller_id'"

                    );

                    $order_data = mysqli_fetch_assoc($order_query);

                    /* Revenue (Delivered Orders Only) */

                    $revenue_query = mysqli_query(

                        $conn,

                        "SELECT

    SUM(products.product_price * orders.quantity)

    AS total_revenue

    FROM orders

    INNER JOIN products

    ON orders.product_id = products.id

    WHERE products.seller_id='$seller_id'

    AND orders.delivery_status='Delivered'"

                    );

                    $revenue_data = mysqli_fetch_assoc($revenue_query);

                    $total_revenue = $revenue_data['total_revenue'] ?? 0;

                    ?>
                    <div class="row g-4">

                        <!-- Total Products -->
                        <div class="col-lg-4 col-md-6">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">

                                        <div>

                                            <h6 class="text-muted">
                                                Total Products
                                            </h6>

                                            <h2 class="fw-bold">
                                                <?php echo $product_data['total_products']; ?>
                                            </h2>

                                        </div>

                                        <i class="bi bi-box-seam fs-1 text-primary"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Total Orders -->
                        <div class="col-lg-4 col-md-6">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">

                                        <div>

                                            <h6 class="text-muted">
                                                Total Orders
                                            </h6>

                                            <h2 class="fw-bold">
                                                <?php echo $order_data['total_orders']; ?>
                                            </h2>

                                        </div>

                                        <i class="bi bi-bag-check fs-1 text-success"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Revenue -->
                        <div class="col-lg-4 col-md-6">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">

                                        <div>

                                            <h6 class="text-muted">
                                                Revenue
                                            </h6>

                                            <h2 class="fw-bold">
                                                ₹<?php echo number_format($total_revenue); ?>
                                            </h2>

                                        </div>

                                        <i class="bi bi-currency-rupee fs-1 text-danger"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Add Product Form -->


                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>