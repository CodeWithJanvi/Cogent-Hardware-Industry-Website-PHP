<?php
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');

?>

<?php

$res2 = mysqli_query($conn, "SELECT * FROM category");

if (isset($_POST['addProduct'])) 
{
    $cat_name = $_POST['cat_name'];
    $sub_cat = $_POST['sub_cat'];
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    
    $sql = "INSERT INTO `product`(`product_name`, `cat_name`, `sub_cat`, `description`,`product_image`) VALUES ('$product_name','$cat_name','$sub_cat','$description','".$_FILES['product_image']['name'][0]."')";
    $result = mysqli_query($conn, $sql);
    $last_pid = mysqli_insert_id($conn);
    $uploadsDir = "Uploads/";
    $allowedFileType = array('jpg','png','jpeg');
        
        // Validate if files exist
        if (!empty(array_filter($_FILES['product_image']['name']))) {
            
            // Loop through file items
            foreach($_FILES['product_image']['name'] as $id=>$val){
                // Get files upload path
                $fileName        = $_FILES['product_image']['name'][$id];
                $tempLocation    = $_FILES['product_image']['tmp_name'][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                if(in_array($fileType, $allowedFileType)){
                        if(move_uploaded_file($tempLocation, $targetFilePath)){
                            $sqlVal = "('".$fileName."', '".$last_pid."')";
                        } else {
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                        }
                    
                } else {
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                }
                // Add into MySQL database
                if(!empty($sqlVal)) {
                    $insert = $conn->query("INSERT INTO product_images (image,product_id) VALUES $sqlVal");
                    if($insert) {
                        $response = array(
                            "status" => "alert-success",
                            "message" => "Files successfully uploaded."
                        );
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Files coudn't be uploaded due to database error."
                        );
                    }
                }
            }
        } else {
            // Error
            $response = array(
                "status" => "alert-danger",
                "message" => "Please select a file to upload."
            );
        }
            if ($result) 
            {
                

                ?>
                    <script>
                        alert("Record added successfully");
                        window.location = "./product.php";
                    </script>
                <?php
        
            }
            else 
            {
                echo mysqli_error($conn);
                ?>
                    <script>
                        alert("Error Occured while inserting record.");
                        window.location = "./product.php";
                    </script>
                <?php
            }

}

if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
    //$getImage = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * from product WHERE id = $id"));
   // $img_del =$getImage['product_image'];
    $Delete = "DELETE FROM product  WHERE id=$id";
    $query2 = mysqli_query($conn, $Delete);
    if ($query2) {
       // unlink("upload/".$img_del);
    ?>
        <script>
            window.onload = function() {
                alert("Delete Successfully");
                window.location = "product.php";
            }
        </script>
    <?php
    } else {
    ?>
        <script>
            window.onload = function() {
                alert("Not Successfully Deleted");
                window.location = "product.php";

            }
        </script>
      
    <?php
    }
}


?>
<div class="content-wrapper" style="min-height: 1289.9px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Add Products</h3>
                        </div>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                            
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" id="cat_drpdwn" name="cat_name" required>
                                        <option value="">Select category</option>
                                        <?php
                                        while ($rec2 = mysqli_fetch_array($res2)) {
                                        ?>
                                            <option value="<?php echo $rec2['id']; ?>"><?php echo $rec2['category_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group" id="">
                                    <label>SubCategory</label>
                                    <select class="form-control" id="sub_cat_drpdwn" name="sub_cat" required>
                                        <option>Select Subcategory</option>
                                     </select>
                                </div>

                                <div class="form-group row">
                                    <div class="form-group col-md-12">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control " name="product_name" placeholder="Product Name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Product Image</label>
                                        <small>( Upload jpg/jpeg/png type Image only.)</small>
                                        <br>
                                        <input type="file" class="form-control" name="product_image[]" multiple required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-md-12">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" id="summernote" cols="10" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            

                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info" name="addProduct">Submit</button>

                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>

                    
                </div>
            </div>
    </section>
</div>

<script>
    // $('#sub').hide();
    // $('#SelectCategory').on("change", function()
    // {
    //     var i = $(this).find(":selected").data('cat_name');
    //     var j = i.toUpperCase();
    //     console.log(j);
    //     if(j == "CAKE")
    //     {
    //         $('#sub').show();
    //     }
    // });
</script>

<?php
    include('includes/footer.php');
?>
<script>
    $(document).ready(function()
    {
        $('#cat_drpdwn').on('change', function()
        {
            var category_id = this.value;
            console.log(category_id)
            $.ajax({
                url: "getsubcat.php",
                type: "POST",
                data: {
                    category_id: category_id
                },
                cache: false,
                success: function(result){
                $("#sub_cat_drpdwn").html(result);
                }
            });
        });
    });
</script>

 
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


<script src="plugins/summernote/summernote-bs4.min.js"></script>

<script> $('#summernote').summernote({height:200})</script>
