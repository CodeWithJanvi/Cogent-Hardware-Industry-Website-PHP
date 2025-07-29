<?php

            include('includes/config.php');

            include('includes/header.php');

            include('includes/sidebar.php');

            
            $Id=$_GET['Id'];

            $res=mysqli_query($conn,"select * from what_say WHERE id=$Id");

            $result=mysqli_fetch_array($res);

?>



<?php



  if(isset($_POST['edit'])){

    $name = $_POST['name'];
    $bussiness = $_POST['bussiness'];
    $description = $_POST['description'];

    if(is_uploaded_file($_FILES['image']['tmp_name']))
    {
      // sql to update image
      $allowedFileTypeImage = ['image/png', 'image/jpeg','image/jpg'];

      if(in_array($_FILES['image']['type'], $allowedFileTypeImage))
      {
        $img_name = rand(0,999).$_FILES['image']['name'];
        
        $file_type = $_FILES['image']['tmp_name'];
       
        $query="UPDATE `what_say` SET `name`='$name',`bussiness`='$bussiness',`image`='$img_name',`description`='$description' WHERE id = '$Id'";

          $result=mysqli_query($conn,$query);
          if($result)
          {
            move_uploaded_file($file_type, "Uploads/" . $img_name);
?>
            <script>

              alert("Updated successfully.");

              window.location = "./what_say.php";

            </script>

            <?php

          }
          else
          {

            ?>

            <script>

                alert("Error occured while updating category.");

                window.location = "./what_say_edit.php";

              </script>

          <?php

          }


      }
      else
      {
        // Send error message of not valid file format

          ?>

          <script>

            alert("Format of uploaded file is not valid.");

            window.location = "./what_say_edit.php";

          </script>

        <?php

      }



    }
    else
    {

      // Sql to update without image

      $query = mysqli_query($conn,"UPDATE `what_say` SET `name`='$name',`bussiness`='$bussiness',`description`='$description' WHERE id = '$Id'");

      if($query)
      {
        ?>
        <script>

          alert("Updated Successfully.")

          window.location = "./what_say.php";

        </script>

        <?php

  

      }
      else
      {

        ?>

        <script>

          alert("Error occured while updating category.")

          window.location = "./what_say_edit.php";

        </script>

        <?php

      }

    }





  }



?>







<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 1289.9px;">

  <!-- Content Header (Page header) -->

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>What Say</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

            <li class="breadcrumb-item active">What Say</li>

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

              <h3 class="card-title">Manage</h3>

            </div>

            <!-- /.card-header -->

            <!-- form start -->

            <form class="form-horizontal" method="post" enctype="multipart/form-data">

              <div class="card-body">

                <input type="hidden" class="form-control" name="Id" value="<?php echo $result['id'] ?>">

                  <div>
                     <label>Name</label>
                     <input type="text" class="form-control" name="name" value="<?php echo $result['name']; ?>">
                </div>
                <div>
                     <label>Bussiness</label>
                     <input type="text" class="form-control" name="bussiness" value="<?php echo $result['bussiness']; ?>">
                </div>
                <div class="form-group">
                  <label>Description</label>
                    <textarea class="form-control" name="description"><?php echo $result['description']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Category Image</label>
                    <small>( Upload jpg/jpeg/png type Image only.)</small>
                      <br>
                      <img src="upload/<?php echo $result['image'] ?>" height="100px">
                      <input type="file" class="" name="image" >
                </div>
                



              </div>

              <!-- /.card-body -->



              <!-- /.card-body -->

              <div class="card-footer">

                <button type="submit" class="btn btn-info" name="edit">Update</button>



              </div>

              <!-- /.card-footer -->

            </form>

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

<?php

                include('includes/footer.php');

      ?>