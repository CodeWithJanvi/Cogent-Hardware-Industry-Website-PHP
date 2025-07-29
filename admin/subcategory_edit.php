<?php
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');

$Id = intval($_GET['Id']); // Safety: prevent SQL injection

// Fetch existing data
$res = mysqli_query($conn, "SELECT * FROM subcategory JOIN category ON subcategory.cat_id = category.id WHERE subcategory.id = $Id");
$result = mysqli_fetch_array($res);

if (isset($_POST['edit'])) {
    $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
    $sub_name = mysqli_real_escape_string($conn, $_POST['sub_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // If a new image is uploaded
    if (!empty($_FILES['image']['name'])) {
        $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];
        $imageType = $_FILES['image']['type'];

        if (in_array($imageType, $allowedTypes)) {
            $old_image = $result['image'];
            if (file_exists("Uploads/$old_image")) {
                unlink("Uploads/$old_image"); // delete old image
            }

            $new_img_name = rand(1000, 9999) . "_" . basename($_FILES['image']['name']);
            $uploadPath = "Uploads/" . $new_img_name;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadPath)) {
                $query = "UPDATE subcategory SET cat_id='$cat_id', sub_name='$sub_name', image='$new_img_name', description='$description' WHERE id='$Id'";
                $update = mysqli_query($conn, $query);

                if ($update) {
                    echo "<script>alert('Subcategory updated with image.'); window.location='subcategory.php';</script>";
                } else {
                    echo "<script>alert('Database update failed.');</script>";
                }
            } else {
                echo "<script>alert('Failed to upload image.');</script>";
            }
        } else {
            echo "<script>alert('Only JPG, JPEG, PNG formats allowed.');</script>";
        }
    } else {
        // Update without image
        $query = "UPDATE subcategory SET cat_id='$cat_id', sub_name='$sub_name', description='$description' WHERE id='$Id'";
        $update = mysqli_query($conn, $query);

        if ($update) {
            echo "<script>alert('Subcategory updated successfully.'); window.location='subcategory.php';</script>";
        } else {
            echo "<script>alert('Database update failed.');</script>";
        }
    }
}
?>

<!-- HTML below -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Edit Subcategory</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Subcategory</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header"><h3 class="card-title">Manage Subcategory</h3></div>
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Select Category</label>
                            <select class="form-control" name="cat_id" required>
                                <option value="">Select Category</option>
                                <?php
                                $categories = mysqli_query($conn, "SELECT * FROM category");
                                while ($cat = mysqli_fetch_array($categories)) {
                                    $selected = ($cat['id'] == $result['cat_id']) ? 'selected' : '';
                                    echo "<option value='{$cat['id']}' $selected>{$cat['category_name']}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Subcategory Name</label>
                            <input type="text" class="form-control" name="sub_name" value="<?php echo htmlspecialchars($result['sub_name']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Subcategory Image</label><br>
                            <small>(Only jpg/jpeg/png allowed)</small><br>
                            <?php if (!empty($result['image'])): ?>
                                <img src="Uploads/<?php echo $result['image']; ?>" height="100px"><br><br>
                            <?php endif; ?>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description"><?php echo htmlspecialchars($result['description']); ?></textarea>
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
