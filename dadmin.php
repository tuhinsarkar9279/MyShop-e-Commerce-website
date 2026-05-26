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

                        <a href="#"
                            class="nav-link text-white active">

                            <i class="bi bi-speedometer2"></i>
                            Dashboard

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="#"
                            class="nav-link text-white">

                            <i class="bi bi-truck"></i>
                            Shipping Orders

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="#"
                            class="nav-link text-white">

                            <i class="bi bi-box-seam"></i>
                            Delivered Orders

                        </a>

                    </li>

                    <li class="nav-item mb-2">

                        <a href="#"
                            class="nav-link text-white">

                            <i class="bi bi-geo-alt"></i>
                            Delivery Address

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

                <!-- Navbar -->
                <nav class="navbar navbar-light bg-white shadow-sm px-4 py-3">

                    <h4 class="fw-bold mb-0">
                        Delivery Dashboard
                    </h4>

                    <div class="d-flex align-items-center">

                        <span class="me-3 fw-semibold">
                            Welcome Delivery Agent
                        </span>

                        <img src="images/delivery.jpg"
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

                        <!-- Pending -->
                        <div class="col-lg-4 col-md-6">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">

                                        <div>

                                            <h6 class="text-muted">
                                                Pending Deliveries
                                            </h6>

                                            <h2 class="fw-bold">
                                                12
                                            </h2>

                                        </div>

                                        <i class="bi bi-truck fs-1 text-warning"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Delivered -->
                        <div class="col-lg-4 col-md-6">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">

                                        <div>

                                            <h6 class="text-muted">
                                                Delivered Orders
                                            </h6>

                                            <h2 class="fw-bold">
                                                85
                                            </h2>

                                        </div>

                                        <i class="bi bi-check-circle fs-1 text-success"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Earnings -->
                        <div class="col-lg-4 col-md-6">

                            <div class="card border-0 shadow-sm">

                                <div class="card-body">

                                    <div class="d-flex justify-content-between">

                                        <div>

                                            <h6 class="text-muted">
                                                Earnings
                                            </h6>

                                            <h2 class="fw-bold">
                                                ₹15,000
                                            </h2>

                                        </div>

                                        <i class="bi bi-currency-rupee fs-1 text-primary"></i>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Shipping Orders Table -->
                    <div class="card border-0 shadow-sm mt-5">

                        <div class="card-body">

                            <h4 class="fw-bold mb-4">
                                Shipping Orders
                            </h4>

                            <div class="table-responsive">

                                <table class="table align-middle">

                                    <thead>

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

                                        <!-- Order -->
                                        <tr>

                                            <td>
                                                #1001
                                            </td>

                                            <td>
                                                Tuhin Sarkar
                                            </td>

                                            <td>
                                                Gaming Laptop
                                            </td>

                                            <td>
                                                Agartala, Tripura
                                            </td>

                                            <td>

                                                <span class="badge bg-warning text-dark">
                                                    Shipping
                                                </span>

                                            </td>

                                            <td>

                                                <button class="btn btn-success btn-sm">

                                                    Mark Delivered

                                                </button>

                                            </td>

                                        </tr>

                                        <!-- Order -->
                                        <tr>

                                            <td>
                                                #1002
                                            </td>

                                            <td>
                                                Rahul Das
                                            </td>

                                            <td>
                                                Sports Shoes
                                            </td>

                                            <td>
                                                Guwahati, Assam
                                            </td>

                                            <td>

                                                <span class="badge bg-primary">
                                                    Out for Delivery
                                                </span>

                                            </td>

                                            <td>

                                                <button class="btn btn-success btn-sm">

                                                    Mark Delivered

                                                </button>

                                            </td>

                                        </tr>

                                        <!-- Order -->
                                        <tr>

                                            <td>
                                                #1003
                                            </td>

                                            <td>
                                                Priya Roy
                                            </td>

                                            <td>
                                                Perfume
                                            </td>

                                            <td>
                                                Kolkata, West Bengal
                                            </td>

                                            <td>

                                                <span class="badge bg-success">
                                                    Delivered
                                                </span>

                                            </td>

                                            <td>

                                                <button class="btn btn-secondary btn-sm"
                                                    disabled>

                                                    Completed

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