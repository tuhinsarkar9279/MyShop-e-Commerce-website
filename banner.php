<?php

include 'connect.php';

/* Add Banner */
if(isset($_POST['add_banner'])){

    $image =
    $_FILES['banner_image']['name'];

    $tmp_name =
    $_FILES['banner_image']['tmp_name'];

    move_uploaded_file(
        $tmp_name,
        "uploads/".$image
    );

    mysqli_query($conn,
    "INSERT INTO banners(image)
    VALUES('$image')"
    );
}

/* Delete Banner */
if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    /* Fetch Image */
    $fetch =
    mysqli_query($conn,

    "SELECT * FROM banners
    WHERE id='$id'"

    );

    $data =
    mysqli_fetch_assoc($fetch);

    /* Delete Banner */
if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    /* Fetch Banner */
    $fetch = mysqli_query(
        $conn,
        "SELECT * FROM banners WHERE id='$id'"
    );

    /* Check Banner Exists */
    if(mysqli_num_rows($fetch) > 0){

        $data = mysqli_fetch_assoc($fetch);

        /* Delete Image File */
        if(!empty($data['image']) &&
            file_exists("uploads/".$data['image'])){

            unlink("uploads/".$data['image']);

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

    <title>

        Banner Management

    </title>

    <!-- Bootstrap CSS -->
    <link href=
    "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container py-5">

        <!-- Heading -->
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
            mysqli_query($conn,

            "SELECT * FROM banners"

            );

            while($row =
            mysqli_fetch_assoc($query)){

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

    <!-- Add Banner Modal -->
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
    <script src=
    "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>