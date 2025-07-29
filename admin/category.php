<?php
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');

// Insert Category
if (isset($_POST['btn'])) {
    $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
    $allowedFileTypes = ['image/png', 'image/jpeg', 'image/jpg'];

    if (!empty($_FILES['category_image']['name'])) {
        $imageType = $_FILES['category_image']['type'];

        if (in_array($imageType, $allowedFileTypes)) {
            $filename = basename($_FILES['category_image']['name']);
            $category_image = rand(1000, 9999) . '_' . preg_replace("/[^a-zA-Z0-9\._]/", "", $filename);
            $uploadPath = "Uploads/" . $category_image;

            if (move_uploaded_file($_FILES['category_image']['tmp_name'], $uploadPath)) {
                $query = "INSERT INTO category(category_name, category_image) VALUES('$category_name', '$category_image')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    echo "<script>alert('Category inserted successfully.'); window.location='category.php';</script>";
                } else {
                    echo "<script>alert('Database error while inserting.'); window.location='category.php';</script>";
                }
            } else {
                echo "<script>alert('Failed to upload image.'); window.location='category.php';</script>";
            }
        } else {
            echo "<script>alert('Only JPG, JPEG, PNG formats are allowed.'); window.location='category.php';</script>";
        }
    } else {
        echo "<script>alert('Please select a category image.'); window.location='category.php';</script>";
    }
}

// Delete Category
if (isset($_GET['Id'])) {
    $Id = intval($_GET['Id']);

    $getImg = mysqli_fetch_assoc(mysqli_query($conn, "SELECT category_image FROM category WHERE id = $Id"));
    $img_del = $getImg['category_image'];

    if (!empty($img_del) && file_exists("Uploads/" . $img_del)) {
        unlink("Uploads/" . $img_del);
    }

    $deleteQuery = "DELETE FROM category WHERE id = $Id";
    $deleted = mysqli_query($conn, $deleteQuery);

    if ($deleted) {
        echo "<script>alert('Category deleted successfully.'); window.location='category.php';</script>";
    } else {
        echo "<script>alert('Error occurred while deleting.'); window.location='category.php';</script>";
    }
}
?>

<!-- HTML Starts -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Category</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Form Card -->
                    <div class="card card-info">
                        <div class="card-header"><h3 class="card-title">Add Category</h3></div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="category_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Category Image</label><br>
                                    <small>(Only jpg/jpeg/png allowed)</small><br>
                                    <input type="file" name="category_image" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" name="btn" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>

                    <!-- Table Card -->
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Category List</h3></div>
                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Category Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $res = mysqli_query($conn, "SELECT * FROM category");
                                        $co = 1;
                                        while ($rec = mysqli_fetch_array($res)) {
                                            echo "<tr>
                                                    <td>{$co}</td>
                                                    <td><img src='Uploads/{$rec['category_image']}' width='100px'></td>
                                                    <td>{$rec['category_name']}</td>
                                                    <td><a href='category_edit.php?Id={$rec['id']}' class='btn btn-info btn-sm'><i class='fas fa-pencil-alt'></i> Edit</a></td>
                                                    <td><a href='category.php?Id={$rec['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'><i class='fas fa-trash'></i> Delete</a></td>
                                                  </tr>";
                                            $co++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('includes/footer.php'); ?>

<script>
$(function () {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false
    });
});
</script>
