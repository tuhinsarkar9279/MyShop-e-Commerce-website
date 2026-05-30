<?php

include 'connect.php';

/* Approve Product */

if (isset($_GET['approve'])) {

    $id = $_GET['approve'];

    mysqli_query(

        $conn,

        "UPDATE products

        SET status='approved'

        WHERE id='$id'"

    );

    header("Location: admin-products.php");
    exit();
}

/* Delete Product */

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $fetch = mysqli_query(

        $conn,

        "SELECT * FROM products
        WHERE id='$id'"

    );

    $data = mysqli_fetch_assoc($fetch);

    if (
        !empty($data['product_image'])
        &&
        file_exists(
            "uploads/" . $data['product_image']
        )
    ) {

        unlink(
            "uploads/" . $data['product_image']
        );
    }

    mysqli_query(

        $conn,

        "DELETE FROM products
        WHERE id='$id'"

    );

    header("Location: admin-products.php");
    exit();
}

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

                        <a href="#"
                            class="nav-link text-white active">

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

                        <a href="#"
                            class="nav-link text-white">

                            <i class="bi bi-people"></i>
                            Users

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="#"
                            class="nav-link text-white">

                            <i class="bi bi-shop"></i>
                            Sellers

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="#"
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

                        <a href="#"
                            class="nav-link text-white">

                            <i class="bi bi-bag-check"></i>
                            Orders

                        </a>

                    </li>

                    <li class="nav-item mt-4">

                        <a href="#"
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
                            Welcome Admin
                        </span>

                        <img src="images/admin.jpg"
                            class="rounded-circle"
                            width="45"
                            height="45"
                            style="object-fit:cover;">

                    </div>

                </nav>

                <!-- Dashboard Cards -->
                <div class="container py-4">

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
                                                150
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
                                                320
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
                                                540
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
                                                ₹2L
                                            </h2>

                                        </div>

                                        <i class="bi bi-currency-rupee fs-1 text-danger"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Recent Orders -->
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">

                            <thead class="table-dark">

                                <tr>

                                    <th>Image</th>
                                    <th>Seller</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                $query = mysqli_query(

                                    $conn,

                                    "SELECT products.*,

        users.name AS seller_name,

        categories.category_name

        FROM products

        LEFT JOIN users

        ON products.seller_id =
        users.id

        LEFT JOIN categories

        ON products.category_id =
        categories.id

        ORDER BY products.id DESC"

                                );

                                while ($row =
                                    mysqli_fetch_assoc($query)
                                ) {

                                ?>

                                    <tr>

                                        <td>

                                            <img src="uploads/<?php
                                                                echo $row['product_image']; ?>"

                                                width="70">

                                        </td>

                                        <td>

                                            <?php
                                            echo $row['seller_name'];
                                            ?>

                                        </td>

                                        <td>

                                            <?php
                                            echo $row['product_name'];
                                            ?>

                                        </td>

                                        <td>

                                            <?php
                                            echo $row['category_name'];
                                            ?>

                                        </td>

                                        <td>

                                            ₹<?php
                                                echo $row['product_price'];
                                                ?>

                                        </td>

                                        <td>

                                            <?php

                                            if ($row['status'] == "approved") {

                                                echo "<span class='badge bg-success'>
                Approved
                </span>";
                                            } else {

                                                echo "<span class='badge bg-warning text-dark'>
                Pending
                </span>";
                                            }

                                            ?>

                                        </td>

                                        <td>

                                            <?php

                                            if ($row['status'] == "pending") {

                                            ?>

                                                <a href="?approve=<?php
                                                                    echo $row['id']; ?>"

                                                    class="btn btn-success btn-sm">

                                                    Approve

                                                </a>

                                            <?php } ?>

                                            <a href="?delete=<?php
                                                                echo $row['id']; ?>"

                                                class="btn btn-danger btn-sm"

                                                onclick="return confirm(
            'Delete this product?'
            )">

                                                Delete

                                            </a>

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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>