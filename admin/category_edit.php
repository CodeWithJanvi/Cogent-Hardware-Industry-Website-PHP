<?php
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');

$Id = $_GET['Id'];
$res = mysqli_query($conn, "SELECT * FROM category WHERE id = $Id");
$result = mysqli_fetch_array($res);

if (isset($_POST['edit'])) {
    $category_name = $_POST['category_name'];

    if (is_uploaded_file($_FILES['category_image']['tmp_name'])) {
        $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];

        if (in_array($_FILES['category_image']['type'], $allowedTypes)) {
            $img_name = rand(100, 999) . '_' . preg_replace("/[^a-zA-Z0-9\._]/", "", $_FILES['category_image']['name']);
            $uploadPath = "Uploads/" . $img_name;

            $query = "UPDATE category SET category_name='$category_name', category_image='$img_name' WHERE id='$Id'";
            $update = mysqli_query($conn, $query);

            if ($update && move_uploaded_file($_FILES['category_image']['tmp_name'], $uploadPath)) {
?>
                <script>
                    alert("Category updated successfully with image.");
                    window.location = "./category.php";
                </script>
<?php
            } else {
?>
                <script>
                    alert("Image upload failed or DB update error.");
                    window.location = "./category.php";
                </script>
<?php
            }
        } else {
?>
            <script>
                alert("Only JPG, JPEG, PNG formats are allowed.");
                window.location = "./category.php";
            </script>
<?php
        }
    } else {
        $query = "UPDATE category SET category_name='$category_name' WHERE id='$Id'";
        $update = mysqli_query($conn, $query);

        if ($update) {
?>
            <script>
                alert("Category updated successfully.");
                window.location = "./category.php";
            </script>
<?php
        } else {
?>
            <script>
                alert("Update failed.");
                window.location = "./category.php";
            </script>
<?php
        }
    }
}
?>

<!-- Content Wrapper -->
<div class="content-wrapper" style="min-height: 1289.9px;">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Edit Category</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Manage Category</h3>
        </div>

        <form class="form-horizontal" method="post" enctype="multipart/form-data">
          <div class="card-body">
            <div class="form-group">
              <label>Category Name</label>
              <input type="text" class="form-control" name="category_name" value="<?php echo $result['category_name']; ?>">
            </div>

            <div class="form-group">
              <label>Category Image</label><br>
              <small>(Only jpg/jpeg/png allowed)</small><br>
              <img src="Uploads/<?php echo $result['category_image']; ?>" height="100px"><br><br>
              <input type="file" name="category_image">
            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-info" name="edit">Update</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<?php include('includes/footer.php'); ?>
