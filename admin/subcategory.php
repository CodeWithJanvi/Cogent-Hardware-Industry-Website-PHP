<?php
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');

// Insert subcategory
if (isset($_POST['btn'])) {
    $cat_id = $_POST['cat_id'];
    $sub_name = $_POST['sub_name'];
    $description = $_POST['description'];
    $allowedFileTypeImage = ['image/png', 'image/jpeg', 'image/jpg'];

    if (in_array($_FILES['image']['type'], $allowedFileTypeImage)) {
        $image = rand(100, 999) . '_' . preg_replace("/[^a-zA-Z0-9\.]/", "_", $_FILES['image']['name']);
        $file_type = $_FILES['image']['tmp_name'];

        $query = "INSERT INTO `subcategory`(`cat_id`, `sub_name`, `image`, `description`) VALUES ('$cat_id','$sub_name','$image','$description')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            move_uploaded_file($file_type, "../Uploads/" . $image);
            echo "<script>alert('Sub Category Inserted successfully.'); window.location = './subcategory.php';</script>";
        } else {
            echo "<script>alert('Error occurred while inserting subcategory.'); window.location = './subcategory.php';</script>";
        }
    } else {
        echo "<script>alert('Image format should be either jpg/jpeg/png'); window.location = './subcategory.php';</script>";
    }
}

// Delete subcategory
if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $getImg = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM subcategory WHERE id = $Id"));
    $img_del = $getImg['image'];

    if (file_exists("../Uploads/" . $img_del)) {
        unlink("../Uploads/" . $img_del);
    }

    $delete = "DELETE FROM subcategory WHERE id = $Id";
    $query2 = mysqli_query($conn, $delete);

    if ($query2) {
        echo "<script>alert('Sub Category deleted Successfully.'); window.location = 'subcategory.php';</script>";
    } else {
        echo "<script>alert('Error occurred while deleting subcategory.');</script>";
    }
}

$res = mysqli_query($conn, "SELECT * FROM subcategory");
?>

<!-- Content Wrapper -->
<div class="content-wrapper" style="min-height: 1289.9px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Sub Category</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sub Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Form Section -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Subcategory Form -->
                    <div class="card card-info">
                        <div class="card-header"><h3 class="card-title">Add Sub Category</h3></div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="form-control" name="cat_id" required>
                                        <option value="">Select Category</option>
                                        <?php
                                        $response = mysqli_query($conn, "SELECT * FROM category");
                                        while ($row = mysqli_fetch_array($response)) {
                                            echo "<option value='{$row['id']}'>{$row['category_name']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="sub_name" required>
                                </div>

                                <div class="form-group">
                                    <label>Category Image <small>(jpg/jpeg/png only)</small></label>
                                    <input type="file" class="" name="image" required>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info" name="btn">Submit</button>
                            </div>
                        </form>
                    </div>

                    <!-- Subcategory Table -->
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Sub Category List</h3></div>
                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Category Name</th>
                                            <th>Sub Category</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $co = 1;
                                        while ($rec = mysqli_fetch_array($res)) {
                                            $cat = mysqli_fetch_array(mysqli_query($conn, "SELECT category_name FROM category WHERE id = '{$rec['cat_id']}'"));
                                            ?>
                                            <tr>
                                                <td><?php echo $co++; ?></td>
                                                <td><img src="../Uploads/<?php echo $rec['image']; ?>" alt="" width="100px"></td>
                                                <td><?php echo $cat['category_name']; ?></td>
                                                <td><?php echo $rec['sub_name']; ?></td>
                                                <td>
                                                    <a href="./subcategory_edit.php?Id=<?php echo $rec['id']; ?>" class="btn btn-info btn-sm">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="./subcategory.php?Id=<?php echo $rec['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- /.card -->
                </div> <!-- /.col -->
            </div> <!-- /.row -->
        </div> <!-- /.container-fluid -->
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
