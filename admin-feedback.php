<?php

include 'connect.php';

/* Add Feedback */

if (isset($_POST['add_feedback'])) {

    $customer_name = $_POST['customer_name'];

    $rating = $_POST['rating'];

    $message = $_POST['message'];

    $image = $_FILES['image']['name'];

    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file(

        $tmp_name,

        "uploads/" . $image

    );

    mysqli_query(

        $conn,

        "INSERT INTO feedback(

        customer_name,
        image,
        rating,
        message

        )

        VALUES(

        '$customer_name',
        '$image',
        '$rating',
        '$message'

        )"

    );

    header("Location: admin-feedback.php");

    exit();
}

/* Delete Feedback */

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $get_image = mysqli_query(

        $conn,

        "SELECT image

        FROM feedback

        WHERE id='$id'"

    );

    $row = mysqli_fetch_assoc($get_image);

    if (!empty($row['image'])) {

        unlink("uploads/" . $row['image']);
    }

    mysqli_query(

        $conn,

        "DELETE FROM feedback

        WHERE id='$id'"

    );

    header("Location: admin-feedback.php");

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

                        <a href="admin-feedback.php"
                            class="nav-link text-white bg-primary">

                            <i class="bi bi-chat-left-text"></i>
                            feedback

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
                <div class="container mt-5">

                    <div class="card shadow mb-4">

                        <div class="card-body">

                            <h3 class="mb-4">

                                Add Feedback

                            </h3>

                            <form method="POST" enctype="multipart/form-data">

                                <input type="text"
                                    name="customer_name"
                                    class="form-control mb-3"
                                    placeholder="Customer Name"
                                    required>

                                <input type="file"
                                    name="image"
                                    class="form-control mb-3"
                                    required>

                                <select
                                    name="rating"
                                    class="form-select mb-3"
                                    required>

                                    <option value="">Select Rating</option>
                                    <option value="5">★★★★★</option>
                                    <option value="4">★★★★☆</option>
                                    <option value="3">★★★☆☆</option>
                                    <option value="2">★★☆☆☆</option>
                                    <option value="1">★☆☆☆☆</option>

                                </select>

                                <textarea
                                    name="message"
                                    class="form-control mb-3"
                                    placeholder="Customer Feedback"
                                    required></textarea>

                                <button
                                    type="submit"
                                    name="add_feedback"
                                    class="btn btn-dark">

                                    Add Feedback

                                </button>

                            </form>

                        </div>

                    </div>

                    <div class="card shadow">

                        <div class="card-body">

                            <h3 class="mb-4">

                                All Feedback

                            </h3>

                            <div class="table-responsive">

                                <table class="table table-bordered table-hover">

                                    <thead class="table-dark">

                                        <tr>

                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Customer</th>
                                            <th>Rating</th>
                                            <th>Feedback</th>
                                            <th>Action</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php

                                        $query = mysqli_query(

                                            $conn,

                                            "SELECT *

                        FROM feedback

                        ORDER BY id DESC"

                                        );

                                        while ($row = mysqli_fetch_assoc($query)) {

                                        ?>

                                            <tr>

                                                <td>

                                                    <?php echo $row['id']; ?>

                                                </td>
                                                <td>

                                                    <img src="uploads/<?php echo $row['image']; ?>"

                                                        width="60"

                                                        height="60"

                                                        style="object-fit:cover;border-radius:50%;">

                                                </td>

                                                <td>

                                                    <?php echo $row['customer_name']; ?>

                                                </td>

                                                <td>

                                                    <?php echo $row['rating']; ?>/5

                                                </td>

                                                <td>

                                                    <?php echo $row['message']; ?>

                                                </td>

                                                <td>

                                                    <a href="?delete=<?php echo $row['id']; ?>"

                                                        class="btn btn-danger btn-sm"

                                                        onclick="return confirm('Delete this feedback?')">

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

        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>