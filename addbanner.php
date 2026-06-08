<?php

include 'admin-session.php';

include 'connect.php';


/* Add Banner */
if (isset($_POST['add_banner'])) {

    $image =
        $_FILES['banner_image']['name'];

    $tmp_name =
        $_FILES['banner_image']['tmp_name'];

    move_uploaded_file(
        $tmp_name,
        "uploads/" . $image
    );

    mysqli_query(
        $conn,

        "INSERT INTO banners(image)

    VALUES('$image')"

    );
}

/* Delete Banner */
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    /* Fetch Image */
    $fetch =
        mysqli_query(
            $conn,

            "SELECT * FROM banners
    WHERE id='$id'"

        );

    $data =
        mysqli_fetch_assoc($fetch);

    /* Delete Banner */
    if (isset($_GET['delete'])) {

        $id = $_GET['delete'];

        /* Fetch Banner */
        $fetch = mysqli_query(
            $conn,
            "SELECT * FROM banners WHERE id='$id'"
        );

        /* Check Banner Exists */
        if (mysqli_num_rows($fetch) > 0) {

            $data = mysqli_fetch_assoc($fetch);

            /* Delete Image File */
            if (
                !empty($data['image']) &&
                file_exists("uploads/" . $data['image'])
            ) {

                unlink("uploads/" . $data['image']);
            }

            /* Delete From Database */
            mysqli_query(
                $conn,
                "DELETE FROM banners WHERE id='$id'"
            );
        }
    }
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
                            class="nav-link text-white bg-primary">

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
                    <div class="d-flex justify-content-between align-items-center mb-5">

                        <div>

                            <h2 class="fw-bold">

                                Banner Management

                            </h2>

                            <p class="text-muted">

                                Add and Delete Website Banners

                            </p>

                        </div>

                        <!-- Add Banner Button -->
                        <button class="btn btn-dark"
                            data-bs-toggle="modal"
                            data-bs-target="#addBannerModal">

                            Add Banner

                        </button>

                    </div>

                    <!-- Banner Row -->
                    <div class="row g-4">

                        <?php

                        $query =
                            mysqli_query(
                                $conn,

                                "SELECT * FROM banners"

                            );

                        while ($row =
                            mysqli_fetch_assoc($query)
                        ) {

                        ?>

                            <!-- Banner Card -->
                            <div class="col-lg-4 col-md-6">

                                <div class="card border-0 shadow-sm h-100">

                                    <!-- Banner Image -->
                                    <img src="uploads/<?php
                                                        echo $row['image']; ?>"

                                        class="card-img-top"

                                        height="250"

                                        style="object-fit:cover;">

                                    <!-- Card Body -->
                                    <div class="card-body">

                                        <div class="d-grid">

                                            <!-- Delete Button -->
                                            <a href="?delete=<?php
                                                                echo $row['id']; ?>"

                                                class="btn btn-danger">

                                                Delete Banner

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        <?php } ?>

                    </div>


                </div>

            </div>

        </div>

    </div>
    <div class="modal fade"
        id="addBannerModal"
        tabindex="-1">

        <div class="modal-dialog">

            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header">

                    <h5 class="modal-title">

                        Add New Banner

                    </h5>

                    <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">

                    </button>

                </div>

                <!-- Body -->
                <div class="modal-body">

                    <form method="POST"
                        enctype="multipart/form-data">

                        <!-- File -->
                        <div class="mb-3">

                            <label class="form-label">

                                Upload Banner Image

                            </label>

                            <input type="file"
                                name="banner_image"
                                class="form-control"
                                required>

                        </div>

                        <!-- Submit -->
                        <button type="submit"
                            name="add_banner"
                            class="btn btn-dark w-100">

                            Upload Banner

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>