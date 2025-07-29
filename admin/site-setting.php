<?php
include('includes/config.php');
include('includes/header.php');
include('includes/sidebar.php');
            
?>
<?php

$res=mysqli_query($conn,"select * from site_setting");

$arr=mysqli_fetch_array($res);


if(isset($_POST['btn']))
{
  $id = $_POST['id'];
  $call_us = $_POST['call_us'];
  $mail_us = $_POST['mail_us'];
  $reach_us = $_POST['reach_us'];


  $query="UPDATE site_setting SET call_us='$call_us' , mail_us = '$mail_us' , reach_us = '$reach_us' where id ='$id' ";
  $result=mysqli_query($conn,$query);

  if($result)
  {

?>
  <script>
       window.onload=function()
         {
           alert("Update Successfully");
           window.location="site-setting.php";
         }
     </script>
   <?php	
   }else{
   ?>
     <script>
           window.onload=function()
             {
 
               alert("Not Successfully Update");
               window.location="site-setting.php";
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
            <h1>Contact Us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Contact us</li>
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
                <h3 class="card-title">Contact us</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal"   method="post" enctype="multipart/form-data">
                <div class="card-body">
               
                <div class="form-group">
                   <input type="hidden" name="id" value="<?php echo $arr['id'] ?>">
                  <label>Call Us</label>
                  <input type="text" class="form-control" name="call_us" placeholder="+91-1234567890" value="<?php echo $arr['call_us'] ?>">
                  
                </div>

                <div class="form-group">
                  
                  <label>Mail Us</label>
                  <input type="text" class="form-control" name="mail_us" placeholder="abc@gmail.com" value="<?php echo $arr['mail_us'] ?>">
                  
                    
                  
                </div>
                 
                <div class="form-group">
                  
                  <label>Reach Us</label>
                  <textarea class="form-control" id="summernote" cols="10" name="reach_us"><?php echo $arr['reach_us'] ?></textarea>
                  
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

<!--<script> $('#summernote1').summernote({height:200})</script>

<script> $('#summernote2').summernote({height:200})</script>

<script> $('#summernote3').summernote({height:200})</script>-->