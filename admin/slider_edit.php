<?php
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');

$Id = $_GET['Id'];
$res = mysqli_query($conn, "SELECT * FROM slider WHERE id = $Id");
$result = mysqli_fetch_array($res);

if (isset($_POST['edit'])) {
    // Check if a file is uploaded
    if (is_uploaded_file($_FILES['slider_image']['tmp_name'])) {
        $allowedFileTypeImage = ['image/png', 'image/jpeg', 'image/jpg'];

        if (in_array($_FILES['slider_image']['type'], $allowedFileTypeImage)) {
            $img_name = rand(1000, 9999) . "_" . basename($_FILES['slider_image']['name']);
            $tmp_name = $_FILES['slider_image']['tmp_name'];
            $upload_path = "upload/" . $img_name;

            // Delete old image
            $old_image = $result['slider_image'];
            if (file_exists("upload/" . $old_image)) {
                unlink("upload/" . $old_image);
            }

            if (move_uploaded_file($tmp_name, $upload_path)) {
                $query = "UPDATE slider SET slider_image='$img_name' WHERE id=$Id";
                $result_update = mysqli_query($conn, $query);

                if ($result_update) {
                    echo "<script>alert('Slider updated successfully.'); window.location='slider.php';</script>";
                } else {
                    echo "<script>alert('Error updating slider.'); window.location='slider.php';</script>";
                }
            } else {
                echo "<script>alert('Failed to upload image.'); window.location='slider.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid image format. Only JPG, JPEG, PNG allowed.'); window.location='slider.php';</script>";
        }
    } else {
        // No image selected, no update performed
        echo "<script>alert('No image selected.'); window.location='slider.php';</script>";
    }
}
?>

<div class="content-wrapper" style="min-height: 1289.9px;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Slider</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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

          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Update Slider</h3>
            </div>

            <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="card-body">

                <input type="hidden" name="Id" value="<?php echo $result['id']; ?>">

                <div class="form-group">
                  <label>Slider Image</label>
                  <small>(Upload JPG, JPEG, PNG only)</small><br>
                  <img src="upload/<?php echo $result['slider_image']; ?>" alt="" height="100px"><br><br>
                  <input type="file" name="slider_image">
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-info" name="edit">Update</button>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </section>
</div>

<?php include('includes/footer.php'); ?>
