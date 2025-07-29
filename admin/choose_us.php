<?php
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');

?>
<?php

	$res=mysqli_query($conn,"select * from choose_us");
    if(isset($_POST['btn']))
    {
        
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        $query="INSERT INTO `choose_us`(`title`, `description`) VALUES ('$title','$description')";
        $result=mysqli_query($conn,$query);
        if($result)
        {
          	?>

            <script>

              alert("Inserted successfully.");

              window.location = "./choose_us.php";

            </script>

          <?php

        }
        else
        {
          ?>
            <script>
              alert("Error occured while inserting .");
              window.location = "./choose_us.php";
            </script>
          <?php
        }
      }
?>



<?php	   

   

if (isset($_GET['Id'])) 

{

  $Id=$_GET['Id'];

  $Delete="DELETE FROM choose_us WHERE id=$Id";

  $query2=mysqli_query($conn,$Delete);

  if($query2)

  {

  ?>

    <script>

      window.onload = function () {

        alert("Deleted Successfully.");

        window.location = "choose_us.php";

      }

    </script>

  <?php	

  }

  else

  {

  ?>

    <script>

      window.onload = function () {



        alert("error occured while deleting .");

        window.location="choose_us.php";

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

          <h1>Why Choose Us</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="#">Home</a></li>

            <li class="breadcrumb-item active">Why Choose Us</li>

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

              <h3 class="card-title">Why Choose Us</h3>

            </div>

            <!-- /.card-header -->

            <!-- form start -->

            <form class="form-horizontal" method="post" enctype="multipart/form-data">
  				    <div class="card-body">
   					    <!-- <div>
	                <label>Icon</label>
	                <input type="text" class="form-control" name="icon">
		            </div> -->
    				    <div class="form-group">
      					  <label>Title</label>
      					  <input type="text" name="title" class="form-control">
	              </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description"></textarea>
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

              <h3 class="card-title">Why Choose Us</h3>

            </div>

            <!-- /.card-header -->

            <div class="card-body">

              <div style="overflow-x:auto;">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>

                    <tr>

                      <th>No.</th>
                      <!-- <th>Icon</th> -->
                      <th>Title</th> 
                      <th>Description</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>

                  </thead>
                  <tbody>
                    <?php
	                        $co=1;
	                        	while ($rec=mysqli_fetch_array($res)) 
                            {
	                            ?>
                            <tr>
                              <td><?php echo $co; ?></td>
                              <!-- <td><i class="<?php echo $rec['icon']; ?>"></i></td>  -->
                              <td><?php  echo $rec['title']; ?></td>
                              <td><?php  echo $rec['description']; ?></td>
                              <td><a href="./choose_us_edit.php?Id=<?php echo $rec['id']; ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>Edit</a></td>
                              <td><a href="./choose_us.php?Id=<?php echo $rec['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure.')"><i class="fas fa-trash"></i>Delete</a></td>
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