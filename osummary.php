<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Order Summary</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

    <!-- Order Summary -->
    <section class="container my-5">

        <!-- Heading -->
        <div class="mb-5">

            <h2 class="fw-bold">
                Order Summary
            </h2>

            <p class="text-muted">
                Review your items and complete your order
            </p>

        </div>

        <div class="row g-5">

            <!-- Left Side -->
            <div class="col-lg-8">

                <!-- Ordered Products -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">

                            Ordered Items

                        </h4>

                        <!-- Product -->
                        <div class="row align-items-center mb-4">

                            <!-- Image -->
                            <div class="col-md-3">

                                <img src="images/laptop.jpg"
                                    class="img-fluid rounded"
                                    height="150"
                                    style="object-fit:cover;">

                            </div>

                            <!-- Details -->
                            <div class="col-md-6">

                                <h5>
                                    Gaming Laptop
                                </h5>

                                <p class="text-muted mb-1">
                                    Electronics
                                </p>

                                <div class="text-warning mb-2">
                                    ★★★★☆
                                </div>

                                <h5 class="text-success">
                                    ₹55,000
                                </h5>

                            </div>

                            <!-- Quantity -->
                            <div class="col-md-3 text-center">

                                <h6 class="fw-bold">
                                    Quantity
                                </h6>

                                <span class="badge bg-dark fs-6">
                                    1
                                </span>

                            </div>

                        </div>

                        <hr>

                        <!-- Product -->
                        <div class="row align-items-center">

                            <div class="col-md-3">

                                <img src="images/shoes.jpg"
                                    class="img-fluid rounded"
                                    height="150"
                                    style="object-fit:cover;">

                            </div>

                            <div class="col-md-6">

                                <h5>
                                    Sports Shoes
                                </h5>

                                <p class="text-muted mb-1">
                                    Shoes
                                </p>

                                <div class="text-warning mb-2">
                                    ★★★★★
                                </div>

                                <h5 class="text-success">
                                    ₹2,499
                                </h5>

                            </div>

                            <div class="col-md-3 text-center">

                                <h6 class="fw-bold">
                                    Quantity
                                </h6>

                                <span class="badge bg-dark fs-6">
                                    1
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Address -->
                <div class="card border-0 shadow-sm mb-4">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">

                            Delivery Address

                        </h4>

                        <form>

                            <div class="row">

                                <!-- Name -->
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Full Name
                                    </label>

                                    <input type="text"
                                        class="form-control"
                                        placeholder="Enter full name">

                                </div>

                                <!-- Phone -->
                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Phone Number
                                    </label>

                                    <input type="tel"
                                        class="form-control"
                                        placeholder="Enter phone number">

                                </div>

                                <!-- Address -->
                                <div class="col-12 mb-3">

                                    <label class="form-label">
                                        Full Address
                                    </label>

                                    <textarea class="form-control"
                                        rows="4"
                                        placeholder="Enter full address"></textarea>

                                </div>

                                <!-- City -->
                                <div class="col-md-4 mb-3">

                                    <label class="form-label">
                                        City
                                    </label>

                                    <input type="text"
                                        class="form-control">

                                </div>

                                <!-- State -->
                                <div class="col-md-4 mb-3">

                                    <label class="form-label">
                                        State
                                    </label>

                                    <input type="text"
                                        class="form-control">

                                </div>

                                <!-- PIN -->
                                <div class="col-md-4 mb-3">

                                    <label class="form-label">
                                        PIN Code
                                    </label>

                                    <input type="number"
                                        class="form-control">

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

                <!-- Payment Options -->
                <div class="card border-0 shadow-sm">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">

                            Payment Method

                        </h4>

                        <!-- COD -->
                        <div class="form-check mb-3">

                            <input class="form-check-input"
                                type="radio"
                                name="payment"
                                checked>

                            <label class="form-check-label">

                                Cash on Delivery

                            </label>

                        </div>

                        <!-- UPI -->
                        <div class="form-check mb-3">

                            <input class="form-check-input"
                                type="radio"
                                name="payment">

                            <label class="form-check-label">

                                UPI Payment

                            </label>

                        </div>

                        <!-- Card -->
                        <div class="form-check mb-3">

                            <input class="form-check-input"
                                type="radio"
                                name="payment">

                            <label class="form-check-label">

                                Debit / Credit Card

                            </label>

                        </div>

                        <!-- Net Banking -->
                        <div class="form-check">

                            <input class="form-check-input"
                                type="radio"
                                name="payment">

                            <label class="form-check-label">

                                Net Banking

                            </label>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Right Side -->
            <div class="col-lg-4">

                <!-- Price Summary -->
                <div class="card border-0 shadow-sm sticky-top"
                    style="top:20px;">

                    <div class="card-body">

                        <h4 class="fw-bold mb-4">

                            Price Details

                        </h4>

                        <!-- Product Price -->
                        <div class="d-flex justify-content-between mb-3">

                            <span>
                                Price (2 Items)
                            </span>

                            <span>
                                ₹57,499
                            </span>

                        </div>

                        <!-- Delivery -->
                        <div class="d-flex justify-content-between mb-3">

                            <span>
                                Delivery Charges
                            </span>

                            <span class="text-success">
                                FREE
                            </span>

                        </div>

                        <!-- Discount -->
                        <div class="d-flex justify-content-between mb-3">

                            <span>
                                Discount
                            </span>

                            <span class="text-danger">
                                - ₹1,000
                            </span>

                        </div>

                        <hr>

                        <!-- Total -->
                        <div class="d-flex justify-content-between fw-bold fs-5">

                            <span>
                                Total Amount
                            </span>

                            <span class="text-success">
                                ₹56,499
                            </span>

                        </div>

                        <!-- Button -->
                        <button class="btn btn-dark w-100 mt-4 py-3">

                            Place Order

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>