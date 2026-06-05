<?php

include 'seller-session.php';
include 'connect.php';

$seller_id = $_SESSION['seller_id'];

/* Approve Order */

if (isset($_GET['approve'])) {

    $order_id = $_GET['approve'];

    mysqli_query(

        $conn,

        "UPDATE orders

        SET seller_status='Approved'

        WHERE id='$order_id'"

    );

    header("Location: seller-orders.php");
    exit();
}

/* Dashboard Counts */

$total_orders = mysqli_num_rows(

    mysqli_query(

        $conn,

        "SELECT orders.*

        FROM orders

        INNER JOIN products

        ON orders.product_id = products.id

        WHERE products.seller_id='$seller_id'"

    )

);

$approved_orders = mysqli_num_rows(

    mysqli_query(

        $conn,

        "SELECT orders.*

        FROM orders

        INNER JOIN products

        ON orders.product_id = products.id

        WHERE products.seller_id='$seller_id'

        AND orders.seller_status='Approved'"

    )

);

$pending_orders = mysqli_num_rows(

    mysqli_query(

        $conn,

        "SELECT orders.*

        FROM orders

        INNER JOIN products

        ON orders.product_id = products.id

        WHERE products.seller_id='$seller_id'

        AND orders.seller_status='Pending'"

    )

);

/* Orders Query */

$query = mysqli_query(

    $conn,

    "SELECT

    orders.*,

    products.product_name,

    products.product_image,

    products.product_price

    FROM orders

    INNER JOIN products

    ON orders.product_id = products.id

    WHERE products.seller_id='$seller_id'

    ORDER BY orders.id DESC"

);

?>

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
                            class="nav-link text-white active">

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
                            class="nav-link text-white  bg-primary">

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
                    <h2 class="mb-4">

                        <i class="bi bi-bag-check-fill"></i>

                        Seller Orders Panel

                    </h2>

                    <!-- Dashboard Cards -->

                    <div class="row mb-4">

                        <div class="col-md-4">

                            <div class="card shadow border-0">

                                <div class="card-body text-center">

                                    <h5>Total Orders</h5>

                                    <h2 class="text-primary">

                                        <?php echo $total_orders; ?>

                                    </h2>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="card shadow border-0">

                                <div class="card-body text-center">

                                    <h5>Approved Orders</h5>

                                    <h2 class="text-success">

                                        <?php echo $approved_orders; ?>

                                    </h2>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="card shadow border-0">

                                <div class="card-body text-center">

                                    <h5>Pending Orders</h5>

                                    <h2 class="text-warning">

                                        <?php echo $pending_orders; ?>

                                    </h2>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Orders Table -->

                    <div class="card shadow border-0">

                        <div class="card-header bg-dark text-white">

                            <h4 class="mb-0">

                                My Product Orders

                            </h4>

                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-hover align-middle">

                                    <thead class="table-dark">

                                        <tr>

                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        if (mysqli_num_rows($query) > 0) {

                                            while ($row = mysqli_fetch_assoc($query)) {

                                        ?>

                                                <tr>

                                                    <td>

                                                        <img src="uploads/<?php echo $row['product_image']; ?>"

                                                            width="70"

                                                            height="70"

                                                            class="rounded shadow-sm"

                                                            style="object-fit:cover;">

                                                    </td>

                                                    <td>

                                                        <strong>

                                                            <?php echo $row['product_name']; ?>

                                                        </strong>

                                                    </td>

                                                    <td>

                                                        ₹<?php echo $row['product_price']; ?>

                                                    </td>

                                                    <td>

                                                        <?php echo $row['full_name']; ?>

                                                    </td>

                                                    <td>

                                                        <?php echo $row['phone']; ?>

                                                    </td>

                                                    <td>

                                                        <span class="badge bg-primary">

                                                            <?php echo $row['quantity']; ?>

                                                        </span>

                                                    </td>

                                                    <td>

                                                        <?php

                                                        if ($row['seller_status'] == "Approved") {

                                                            echo "<span class='badge bg-success'>Approved</span>";
                                                        } else {

                                                            echo "<span class='badge bg-warning text-dark'>Pending</span>";
                                                        }

                                                        ?>

                                                    </td>

                                                    <td>

                                                        <?php

                                                        if ($row['seller_status'] == "Pending") {

                                                        ?>

                                                            <a href="?approve=<?php echo $row['id']; ?>"

                                                                class="btn btn-success btn-sm">

                                                                <i class="bi bi-check-circle"></i>

                                                                Approve

                                                            </a>

                                                        <?php

                                                        } else {

                                                        ?>

                                                            <button class="btn btn-secondary btn-sm"

                                                                disabled>

                                                                Approved

                                                            </button>

                                                        <?php } ?>

                                                    </td>

                                                </tr>

                                            <?php

                                            }
                                        } else {

                                            ?>

                                            <tr>

                                                <td colspan="8"

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