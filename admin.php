<?php

include 'admin-session.php';

include 'connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Main Admin Panel</title>

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
                        Admin Panel
                    </h3>

                </div>

                <!-- Menu -->
                <ul class="nav flex-column p-3">

                    <li class="nav-item mb-2">

                        <a href="admin.php"
                            class="nav-link text-white active bg-primary">

                            <i class="bi bi-speedometer2"></i>
                            Dashboard

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="admin-products.php"
                            class="nav-link text-white">

                            <i class="bi bi-box-seam"></i>
                            Products

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="add-category.php"
                            class="nav-link text-white">

                            <i class="bi bi-grid"></i>
                            Categories

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="admin-user.php"
                            class="nav-link text-white">

                            <i class="bi bi-people"></i>
                            Users

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="admin-sellers.php"
                            class="nav-link text-white">

                            <i class="bi bi-shop"></i>
                            Sellers

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="delivery.php"
                            class="nav-link text-white">

                            <i class="bi bi-truck"></i>
                            Delivery Agents

                        </a>

                    </li>
                    <li class="nav-item mb-2">

                        <a href="addbanner.php"
                            class="nav-link text-white">

                            <i class="bi bi-flag"></i>
                            Banner
                        </a>

                    </li>
                    <li class="nav-item mb-2">

                        <a href="admin-feedback.php"
                            class="nav-link text-white">

                            <i class="bi bi-chat-left-text"></i>
                            feedback

                        </a>
                    </li>




                    <li class="nav-item mb-2">

                        <a href="orders.php"
                            class="nav-link text-white">

                            <i class="bi bi-bag-check"></i>
                            Orders

                        </a>

                    </li>

                    <li class="nav-item mt-4">

                        <a href="admin-logout.php"
                            class="btn btn-danger w-100">

                            Logout

                        </a>

                    </li>

                </ul>

            </div>

            <!-- Main Content -->
            <div class="col-lg-10">

                <!-- Top Navbar -->
                <nav class="navbar navbar-light bg-white shadow-sm px-4 py-3">

                    <h4 class="fw-bold mb-0">
                        Dashboard
                    </h4>

                    <div class="d-flex align-items-center">

                        <span class="me-3 fw-semibold">

                            Welcome,

                            <?php echo $_SESSION['admin_name']; ?>

                        </span>

                        <?php if (!empty($_SESSION['admin_image'])) { ?>

                            <img src="uploads/<?php echo $_SESSION['admin_image']; ?>"

                                class="rounded-circle"

                                width="45"

                                height="45"

                                style="object-fit:cover;">

                        <?php } else { ?>

                            <img src="images/admin.jpg"

                                class="rounded-circle"

                                width="45"

                                height="45"

                                style="object-fit:cover;">

                        <?php } ?>

                    </div>
                </nav>

                <!-- Dashboard Cards -->
                <div class="container py-4">
                    <?php

                    /* Total Products */

                    $product_count = mysqli_fetch_assoc(

                        mysqli_query(

                            $conn,

                            "SELECT COUNT(*) AS total

        FROM products"

                        )

                    );

                    /* Total Orders */

                    $order_count = mysqli_fetch_assoc(

                        mysqli_query(

                            $conn,

                            "SELECT COUNT(*) AS total

        FROM orders"

                        )

                    );

                    /* Total Users (Buyers + Sellers + Delivery Agents) */

                    $user_count = mysqli_fetch_assoc(

                        mysqli_query(

                            $conn,

                            "SELECT COUNT(*) AS total

        FROM users"

                        )

                    );

                    /* Total Revenue */

                    $revenue = mysqli_fetch_assoc(

                        mysqli_query(

                            $conn,

                            "SELECT

        SUM(products.product_price * orders.quantity)

        AS total_revenue

        FROM orders

        INNER JOIN products

        ON orders.product_id = products.id

        WHERE orders.delivery_status='Delivered'"

                        )

                    );

                    $total_revenue = $revenue['total_revenue'] ?? 0;

                    ?>

                    <div class="row g-4">

                        <!-- Total Products -->
                        <div class="col-lg-3 col-md-6">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">

                                        <div>

                                            <h6 class="text-muted">
                                                Products
                                            </h6>

                                            <h2 class="fw-bold">
                                                <?php echo $product_count['total']; ?>
                                            </h2>

                                        </div>

                                        <i class="bi bi-box-seam fs-1 text-primary"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Orders -->
                        <div class="col-lg-3 col-md-6">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">

                                        <div>

                                            <h6 class="text-muted">
                                                Orders
                                            </h6>

                                            <h2 class="fw-bold">
                                                <?php echo $order_count['total']; ?>
                                            </h2>

                                        </div>

                                        <i class="bi bi-bag-check fs-1 text-success"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Users -->
                        <div class="col-lg-3 col-md-6">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">

                                        <div>

                                            <h6 class="text-muted">
                                                Users
                                            </h6>

                                            <h2 class="fw-bold">
                                                <?php echo $user_count['total']; ?>
                                            </h2>

                                        </div>

                                        <i class="bi bi-people fs-1 text-warning"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Revenue -->
                        <div class="col-lg-3 col-md-6">

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

                    <!-- Recent Orders -->
                    <div class="card border-0 shadow-sm mt-5">

                        <div class="card-body">

                            <h4 class="fw-bold mb-4">
                                Recent Orders
                            </h4>

                            <div class="table-responsive">

                                <table class="table align-middle table-bordered">

                                    <thead class="table-dark">

                                        <tr>

                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Product</th>
                                            <th>Amount</th>
                                            <th>Status</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        $query = mysqli_query(

                                            $conn,

                                            "SELECT

                        orders.*,

                        products.product_name,

                        products.product_price

                        FROM orders

                        INNER JOIN products

                        ON orders.product_id = products.id

                        ORDER BY orders.id DESC

                        LIMIT 10"

                                        );

                                        if (mysqli_num_rows($query) > 0) {

                                            while ($row = mysqli_fetch_assoc($query)) {

                                        ?>

                                                <tr>

                                                    <td>

                                                        #<?php echo $row['id']; ?>

                                                    </td>

                                                    <td>

                                                        <?php echo $row['full_name']; ?>

                                                    </td>

                                                    <td>

                                                        <?php echo $row['product_name']; ?>

                                                    </td>

                                                    <td>

                                                        ₹<?php echo number_format(

                                                                $row['product_price'] *

                                                                    $row['quantity']

                                                            ); ?>

                                                    </td>

                                                    <td>

                                                        <?php

                                                        if ($row['delivery_status'] == 'Delivered') {

                                                            echo "<span class='badge bg-success'>
                                Delivered
                                </span>";
                                                        } elseif ($row['delivery_status'] == 'Cancelled') {

                                                            echo "<span class='badge bg-danger'>
                                Cancelled
                                </span>";
                                                        } elseif ($row['delivery_status'] == 'Out For Delivery') {

                                                            echo "<span class='badge bg-primary'>
                                Out For Delivery
                                </span>";
                                                        } elseif ($row['seller_status'] == 'Approved') {

                                                            echo "<span class='badge bg-info'>
                                Shipped
                                </span>";
                                                        } else {

                                                            echo "<span class='badge bg-warning text-dark'>
                                Pending
                                </span>";
                                                        }

                                                        ?>

                                                    </td>

                                                </tr>

                                            <?php

                                            }
                                        } else {

                                            ?>

                                            <tr>

                                                <td colspan="5"

                                                    class="text-center">

                                                    No Orders Found

                                                </td>

                                            </tr>

                                        <?php } ?>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>