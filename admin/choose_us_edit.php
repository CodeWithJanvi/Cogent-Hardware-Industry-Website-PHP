<?php

            include('includes/config.php');

            include('includes/header.php');

            include('includes/sidebar.php');

            
            $Id=$_GET['Id'];

            $res=mysqli_query($conn,"select * from choose_us WHERE id=$Id");

            $result=mysqli_fetch_array($res);

?>



<?php



  if(isset($_POST['edit']))
  {

    $title = $_POST['title'];
    $description = $_POST['description'];
       
    $query="UPDATE `choose_us` SET `title`='$title',`description`='$description' WHERE id = '$Id'";

    $result=mysqli_query($conn,$query);
    if($result)
    {
        ?>
          <script>
            alert("Updated successfully.");
            window.location = "./choose_us.php";
          </script>
          <?php
    }
    else
    {
      ?>
      <script>
          alert("Error occured while updating category.");
          window.location = "./choose_us_edit.php";
        </script>
    <?php
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

          <h1>Choose Us</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

            <li class="breadcrumb-item active">Choose Us</li>

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
                     <label>Title</label>
                     <input type="text" class="form-control" name="title" value="<?php echo $result['title']; ?>">
                </div>
                <div class="form-group">
                  <label>Description</label>
                    <textarea class="form-control" name="description"><?php echo $result['description']; ?></textarea>
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