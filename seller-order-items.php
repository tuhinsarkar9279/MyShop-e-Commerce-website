<?php

include 'seller-session.php';

include 'connect.php';

$seller_id = $_SESSION['seller_id'];

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
                            class="nav-link text-white">

                            <i class="bi bi-bag-check"></i>
                            Orders

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="seller-order-items.php"
                            class="nav-link text-white  bg-primary">

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
                    <div class="card shadow">

                        <div class="card-body">

                            <h3 class="mb-4">

                                Order History

                            </h3>

                            <div class="table-responsive">

                                <table class="table table-bordered table-hover">

                                    <thead class="table-dark">

                                        <tr>

                                            <th>Order ID</th>
                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Order Date</th>

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

                            WHERE products.seller_id='$seller_id'

                            AND (

                                orders.delivery_status='Delivered'

                                OR

                                orders.delivery_status='Cancelled'

                            )

                            ORDER BY orders.id DESC"

                                        );

                                        if (mysqli_num_rows($query) > 0) {

                                            while ($row = mysqli_fetch_assoc($query)) {

                                        ?>

                                                <tr>

                                                    <td>

                                                        #<?php echo $row['id']; ?>

                                                    </td>

                                                    <td>

                                                        <img src="uploads/<?php echo $row['product_image']; ?>"

                                                            width="70"

                                                            height="70"

                                                            style="object-fit:cover;">

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

                                                        if ($row['delivery_status'] == "Delivered") {

                                                            echo "<span class='badge bg-success'>
                                    Delivered
                                    </span>";
                                                        } else {

                                                            echo "<span class='badge bg-danger'>
                                    Cancelled
                                    </span>";
                                                        }

                                                        ?>

                                                    </td>

                                                    <td>

                                                        <?php

                                                        echo date(

                                                            "d M Y",

                                                            strtotime($row['order_date'])

                                                        );

                                                        ?>

                                                    </td>

                                                </tr>

                                            <?php

                                            }
                                        } else {

                                            ?>

                                            <tr>

                                                <td colspan="9"

                                                    class="text-center">

                                                    No Completed Orders Found

                                                </td>

                                            </tr>

                                        <?php } ?>

                                    </tbody>

                                </table>

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