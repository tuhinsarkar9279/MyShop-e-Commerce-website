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

                        <a href="#"
                            class="nav-link text-white active">

                            <i class="bi bi-speedometer2"></i>
                            Dashboard

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="#"
                            class="nav-link text-white">

                            <i class="bi bi-plus-circle"></i>
                            Add Product

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="#"
                            class="nav-link text-white">

                            <i class="bi bi-box-seam"></i>
                            Manage Products

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="#"
                            class="nav-link text-white">

                            <i class="bi bi-bag-check"></i>
                            Orders

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="#"
                            class="nav-link text-white">

                            <i class="bi bi-graph-up-arrow"></i>
                            Sales Report

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
                        Seller Dashboard
                    </h4>

                    <div class="d-flex align-items-center">

                        <span class="me-3 fw-semibold">
                            Welcome Seller
                        </span>

                        <img src="images/seller.jpg"
                            class="rounded-circle"
                            width="45"
                            height="45"
                            style="object-fit:cover;">

                    </div>

                </nav>

                <!-- Dashboard Content -->
                <div class="container py-4">

                    <!-- Cards -->
                    <div class="row g-4">

                        <!-- Total Products -->
                        <div class="col-lg-4 col-md-6">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">

                                        <div>

                                            <h6 class="text-muted">
                                                Total Products
                                            </h6>

                                            <h2 class="fw-bold">
                                                45
                                            </h2>

                                        </div>

                                        <i class="bi bi-box-seam fs-1 text-primary"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Orders -->
                        <div class="col-lg-4 col-md-6">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">

                                        <div>

                                            <h6 class="text-muted">
                                                Total Orders
                                            </h6>

                                            <h2 class="fw-bold">
                                                120
                                            </h2>

                                        </div>

                                        <i class="bi bi-bag-check fs-1 text-success"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Revenue -->
                        <div class="col-lg-4 col-md-6">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">

                                        <div>

                                            <h6 class="text-muted">
                                                Revenue
                                            </h6>

                                            <h2 class="fw-bold">
                                                ₹1,20,000
                                            </h2>

                                        </div>

                                        <i class="bi bi-currency-rupee fs-1 text-danger"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Add Product Form -->
                    <div class="card border-0 shadow-sm mt-5">

                        <div class="card-body">

                            <h4 class="fw-bold mb-4">
                                Add New Product
                            </h4>

                            <form>

                                <div class="row">

                                    <!-- Product Name -->
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Product Name
                                        </label>

                                        <input type="text"
                                            class="form-control"
                                            placeholder="Enter product name">

                                    </div>

                                    <!-- Price -->
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Price
                                        </label>

                                        <input type="number"
                                            class="form-control"
                                            placeholder="Enter price">

                                    </div>

                                    <!-- Category -->
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Category
                                        </label>

                                        <select class="form-select">

                                            <option>
                                                Electronics
                                            </option>

                                            <option>
                                                Fashion
                                            </option>

                                            <option>
                                                Shoes
                                            </option>

                                            <option>
                                                Beauty
                                            </option>

                                        </select>

                                    </div>

                                    <!-- Product Image -->
                                    <div class="col-md-6 mb-3">

                                        <label class="form-label">
                                            Product Image
                                        </label>

                                        <input type="file"
                                            class="form-control">

                                    </div>

                                    <!-- Description -->
                                    <div class="col-12 mb-3">

                                        <label class="form-label">
                                            Description
                                        </label>

                                        <textarea class="form-control"
                                            rows="4"
                                            placeholder="Enter product description"></textarea>

                                    </div>

                                </div>

                                <!-- Submit -->
                                <button class="btn btn-dark">

                                    Add Product

                                </button>

                            </form>

                        </div>

                    </div>

                    <!-- Product Table -->
                    <div class="card border-0 shadow-sm mt-5">

                        <div class="card-body">

                            <h4 class="fw-bold mb-4">
                                My Products
                            </h4>

                            <div class="table-responsive">

                                <table class="table align-middle">

                                    <thead>

                                        <tr>

                                            <th>Image</th>
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <tr>

                                            <td>

                                                <img src="images/laptop.jpg"
                                                    width="70"
                                                    height="70"
                                                    style="object-fit:cover;">

                                            </td>

                                            <td>
                                                Gaming Laptop
                                            </td>

                                            <td>
                                                Electronics
                                            </td>

                                            <td>
                                                ₹55,000
                                            </td>

                                            <td>

                                                <button class="btn btn-sm btn-warning">

                                                    Edit

                                                </button>

                                                <button class="btn btn-sm btn-danger">

                                                    Delete

                                                </button>

                                            </td>

                                        </tr>

                                        <tr>

                                            <td>

                                                <img src="images/shoes.jpg"
                                                    width="70"
                                                    height="70"
                                                    style="object-fit:cover;">

                                            </td>

                                            <td>
                                                Sports Shoes
                                            </td>

                                            <td>
                                                Shoes
                                            </td>

                                            <td>
                                                ₹2,499
                                            </td>

                                            <td>

                                                <button class="btn btn-sm btn-warning">

                                                    Edit

                                                </button>

                                                <button class="btn btn-sm btn-danger">

                                                    Delete

                                                </button>

                                            </td>

                                        </tr>

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