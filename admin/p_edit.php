<?php
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');

?>


<?php

$id = $_GET['id'];

$join = "SELECT * FROM product JOIN category ON product.cat_name = category.id where product.id='$id'";
$res = mysqli_query($conn, $join);
$product = mysqli_fetch_array($res);


$res1 = mysqli_query($conn, "SELECT * FROM subcategory");
$res2 = mysqli_query($conn, "SELECT * FROM category");


if (isset($_POST['updateProduct'])) {
    
    $cat_name = $_POST['cat_name'];
    $sub_cat = $_POST['sub_cat'];
    $product_name = $_POST['product_name'];
    // $p_price = $_POST['p_price'];
    $description = $_POST['description'];

    if(is_uploaded_file($_FILES['product_image']['tmp_name'])){
        $allowedFileTypeImage = ['image/png', 'image/jpeg','image/jpg'];

        $img_name = rand(0,999).$_FILES['product_image']['name'];
        $file_type = $_FILES['product_image']['tmp_name'];

        if(in_array($_FILES['product_image']['type'], $allowedFileTypeImage)){

                $sql = "UPDATE `product` SET `product_name`='$product_name',`cat_name`='$cat_name',`sub_cat`='$sub_cat',`product_image`='$img_name',`description`='$description' WHERE `id`='$id'";
                // $update = mysqli_query($conn,$sql);
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    move_uploaded_file($file_type, "upload/" . $img_name);
                    ?>
                        <script>
                            alert("Updated successfully");
                            window.location = "./product.php";
                        </script>
                    <?php
            
                }else {
                    echo mysqli_error($conn);
                    ?>
                        <script>
                            alert("Error Occured while updating record.");
                            window.location = "./product.php";
                        </script>
                    <?php
                }
            /*}
            else{
                ?>
                    <script>
                        alert("please upload image of given size.")
                        window.location = "./product.php";
                    </script>
                <?php
            }*/
        }
        else{
            ?>
                <script>
                    alert("Please upload image of valid format.")
                    window.location = "./product.php";
                </script>
            <?php
        }
        
    }else{
        $update = mysqli_query($conn,"UPDATE `product` SET `product_name`='$product_name',`cat_name`='$cat_name',`sub_cat`='$sub_cat',`description`='$description' WHERE `id`='$id'");

        if($update){
            ?>
                <script>
                    alert("product updated")
                    window.location = "./product.php";
                </script>
            <?php 
        }
        else{
            ?>
                <script>
                    alert("Error Occured")
                    window.location = "./product.php";
                </script>
            <?php 
        }
    }
}       
?>


<!DOCTYPE html>
<html lang="en">
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
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Manage Product</h3>
                            </div>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" id="SelectCategory" name="cat_name" required data-p_id = <?php echo $id; ?>>
                                            <option value="">Select Category</option>
                                            <?php
                                            while($rec2 = mysqli_fetch_array($res2)) 
                                            {
                                            ?>
                                                <option value="<?php echo $rec2['id']; ?>" <?php if($rec2['id'] == $product['cat_name']) { ?> selected <?php } ?> data-cat_name="<?php echo $rec2['category_name']; ?>" ><?php echo $rec2['category_name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group" id="">
                                    <label>SubCategory</label>
                                    <select class="form-control" id="" name="sub_cat">
                                        <option value="">Select Sub category</option>
                                        <?php
                                        $sub = mysqli_query($conn, "SELECT * FROM subcategory");
                                        while ($rec = mysqli_fetch_array($sub)) 
                                        {
                                        ?>
                                            <option value="<?php echo $rec['id']; ?>" <?php if($rec['id']==$product['sub_cat']) { ?> selected <?php } ?> > <?php echo $rec['sub_name']; ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
     
                                    <div class="form-group row">
                                        <div class="form-group col-md-6">
                                            <label>Product Name</label>
                                            <input type="text" class="form-control" name="product_name" placeholder="Product Name" value="<?php echo $product['product_name']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <div class="form-group col-md-12">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description" placeholder="Description" id="summernote" cols="10"><?php echo $product['description']; ?></textarea>
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                        

                                        <div class="col-md-6">
                                            <label>Product Image</label>
                                            <small>(Upload jpg/jpeg/png type Image only.)</small>
                                            <br>
                                            <?php
                                            $a = mysqli_query($conn,"SELECT * FROM product_images where product_id=$id");
                                            while($row = mysqli_fetch_array($a)){
                                                $imageURL = 'Uploads/'.$row["image"];
                                                ?>
                                                <img src="<?php echo $imageURL; ?>" alt="" height="100px" width="100px">
                                                <?php
                                            }
                                            ?>
                                            <br>
                                            <input type="file" class="" name="product_image" placeholder="" >
                                        </div>
                                    </div>

                                    
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info" name="updateProduct">Update</button>

                                </div>
                            </form>
                        
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

<script>
    $('#sub').hide();

    $(document).ready(function() {
        //console.clear();
        let id = $('#SelectCategory').val();
        console.log(id);
        getSubCategories(id);

        var i = $(this).find(":selected").data('cat_name');
        var j = i.toUpperCase();
        console.log(j);
        if(j == "CAKE")
        {
            $('#sub').show();
        }
        else
        {
            $('#sub').hide();
        }

        $('#SelectCategory').change(function(){
            var id = $('#SelectCategory').val();
            var i = $(this).find(":selected").data('cat_name');
            var j = i.toUpperCase();
            console.log(j);
            if(j == "CAKE")
            {
                $('#sub').show();
                getSubCategories(id);
                console.log(html);
                $('#SelectSubCategory').html(html); 
                
            }
            else
            {
                $('#sub').hide();
            }
                           
        })

    });
    
    function getSubCategories(id){
        let product_id = GetURLParameter('p_id');
        console.log(product_id);
        let data = {"product_id":product_id,"cat_id":id}
        let res = "";
        $.ajax({
            type:"POST",
            url:"./includes/fetch/getSubCat.php",
            data:{"getSubCatForEdit":data},
            success:function(response){
                console.log(response);
                $('#SelectSubCategory').html(response); 
            },
            error:function(error){
                console.log(error);
            }
        })
        return res;
    }
</script>
    
    <!-- ./wrapper -->
<?php
include('includes/footer.php');
?>
    <!-- jQuery -->

</body>

</html>

<script>
</script>

<!-- script to get the id from url -->
<script>
	function GetURLParameter(sParam) {
		var sPageURL = window.location.search.substring(1);
		var sURLVariables = sPageURL.split('&');
		for (var i = 0; i < sURLVariables.length; i++) {
			var sParameterName = sURLVariables[i].split('=');
			if (sParameterName[0] == sParam) {
				return decodeURIComponent(sParameterName[1]);
			}
		}
	}
</script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script> $('#summernote').summernote({height:200})</script>
