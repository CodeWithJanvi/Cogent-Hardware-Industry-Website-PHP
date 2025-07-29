<style type="text/css">
    thead, tfoot {
    display: table-header-group;
}

</style>
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
    $uploadsDir = "upload/";
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
            
            <div class="row">
                <div class="col-md-12">
                    
                    <input type="button" style="float:right;background-color:#17a2b8;color: #fff;" onclick="location.href='add_product.php'" value="Add Product">
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Products</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <table id="example1" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Product Category</th>
                                            <th>Product Sub Category</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tfoot class="search">
                                        <th></th>
                                        <th></th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Description</th>
                                        <th></th>
                                        <th></th>
                                    </tfoot>
                                    <tbody>
                                        <?php

                                        $join = "SELECT product.*,category.*,product.id AS iid FROM product JOIN category ON product.cat_name = category.id";
                                        
                                        $res3 = mysqli_query($conn, $join);

                                        $co = 1;
                                        while($rec3 = mysqli_fetch_array($res3)) 
                                        {
                                            $sub = mysqli_fetch_array(mysqli_query($conn, "select * from subcategory where id = '".$rec3['sub_cat']."' "));
                                        ?>
                                            <tr>
                                                <td><?php echo $co; ?></td>
                                                <td>
    <?php
        // Show main product image (from product table)
        if (!empty($rec3['product_image'])) {
            echo '<img src="Uploads/' . $rec3['product_image'] . '" style="height: 50px; width:50px; margin:2px;">';
        }

    ?>
</td>
                                                <td><?php echo $rec3['product_name']; ?></td>
                                                <td><?php echo $rec3['category_name']; ?></td>
                                                <td><?php if($rec3['sub_cat'] != 0) { echo $sub['sub_name']; } ?></td>
                                                <td><?php echo $rec3['description']; ?></td>
                                                <!-- <td><?php //echo $rec3['product_price']; ?> Rs.</td>
                                                <td><?php //echo $rec3['product_discount']; ?> %</td>
                                                <td><?php //echo ($rec3['product_price'] -($rec3['product_discount'] /100)*$rec3['product_price']) ?> Rs.</td> -->
                                                <td><a class="btn btn-primary btn-sm" href="p_edit.php?id=<?php echo $rec3['iid']; ?>"><i class="fas fa-pencil-alt"> </i></a></td>
                                                <td><a class="btn btn-danger btn-sm" name="del" href="product.php?id=<?php echo $rec3['iid']; ?>" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash"> </i> </a></td>
                                            </tr>

                                        <?php
                                            $co++;
                                        }
                                        ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>


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
    $(document).ready(function(){
        $('#example1 .search th').each(function () {
            var title = $(this).text();
            if(title)
            {
                $(this).html('<input type="text" class="input_text form-control" placeholder="Search ' + title + '" />');
            }
        });
        $('#example1').DataTable({
            initComplete: function () {
                // Apply the search
                this.api()
                    .columns()
                    .every(function () {
                        var that = this;
                        $('.input_text', this.footer()).on('keyup change clear', function () {
                            if (that.search() !== this.value) {
                                that.search(this.value).draw();
                            }
                        });
                    });
            },
            
        });
    });
</script>
 
<!--<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
</script>-->


<script src="plugins/summernote/summernote-bs4.min.js"></script>

<script> $('#summernote').summernote({height:200})</script>
