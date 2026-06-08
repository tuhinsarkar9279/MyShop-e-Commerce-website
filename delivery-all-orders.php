<?php

include 'delivery-session.php';

include 'connect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Delivery Agent Panel</title>

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
                        Delivery Panel
                    </h3>

                </div>

                <!-- Menu -->
                <ul class="nav flex-column p-3">

                    <li class="nav-item mb-2">

                        <a href="dadmin.php"
                            class="nav-link text-white active ">

                            <i class="bi bi-speedometer2"></i>
                            Dashboard

                        </a>

                    </li>

                    <?php

                    $delivery_query = mysqli_query(

                        $conn,

                        "SELECT COUNT(*) AS total

                        FROM orders

                            WHERE seller_status='Approved'

                      AND delivery_status='Pending'"

                    );

                    $delivery_data = mysqli_fetch_assoc($delivery_query);

                    $delivery_count = $delivery_data['total'];

                    ?>

                    <li class="nav-item mb-2">

                        <a href="delivery-agent.php"
                            class="nav-link text-white d-flex justify-content-between align-items-center">

                            <span>

                                <i class="bi bi-truck"></i>

                                Shipping Orders

                            </span>

                            <?php if ($delivery_count > 0) { ?>

                                <span class="badge bg-danger">

                                    <?php echo $delivery_count; ?>

                                </span>

                            <?php } ?>

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="delivery-all-orders.php"
                            class="nav-link text-white bg-primary">

                            <i class="bi bi-box-seam"></i>
                            All Orders

                        </a>

                    </li>

                    <?php

                    $out_query = mysqli_query(

                        $conn,

                        "SELECT COUNT(*) AS total

                            FROM orders

                         WHERE delivery_status='Out For Delivery'"

                    );

                    $out_data = mysqli_fetch_assoc($out_query);

                    $out_count = $out_data['total'];

                    ?>

                    <li class="nav-item mb-2">

                        <a href="delivery-complete.php"
                            class="nav-link text-white d-flex justify-content-between align-items-center">

                            <span>

                                <i class="bi bi-geo-alt"></i>

                                Out For Delivery

                            </span>

                            <?php if ($out_count > 0) { ?>

                                <span class="badge bg-danger">

                                    <?php echo $out_count; ?>

                                </span>

                            <?php } ?>

                        </a>

                    </li>

                    <li class="nav-item mt-4">

                        <a href="delivery-logout.php"
                            class="btn btn-danger w-100">

                            Logout

                        </a>

                    </li>

                </ul>

            </div>

            <!-- Main Content -->
            <div class="col-lg-10">

                <!-- Navbar -->
                <nav class="navbar navbar-light bg-white shadow-sm px-4 py-3">

                    <h4 class="fw-bold mb-0">
                        Delivery Dashboard
                    </h4>

                    <div class="d-flex align-items-center">

                        <span class="me-3 fw-semibold">

                            Welcome,

                            <?php echo $delivery_name; ?>

                        </span>

                        <?php if (!empty($delivery_image)) { ?>

                            <img src="uploads/<?php echo $delivery_image; ?>"

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

                                All Delivery Orders

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
                                            <th>Address</th>
                                            <th>Seller Status</th>
                                            <th>Delivery Status</th>
                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        $query = mysqli_query(

                                            $conn,

                                            "SELECT

                            orders.*,

                            products.product_name,

                            products.product_image

                            FROM orders

                            INNER JOIN products

                            ON orders.product_id = products.id

                            WHERE orders.seller_status='Approved'

                            ORDER BY orders.id DESC"

                                        );

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

                                                    <?php

                                                    echo $row['address'];

                                                    echo ", " . $row['city'];

                                                    echo ", " . $row['state'];

                                                    echo " - " . $row['pincode'];

                                                    ?>

                                                </td>

                                                <td>

                                                    <span class="badge bg-success">

                                                        <?php echo $row['seller_status']; ?>

                                                    </span>

                                                </td>

                                                <td>

                                                    <?php

                                                    if ($row['delivery_status'] == "Pending") {

                                                        echo "<span class='badge bg-secondary'>Pending</span>";
                                                    } elseif ($row['delivery_status'] == "Out For Delivery") {

                                                        echo "<span class='badge bg-primary'>Out For Delivery</span>";
                                                    } elseif ($row['delivery_status'] == "Delivered") {

                                                        echo "<span class='badge bg-success'>Delivered</span>";
                                                    } elseif ($row['delivery_status'] == "Cancelled") {

                                                        echo "<span class='badge bg-danger'>Cancelled</span>";
                                                    }

                                                    ?>

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