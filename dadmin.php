<?php
include 'delivery-session.php';
include 'connect.php';

$pending = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total
        FROM orders
        WHERE delivery_status='Pending'
        OR delivery_status='Out For Delivery'"
    )
);

$delivered = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT COUNT(*) AS total
        FROM orders
        WHERE delivery_status='Delivered'"
    )
);

$earning = mysqli_fetch_assoc(
    mysqli_query(
        $conn,
        "SELECT
        SUM(products.product_price * orders.quantity)
        AS total_earnings
        FROM orders
        INNER JOIN products
        ON orders.product_id = products.id
        WHERE orders.delivery_status='Delivered'"
    )
);

$total_earnings = $earning['total_earnings'] ?? 0;

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
                            class="nav-link text-white active bg-primary">

                            <i class="bi bi-speedometer2"></i>
                            Dashboard

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="delivery-agent.php"
                            class="nav-link text-white">

                            <i class="bi bi-truck"></i>
                            Shipping Orders

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="delivery-all-orders.php"
                            class="nav-link text-white">

                            <i class="bi bi-box-seam"></i>
                            All Orders

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="delivery-complete.php"
                            class="nav-link text-white">

                            <i class="bi bi-geo-alt"></i>
                            Out For Delivery

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

    <?php if(!empty($delivery_image)){ ?>

        <img src="uploads/<?php echo $delivery_image; ?>"

            class="rounded-circle"

            width="45"

            height="45"

            style="object-fit:cover;">

    <?php }else{ ?>

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
                    <?php

/* Pending Deliveries */

$pending_query = mysqli_query(

    $conn,

    "SELECT COUNT(*) AS total

    FROM orders

    WHERE delivery_status='Pending'

    OR delivery_status='Out For Delivery'"

);

$pending = mysqli_fetch_assoc($pending_query);

/* Delivered Orders */

$delivered_query = mysqli_query(

    $conn,

    "SELECT COUNT(*) AS total

    FROM orders

    WHERE delivery_status='Delivered'"

);

$delivered = mysqli_fetch_assoc($delivered_query);

/* Earnings */

$earning_query = mysqli_query(

    $conn,

    "SELECT

    SUM(products.product_price * orders.quantity)

    AS total_earnings

    FROM orders

    INNER JOIN products

    ON orders.product_id = products.id

    WHERE orders.delivery_status='Delivered'"

);

$earning = mysqli_fetch_assoc($earning_query);

$total_earnings = $earning['total_earnings'] ?? 0;

?>

                    <!-- Cards -->
<div class="row g-4">

    <!-- Pending Deliveries -->
    <div class="col-lg-4 col-md-6">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <h6 class="text-muted">
                            Pending Deliveries
                        </h6>

                        <h2 class="fw-bold">
                            <?php echo $pending['total']; ?>
                        </h2>

                    </div>

                    <i class="bi bi-truck fs-1 text-warning"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- Delivered Orders -->
    <div class="col-lg-4 col-md-6">

        <div class="card border-0 shadow-sm">

            <div class="card-body">

                <div class="d-flex justify-content-between">

                    <div>

                        <h6 class="text-muted">
                            Delivered Orders
                        </h6>

                        <h2 class="fw-bold">
                            <?php echo $delivered['total']; ?>
                        </h2>

                    </div>

                    <i class="bi bi-check-circle fs-1 text-success"></i>

                </div>

            </div>

        </div>

    </div>

    <!-- Earnings -->
    

</div>

<!-- Shipping Orders Table -->

<div class="card border-0 shadow-sm mt-5">

    <div class="card-body">

        <h4 class="fw-bold mb-4">
            Shipping Orders
        </h4>

        <div class="table-responsive">

            <table class="table align-middle table-bordered">

                <thead class="table-dark">

                    <tr>

                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $query = mysqli_query(

                        $conn,

                        "SELECT

                        orders.*,

                        products.product_name

                        FROM orders

                        INNER JOIN products

                        ON orders.product_id = products.id

                        WHERE orders.seller_status='Approved'

                        ORDER BY orders.id DESC"

                    );

                    if(mysqli_num_rows($query) > 0){

                        while($row = mysqli_fetch_assoc($query)){

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

                            <?php

                            echo $row['city'];

                            echo ", ";

                            echo $row['state'];

                            ?>

                        </td>

                        <td>

                            <?php

                            if($row['delivery_status']=="Pending"){

                                echo "<span class='badge bg-warning text-dark'>
                                Pending
                                </span>";

                            }elseif($row['delivery_status']=="Out For Delivery"){

                                echo "<span class='badge bg-primary'>
                                Out For Delivery
                                </span>";

                            }elseif($row['delivery_status']=="Delivered"){

                                echo "<span class='badge bg-success'>
                                Delivered
                                </span>";

                            }elseif($row['delivery_status']=="Cancelled"){

                                echo "<span class='badge bg-danger'>
                                Cancelled
                                </span>";

                            }

                            ?>

                        </td>

                        <td>

                            <?php

                            if($row['delivery_status']=="Delivered"){

                            ?>

                            <button

                                class="btn btn-secondary btn-sm"

                                disabled>

                                Completed

                            </button>

                            <?php

                            }else{

                            ?>

                            <a href="delivery-complete.php?delivered=<?php echo $row['id']; ?>"

                                class="btn btn-success btn-sm">

                                Mark Delivered

                            </a>

                            <?php } ?>

                        </td>

                    </tr>

                    <?php

                        }

                    }else{

                    ?>

                    <tr>

                        <td colspan="6" class="text-center">

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