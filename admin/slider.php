<?php
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');
?>

<?php
$res = mysqli_query($conn, "SELECT * FROM slider");

if (isset($_POST['btn'])) {
    $allowedFileTypeImage = ['image/png', 'image/jpeg', 'image/jpg'];
    $fileType = $_FILES['slider_image']['type'];
    $fileTmp = $_FILES['slider_image']['tmp_name'];
    $fileName = $_FILES['slider_image']['name'];

    if (in_array($fileType, $allowedFileTypeImage)) {
        $newFileName = rand(1000, 9999) . "_" . basename($fileName);
        $targetDir = "Uploads/" . $newFileName;

        if (move_uploaded_file($fileTmp, $targetDir)) {
            $query = "INSERT INTO slider(slider_image) VALUES('$newFileName')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<script>alert('Slider inserted successfully.'); window.location='slider.php';</script>";
            } else {
                echo "<script>alert('Database error while inserting slider.'); window.location='slider.php';</script>";
            }
        } else {
            echo "<script>alert('Failed to upload image.'); window.location='slider.php';</script>";
        }
    } else {
        echo "<script>alert('Only JPG, JPEG, PNG images are allowed.'); window.location='slider.php';</script>";
    }
}

if (isset($_GET['Id'])) {
    $Id = $_GET['Id'];
    $getImg = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM slider WHERE id = $Id"));
    $img_del = $getImg['slider_image'];

    if (file_exists("Uploads/" . $img_del)) {
        unlink("Uploads/" . $img_del);
    }

    $Delete = "DELETE FROM slider WHERE id=$Id";
    $query2 = mysqli_query($conn, $Delete);

    if ($query2) {
        echo "<script>window.onload = function () { alert('Slider deleted successfully.'); window.location = 'slider.php'; }</script>";
    } else {
        echo "<script>window.onload = function () { alert('Error occurred while deleting slider.'); }</script>";
    }
}
?>

<div class="content-wrapper" style="min-height: 1289.9px;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Slider</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Slider</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <!-- Form -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Add New Slider</h3>
            </div>

            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label>Slider Image</label>
                  <small>(Upload JPG, JPEG, PNG only)</small>
                  <br>
                  <input type="file" class="" name="slider_image" required>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-info" name="btn">Submit</button>
              </div>
            </form>
          </div>

          <!-- Table -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Sliders</h3>
            </div>
            <div class="card-body">
              <div style="overflow-x:auto;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Slider Image</th>
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
                      <td><img src="Uploads/<?php echo $rec['slider_image']; ?>" alt="slider image" width="100px"></td>
                      <td>
                        <a href="./slider_edit.php?Id=<?php echo $rec['id']; ?>" class="btn btn-info btn-sm">
                          <i class="fas fa-pencil-alt"></i> Edit
                        </a>
                      </td>
                      <td>
                        <a href="./slider.php?Id=<?php echo $rec['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                          <i class="fas fa-trash"></i> Delete
                        </a>
                      </td>
                    </tr>
                    <?php $co++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

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
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
