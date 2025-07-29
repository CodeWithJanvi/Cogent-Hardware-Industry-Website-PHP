<?php

include('includes/config.php');

include('includes/header.php');

include('includes/sidebar.php');

            

?>

<?php





$res=mysqli_query($conn,"select * from about_us");



$arr=mysqli_fetch_array($res);



if(isset($_POST['btn']))

{

  $id = $_POST['id'];

  $our_vision = $_POST['our_vision'];

  $our_mission= $_POST['our_mission'];

  $quality_policy = $_POST['quality_policy'];

  $company_profile = $_POST['company_profile'];
  $company_history = $_POST['company_history'];

  
  

  $query="UPDATE about_us SET company_profile='$company_profile' , our_vision = '$our_vision' , our_mission = '$our_mission', quality_policy = '$quality_policy', company_history= '$company_history' where id ='$id' ";

  $result=mysqli_query($conn,$query);



  if($result)

  {



?>

  <script>

       window.onload=function()

         {

           alert("Update Successfully");

           window.location="aboutus.php";

         }

     </script>

   <?php	

   }else{

   ?>

     <script>

           window.onload=function()

             {

 

               alert("Not Successfully Update");

               window.location="aboutus.php";

             }

         </script>

 

   <?php	

   }

 }

   

   



 ?>

   

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

</head>



<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">



  <!-- Preloader -->

  <div class="preloader flex-column justify-content-center align-items-center">

    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">

  </div>



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

            <h1>About Us</h1>

          </div>

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="index.php">Home</a></li>

              <li class="breadcrumb-item active">About us</li>

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

                <h3 class="card-title">About us</h3>

              </div>

              <!-- /.card-header -->

              <!-- form start -->

              <form class="form-horizontal"   method="post" enctype="multipart/form-data">

                <div class="card-body">

               

                <div class="form-group">

                   <input type="hidden" name="id" value="<?php echo $arr['id'] ?>">

                  <label>Company Profile</label>

                  <textarea class="form-control" id="summernote" cols="10" name="company_profile"><?php echo $arr['company_profile'] ?></textarea>

                  

                </div>



                 <div class="form-group">

                  <label>Our Vision</label>

                  <textarea class="form-control" id="summernote1" cols="10" name="our_vision"><?php echo $arr['our_vision'] ?></textarea>

                </div>



                 <div class="form-group">

                  <label>Our Mission</label>

                  <textarea class="form-control" id="summernote2" cols="10" name="our_mission"><?php echo $arr['our_mission'] ?></textarea>

                </div>



                 <div class="form-group">

                  <label>Quality Policy</label>

                  <textarea class="form-control" id="summernote3" cols="10" name="quality_policy"><?php echo $arr['quality_policy'] ?></textarea>

                </div>

                
                <div class="form-group">

                  <label>Company History</label>

                  <textarea class="form-control" id="summernote4" cols="10" name="company_history"><?php echo $arr['company_history'] ?></textarea>

                </div>



                 





             



               <!--

              <div class="form">

              <label>File Upload</label>

              <input type="file" class="form-control"  name="c_img" placeholder="Enter Text" required>

              </div> -->



              

               

                  

                </div>

                <!-- /.card-body -->

                <div class="card-footer">

                  <button type="submit" class="btn btn-info" name="btn">Update</button>

                 

                </div>

                <!-- /.card-footer -->

              </form>

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

<script src="plugins/summernote/summernote-bs4.min.js"></script>



<script> $('#summernote').summernote({height:200})</script>



<script> $('#summernote1').summernote({height:200})</script>


<script> $('#summernote2').summernote({height:200})</script>



<script> $('#summernote3').summernote({height:200})</script>
<script> $('#summernote4').summernote({height:200})</script>