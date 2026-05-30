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
                <?php

                include 'connect.php';

                /* Add Category */
                if (isset($_POST['add_category'])) {

                    $category_name = $_POST['category_name'];

                    mysqli_query(

                        $conn,

                        "INSERT INTO categories(category_name)

        VALUES('$category_name')"

                    );
                }

                /* Delete Category */
                if (isset($_GET['delete'])) {

                    $id = $_GET['delete'];

                    mysqli_query(

                        $conn,

                        "DELETE FROM categories

        WHERE id='$id'"

                    );
                }

                ?>

                <!DOCTYPE html>
                <html lang="en">

                <head>

                    <meta charset="UTF-8">

                    <meta name="viewport"
                        content="width=device-width, initial-scale=1.0">

                    <title>Manage Categories</title>

                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
                        rel="stylesheet">

                </head>

                <body>

                    <div class="container py-5">

                        <h2 class="mb-4">

                            Category Management

                        </h2>

                        <!-- Add Category -->

                        <div class="card shadow-sm mb-4">

                            <div class="card-body">

                                <form method="POST">

                                    <div class="row">

                                        <div class="col-md-9">

                                            <input type="text"

                                                name="category_name"

                                                class="form-control"

                                                placeholder="Enter Category Name"

                                                required>

                                        </div>

                                        <div class="col-md-3">

                                            <button

                                                type="submit"

                                                name="add_category"

                                                class="btn btn-dark w-100">

                                                Add Category

                                            </button>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                        <!-- View Categories -->

                        <div class="card shadow-sm">

                            <div class="card-body">

                                <table class="table">

                                    <thead>

                                        <tr>

                                            <th>ID</th>

                                            <th>Category Name</th>

                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        $query = mysqli_query(

                                            $conn,

                                            "SELECT * FROM categories"

                                        );

                                        while ($row = mysqli_fetch_assoc($query)) {

                                        ?>

                                            <tr>

                                                <td>

                                                    <?php echo $row['id']; ?>

                                                </td>

                                                <td>

                                                    <?php echo $row['category_name']; ?>

                                                </td>

                                                <td>

                                                    <a href="?delete=<?php echo $row['id']; ?>"

                                                        class="btn btn-danger btn-sm">

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

                </body>

                </html>

            </div>

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>