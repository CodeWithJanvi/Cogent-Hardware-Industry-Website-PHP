<?php
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');
?>

<?php
$res = mysqli_query($conn, "SELECT * FROM what_say");

if (isset($_POST['btn'])) {
    $name = $_POST['name'];
    $bussiness = $_POST['bussiness'];
    $description = $_POST['description'];

    $allowedFileTypeImage = ['image/png', 'image/jpeg', 'image/jpg'];

    if (isset($_FILES['image']) && in_array($_FILES['image']['type'], $allowedFileTypeImage)) {
        $image = rand(1000, 9999) . "_" . basename($_FILES['image']['name']);
        $file_type = $_FILES['image']['tmp_name'];

        $uploadPath = "Uploads/" . $image;

        $query = "INSERT INTO `what_say`(`name`, `bussiness`, `description`, `image`) VALUES ('$name','$bussiness','$description','$image')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            move_uploaded_file($file_type, $uploadPath);
            echo "<script>alert('Inserted successfully.'); window.location = './what_say.php';</script>";
        } else {
            echo "<script>alert('Error occurred while inserting.'); window.location = './what_say.php';</script>";
        }
    } else {
        echo "<script>alert('Image format should be either jpg/jpeg/png'); window.location = './what_say.php';</script>";
    }
}

// Delete logic
if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $getImg = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM what_say WHERE id = $Id"));

    if ($getImg) {
        $img_del = $getImg['image'];
        if (file_exists("Uploads/" . $img_del)) {
            unlink("Uploads/" . $img_del);
        }

        $Delete = "DELETE FROM what_say WHERE id=$Id";
        $query2 = mysqli_query($conn, $Delete);

        if ($query2) {
            echo "<script>window.onload = function () { alert('Deleted Successfully.'); window.location = 'what_say.php'; }</script>";
        } else {
            echo "<script>window.onload = function () { alert('Error occurred while deleting.'); window.location = 'what_say.php'; }</script>";
        }
    }
}
?>

<!-- HTML Content -->
<div class="content-wrapper" style="min-height: 1289.9px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>What Client Say</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">What Client Say</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">What Client Say</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div><label>Name</label><input type="text" class="form-control" name="name" required></div>
                                <div><label>Business</label><input type="text" class="form-control" name="bussiness" required></div>
                                <div><label>Description</label><textarea name="description" class="form-control" required></textarea></div>
                                <div class="form-group">
                                    <label>Image (Photo)</label>
                                    <small>(Upload jpg/jpeg/png only.)</small><br>
                                    <input type="file" class="" name="image" required>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info" name="btn">Submit</button>
                            </div>
                        </form>
                    </div>

                    <!-- Display Table -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">What Client Say</h3>
                        </div>
                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Image</th>
                                            <th>Client Name</th>
                                            <th>Business</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $co = 1;
                                        while ($rec = mysqli_fetch_array($res)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $co; ?></td>
                                                <td><img src="Uploads/<?php echo $rec['image']; ?>" alt="" width="100px"></td>
                                                <td><?php echo $rec['name']; ?></td>
                                                <td><?php echo $rec['bussiness']; ?></td>
                                                <td><?php echo $rec['description']; ?></td>
                                                <td><a href="what_say_edit.php?Id=<?php echo $rec['id']; ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a></td>
                                                <td><a href="what_say.php?Id=<?php echo $rec['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this entry?');"><i class="fas fa-trash"></i> Delete</a></td>
                                            </tr>
                                        <?php $co++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- card -->
                </div> <!-- col -->
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
</div>

<?php include('includes/footer.php'); ?>

<!-- DataTable JS -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false
    });
  });
</script>
