<?php

include('includes/config.php');

include('includes/header.php');

include('includes/sidebar.php');

            

?>

<?php



  $res=mysqli_query($conn,"select * from product");



      if(isset($_POST['btn']))

      {
        $poduct_name = $_POST['product_name'];
         $cat_name = $_POST['category_name'];
        $allowedFileTypeImage = ['image/png', 'image/jpeg','image/jpg'];

         if(in_array($_FILES['product_image']['type'], $allowedFileTypeImage))

        {

          $product_image = rand(0,999).$_FILES['product_image']['name'];

          $file_type = $_FILES['product_image']['tmp_name'];

          /*$img_info = getimagesize($file_type);

          $img_w = $img_info[0];

          $img_h = $img_info[1];



          $c_tempp = explode(".",$c_img);

          $extension = end($c_tempp);

          $img_name = $c_name.".".$extension;

          

          if($img_w >= 500 && $img_h >= 500 && $img_w == $img_h){*/

            $query="INSERT INTO `product`( `product_name`, `cat_name`, `product_image`)
             VALUES ('$product_name','$product_id','$product_image)";
            

            // $query_id = mysqli_insert_id($conn);



            // $img_name = $query_id.".".$extension;

            

            $result=mysqli_query($conn,$query);







            if($result){

              move_uploaded_file($file_type, "upload/" . $product_image);

              ?>

                <script>

                  alert("product Inserted successfully.");

                  window.location = "./product.php";

                </script>

              <?php

            }else{

              ?>

                <script>

                  alert("Error occured while inserting product.");

                  window.location = "./product.php";

                </script>

              <?php

            }



          /*}else{

            // Image size is more than requested resolution

              ?>

                <script>

                  alert("Image width and height shold be of more than 500px and same height width");

                  window.location = "./product.php";

                </script>

              <?php

          }*/



        }

        else{

          // Image format is of not requested format

          ?>

            <script>

              alert("Image format shold be either jpg/jpeg/png");

              window.location = "./product.php";

            </script>

          <?php

        }

      }

?>



<?php	   

   

if (isset($_GET['Id'])) 

{

  $Id=$_GET['Id'];
  $cat_name=$_GET['cat_name'];


  $getImg = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product WHERE id = $Id"));

  $img_del = $getImg['product_image'];

  unlink("upload/".$img_del);

  $Delete="DELETE FROM product WHERE id=$Id";

  $query2=mysqli_query($conn,$Delete);

    

  

  if($query2)

  {

  ?>

    <script>

      window.onload = function () {

        alert("product deleted Successfully.");

        window.location = "product.php";

      }

    </script>

  <?php	

  }

  else

  {

  ?>

    <script>

      window.onload = function () {



        alert("error occured while deleting product.");

        / window.location="product.php";

      }

    </script>



  <?php	

  }

}	

?>





<!-- Navbar -->



<!-- /.navbar -->



<!-- Main Sidebar Container -->





<!-- Content Wrapper. Contains page content -->



<!-- /.modal -->

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 1289.9px;">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>product</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="#">Home</a></li>

            <li class="breadcrumb-item active">product</li>

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

              <h3 class="card-title">product</h3>

            </div>

            <!-- /.card-header -->

            <!-- form start -->

            <form class="form-horizontal" method="post" enctype="multipart/form-data">

              <div class="card-body">


                

                <div class="form-group">

                  <label>Select category</label>

                  <select class="form-control" name="cat_name" id="product_name">  

                  <option value="">Select category</option>

                  <?php
                  
                  $response = mysqli_query($conn,"SELECT * FROM category");

                  while($row = mysqli_fetch_array($response)){

                    ?>

                    <option value="<?php echo $row['id'];?>"><?php echo $row['cat_name'];?> </option>

                    <?php
                  }

                  ?>

                  </select> 

                </div>

                
               <div>
                 
                 <label> product Name</label>

                 <input type="text" class="form-control" name="product_name">

               </div>
                


                <div class="form-group">

                  <label>product Image</label>

                  <small>( Upload jpg/jpeg/png type Image only.)</small>

                  <br>

                  <input type="file" class="" name="product_image" required>

                </div>







              </div>

              <!-- /.card-body -->

              <div class="card-footer">

                <button type="submit" class="btn btn-info" name="btn">Submit</button>


              </div>

              <!-- /.card-footer -->

            </form>

          </div>



          <div class="card">

            <div class="card-header">

              <h3 class="card-title">product</h3>

            </div>

            <!-- /.card-header -->

            <div class="card-body">

              <div style="overflow-x:auto;">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>

                    <tr>

                      <th>No.</th>

                      <!--<th>Parent Id</th>-->

                      <th>Image</th>

                      <th>product Name</th>
                      <th>category</th>

                      

                      <th>Edit</th>

                      <th>Delete</th>



                    </tr>

                  </thead>

                  <tbody>
                    
                  <?php



                $co=1;

                    while ($rec=mysqli_fetch_array($res)) {

                    //$response = mysqli_query($conn,"SELECT * FROM category where parent_id = $co"); 
                        ?>

                    <tr>

                    <td>

                    <?php echo $co; ?>

                    </td>

                    <tr>

                        
                          
                    


                          
                            
                            
                          

                         

                      

                      <td>

                        <img src="upload/<?php echo $rec['product_image']; ?>" alt="" width="100px">

                      </td>

                      <td>

                        <?php echo $rec['product_name']; ?>

                      </td>


                     


                      <td>

                        <a href="./product_edit.php?Id=<?php echo $rec['id']; ?>" class="btn btn-info btn-sm">

                        <i class="fas fa-pencil-alt"></i>

                        Edit

                        </a>

                      </td>



                      <td>

                        <a href="./product.php?Id=<?php echo $rec['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure.')">

                        <i class="fas fa-trash"></i>

                        Delete

                        </a>

                      </td>



                    </tr>
                    
                    <?php

		                    	$co++;

		                		}

		                	?>




                  </tbody>

                </table>

              </div>

            </div>

            <!-- /.card-body -->



            <!-- /.card -->

          </div>

          <!-- /.col -->

        </div>

        <!-- /.row -->

      </div>

      <!-- /.container-fluid -->

  </section>

  <!-- /.content -->

</div>

<!-- /.control-sidebar -->

</div>



<!-- ./wrapper -->

<?php

         include('includes/footer.php');

?>

<!-- jQuery -->



</body>



</html>