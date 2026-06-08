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
                            class="nav-link text-white active">

                            <i class="bi bi-speedometer2"></i>
                            Dashboard

                        </a>

                    </li>

                    <?php

                    $pending_product_query = mysqli_query(

                        $conn,

                        "SELECT COUNT(*) AS total

                         FROM products

                     WHERE status='Pending'"

                    );

                    $pending_product_data = mysqli_fetch_assoc(

                        $pending_product_query

                    );

                    $pending_product_count = $pending_product_data['total'];

                    ?>

                    <li class="nav-item mb-2">

                        <a href="admin-products.php"
                            class="nav-link text-white d-flex justify-content-between align-items-center">

                            <span>

                                <i class="bi bi-box-seam"></i>

                                Products

                            </span>

                            <?php if ($pending_product_count > 0) { ?>

                                <span class="badge bg-danger">

                                    <?php echo $pending_product_count; ?>

                                </span>

                            <?php } ?>

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
                            class="nav-link text-white bg-primary">

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



                    <!-- Recent Orders -->
                    <div class="card border-0 shadow-sm mt-5">

                        <div class="container mt-5">

                            <div class="card shadow">

                                <div class="card-body">

                                    <h3 class="mb-4">

                                        All Orders

                                    </h3>

                                    <div class="table-responsive">

                                        <table class="table table-bordered table-hover">

                                            <thead class="table-dark">

                                                <tr>

                                                    <th>ID</th>
                                                    <th>Image</th>
                                                    <th>Product</th>
                                                    <th>Customer</th>
                                                    <th>Phone</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th>Date</th>

                                                </tr>

                                            </thead>

                                            <tbody>

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

                                               ORDER BY orders.id DESC"

                                                );

                                                while ($row = mysqli_fetch_assoc($query)) {

                                                ?>

                                                    <tr>

                                                        <td>

                                                            <?php echo $row['id']; ?>

                                                        </td>

                                                        <td>

                                                            <img src="uploads/<?php echo $row['product_image']; ?>"

                                                                width="70">

                                                        </td>

                                                        <td>

                                                            <?php echo $row['product_name']; ?>

                                                        </td>

                                                        <td>

                                                            <?php echo $row['full_name']; ?>

                                                        </td>

                                                        <td>

                                                            <?php echo $row['phone']; ?>

                                                        </td>

                                                        <td>

                                                            <?php echo $row['quantity']; ?>

                                                        </td>

                                                        <td>

                                                            ₹<?php echo $row['product_price']; ?>

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

                                                                echo "<br><small class='text-danger fw-bold'>";

                                                                echo $row['cancel_reason'];

                                                                echo "</small>";

                                                                if (!empty($row['cancel_note'])) {

                                                                    echo "<br><small>";

                                                                    echo $row['cancel_note'];

                                                                    echo "</small>";
                                                                }
                                                            } elseif ($row['delivery_status'] == 'Out For Delivery') {

                                                                echo "<span class='badge bg-primary'>
    Out For Delivery
    </span>";
                                                            } elseif ($row['seller_status'] == 'Approved') {

                                                                echo "<span class='badge bg-info'>
    Shipped
    </span>";
                                                            } else {

                                                                echo "<span class='badge bg-secondary'>
    Pending
    </span>";
                                                            }

                                                            ?>

                                                        </td>

                                                        <td>

                                                            <?php echo $row['order_date']; ?>

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

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>