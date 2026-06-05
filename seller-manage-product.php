<?php



include 'seller-session.php';

include 'connect.php';



/* Check Seller Login */

if (!isset($_SESSION['seller_id'])) {

    header("Location: seller-login.php");

    exit();
}

/* Seller Details */

$seller_id = $_SESSION['seller_id'];

$seller_name = $_SESSION['seller_name'];

?>


<?php

include 'connect.php';

if (isset($_POST['submit'])) {

    // Seller Login Session
    $seller_id = $_SESSION['seller_id'];

    $category_id = $_POST['category_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];

    $image = $_FILES['product_image']['name'];
    $tmp_name = $_FILES['product_image']['tmp_name'];

    move_uploaded_file(
        $tmp_name,
        "uploads/" . $image
    );

    $query = mysqli_query(

        $conn,

        "INSERT INTO products(

        seller_id,
        category_id,
        product_name,
        product_price,
        product_image,
        product_description,
        status

        )

        VALUES(

        '$seller_id',
        '$category_id',
        '$product_name',
        '$product_price',
        '$image',
        '$product_description',
        'pending'

        )"

    );

    if ($query) {

        header("Location: add-products.php?success=1");

        exit();
    }
}

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
                            class="nav-link text-white ">

                            <i class="bi bi-plus-circle"></i>
                            Add Product

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="seller-manage-product.php"
                            class="nav-link text-white bg-primary">

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


                    <!-- Add Product Form -->


                    <h3 class="mb-4">

                        My Products

                    </h3>

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover align-middle">

                            <thead class="table-dark">

                                <tr>

                                    <th>Image</th>
                                    <th>Product Name</th>
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
                                      categories.category_name

                                      FROM products

                                      LEFT JOIN categories

                                      ON products.category_id =
                                      categories.id

                                      WHERE seller_id='$seller_id'

                                      ORDER BY id DESC"

                                );

                                if (mysqli_num_rows($query) > 0) {

                                    while ($row = mysqli_fetch_assoc($query)) {

                                ?>

                                        <tr>

                                            <!-- Product Image -->
                                            <td>

                                                <img src="uploads/<?php echo $row['product_image']; ?>"

                                                    width="80"

                                                    height="80"

                                                    style="object-fit:cover;"

                                                    class="rounded">

                                            </td>

                                            <!-- Product Name -->
                                            <td>

                                                <?php echo $row['product_name']; ?>

                                            </td>

                                            <!-- Category -->
                                            <td>

                                                <?php echo $row['category_name']; ?>

                                            </td>

                                            <!-- Price -->
                                            <td>

                                                ₹<?php echo $row['product_price']; ?>

                                            </td>

                                            <!-- Status -->
                                            <td>

                                                <?php

                                                if ($row['status'] == "approved") {

                                                    echo "<span class='badge bg-success'>
                                                Approved
                                              </span>";
                                                } elseif ($row['status'] == "pending") {

                                                    echo "<span class='badge bg-warning text-dark'>
                                                Pending
                                              </span>";
                                                } else {

                                                    echo "<span class='badge bg-danger'>
                                                Rejected
                                              </span>";
                                                }

                                                ?>

                                            </td>

                                            <!-- Action -->
                                            <td>

                                                <a href="edit-product.php?id=<?php echo $row['id']; ?>"

                                                    class="btn btn-warning btn-sm">

                                                    Edit

                                                </a>

                                                <a href="delete-product.php?id=<?php echo $row['id']; ?>"

                                                    class="btn btn-danger btn-sm"

                                                    onclick="return confirm('Are you sure you want to delete this product?')">

                                                    Delete

                                                </a>

                                            </td>

                                        </tr>

                                    <?php

                                    }
                                } else {

                                    ?>

                                    <tr>

                                        <td colspan="6" class="text-center">

                                            No Products Added Yet

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