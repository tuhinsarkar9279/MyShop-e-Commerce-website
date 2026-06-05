<?php

include 'delivery-session.php';

include 'connect.php';

/* Mark Delivered */

if (isset($_GET['delivered'])) {

    $id = $_GET['delivered'];

    mysqli_query(

        $conn,

        "UPDATE orders

        SET delivery_status='Delivered'

        WHERE id='$id'"

    );

    header("Location: delivery-complete.php");

    exit();
}

if(isset($_POST['cancel_order'])){

    $order_id = $_POST['order_id'];

    $cancel_reason = $_POST['cancel_reason'];

    $cancel_note = $_POST['cancel_note'] ?? '';

    mysqli_query(

        $conn,

        "UPDATE orders

        SET

        delivery_status='Cancelled',

        cancel_reason='$cancel_reason',

        cancel_note='$cancel_note'

        WHERE id='$order_id'"

    );

    header("Location: delivery-complete.php");

    exit();

}

/* Cancel Order */

if (isset($_GET['cancel'])) {

    $id = $_GET['cancel'];

    mysqli_query(

        $conn,

        "UPDATE orders

        SET delivery_status='Cancelled'

        WHERE id='$id'"

    );

    header("Location: delivery-complete.php");

    exit();
}

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
                            class="nav-link text-white active">

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
                            class="nav-link text-white bg-primary">

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

                                Out For Delivery Orders

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

                            products.product_name,

                            products.product_image

                            FROM orders

                            INNER JOIN products

                            ON orders.product_id = products.id

                            WHERE orders.delivery_status='Out For Delivery'

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

                                                        <?php

                                                        echo $row['address'];

                                                        echo ", " . $row['city'];

                                                        echo ", " . $row['state'];

                                                        echo " - " . $row['pincode'];

                                                        ?>

                                                    </td>

                                                    <td>

                                                        <span class="badge bg-primary">

                                                            <?php echo $row['delivery_status']; ?>

                                                        </span>

                                                    </td>

                                                    <td>

                                                        <a href="?delivered=<?php echo $row['id']; ?>"

                                                            class="btn btn-success btn-sm">

                                                            <i class="bi bi-check-circle"></i>

                                                            Delivered

                                                        </a>

                                                        <button

                                                            type="button"

                                                            class="btn btn-danger btn-sm"

                                                            data-bs-toggle="modal"

                                                            data-bs-target="#cancelModal<?php echo $row['id']; ?>">

                                                            <i class="bi bi-x-circle"></i>

                                                            Cancel

                                                        </button>

                                                    </td>

                                                </tr>
                                                <div class="modal fade"

                                                    id="cancelModal<?php echo $row['id']; ?>"

                                                    tabindex="-1">

                                                    <div class="modal-dialog">

                                                        <div class="modal-content">

                                                            <form method="POST">

                                                                <div class="modal-header">

                                                                    <h5 class="modal-title">

                                                                        Cancel Order

                                                                    </h5>

                                                                    <button

                                                                        type="button"

                                                                        class="btn-close"

                                                                        data-bs-dismiss="modal">

                                                                    </button>

                                                                </div>

                                                                <div class="modal-body">

                                                                    <input

                                                                        type="hidden"

                                                                        name="order_id"

                                                                        value="<?php echo $row['id']; ?>">

                                                                    <label class="form-label">

                                                                        Reason

                                                                    </label>

                                                                    <select

                                                                        name="cancel_reason"

                                                                        id="reason<?php echo $row['id']; ?>"

                                                                        class="form-select"

                                                                        onchange="toggleReason(<?php echo $row['id']; ?>)"

                                                                        required>

                                                                        <option value="">

                                                                            Select Reason

                                                                        </option>

                                                                        <option value="Not Pickup Call">

                                                                            Not Pickup Call

                                                                        </option>

                                                                        <option value="Product Damage">

                                                                            Product Damage

                                                                        </option>

                                                                        <option value="Other">

                                                                            Other

                                                                        </option>

                                                                    </select>

                                                                    <div

                                                                        id="otherReason<?php echo $row['id']; ?>"

                                                                        style="display:none;"

                                                                        class="mt-3">

                                                                        <textarea

                                                                            name="cancel_note"

                                                                            class="form-control"

                                                                            rows="3"

                                                                            placeholder="Enter cancellation reason">

                        </textarea>

                                                                    </div>

                                                                </div>

                                                                <div class="modal-footer">

                                                                    <button

                                                                        type="submit"

                                                                        name="cancel_order"

                                                                        class="btn btn-danger">

                                                                        Confirm Cancel

                                                                    </button>

                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>

                                                </div>

                                            <?php

                                            }
                                        } else {

                                            ?>

                                            <tr>

                                                <td colspan="8"

                                                    class="text-center">

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


    <script>

function toggleReason(id){

    var reason = document.getElementById(

        'reason' + id

    ).value;

    var other = document.getElementById(

        'otherReason' + id

    );

    if(reason == 'Other'){

        other.style.display = 'block';

    }else{

        other.style.display = 'none';

    }

}

</script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>